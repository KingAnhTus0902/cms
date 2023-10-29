<?php

namespace App\Http\Controllers\Api;

use App\Helpers\CommonHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeStatusRequest;
use App\Services\Mail\MailServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CadresRequest;
use App\Http\Requests\ResetPasswordCadresRequest;
use App\Services\CadresService;
use App\Repositories\Folk\FolkRepositoryInterface;
use Illuminate\Support\Str;

class CadresController extends Controller
{
    /**
     * @var cadresService
     */
    protected $cadresService;

    /**
     * @var folkRepository
     */
    protected $folkRepository;

    /** @var MailServiceInterface */
    protected MailServiceInterface $mailService;

    /**
     * @param CadresService $cadresService
     * @param FolkRepositoryInterface $folkRepositoryInterface
     * @param MailServiceInterface $mailService
     */
    public function __construct(
        CadresService $cadresService,
        FolkRepositoryInterface $folkRepositoryInterface,
        MailServiceInterface $mailService
    ) {
        $this->cadresService = $cadresService;
        $this->folkRepository = $folkRepositoryInterface;
        $this->mailService = $mailService;
    }

    /**
     * List cadres ajax
     * @param Request $request
     * @return void
     */
    public function list(Request $request)
    {
        $response = $this->cadresService->list($request->get('data'), true);

        return view('elements.cadres.search-result', $response)->render();
    }

    /**
     * @param Request $request
     * @return void
     */
    public function listFolk(Request $request)
    {
        $folkId = $request->data['folk_id'] ?? '';
        try {
            $folks = $this->folkRepository->all();
            $view = '';
            foreach ($folks as $folk) {
                if ($folkId !== '' && $folk->id == $folkId) {
                    $view .= '<option value="' . $folk->id . '" selected>' . $folk->name . '</option>';
                } else {
                    $view .= '<option value="' . $folk->id . '">' . $folk->name . '</option>';
                }
            }

            return $view;
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * Create cadres
     * @param CadresRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CadresRequest $request) : JsonResponse
    {
        $data = $request->all();
        $data = CommonHelper::setDataMedicalInsuranceAndDate($data);
        try {
            $password = Str::random(10);
            $data['password'] = Hash::make($password);
            $data['code'] = 'CB';
            $data['status'] = ACTIVE;
            $res = $this->cadresService->create($data);
            $code = str_pad($res->id, 4, "0", STR_PAD_LEFT);
            $response['data'] = $res->update(['code' => 'CB' . $code]);

            if ($data['email']) {
                $mailParams = [
                    'to' => $data['email'],
                    'subject' => __('label.email.subject'),
                    'html_content' => 'emails.cadre-register',
                    'data' => [
                        'name' => $data['name'],
                        'user_name' => $data['email'],
                        'password' => $password,
                    ]
                ];
                // Send mail
                $this->mailService->send($this->mailService->init($mailParams));
            }

            return $this->createSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * Detail cadres
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail($id) : JsonResponse
    {
        $response['data'] = $this->cadresService->findOneOrFail($id);

        return $this->successResponse($response);
    }

    /**
     * Update cadres
     * @param CadresRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CadresRequest $request) : JsonResponse
    {
        $data = $request->all();
        $data = CommonHelper::setDataMedicalInsuranceAndDate($data);
        try {
            $id = $data['id'];
            $cadres = $this->cadresService->findOneOrFail($id);
            $response['data'] = $cadres->update($data);

            return $this->updateSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }


    /**
     * Delete cadres
     * @param CadresRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request) : JsonResponse
    {
        try {
            $id = $request->input('id');
            $cadres = $this->cadresService->findOneOrFail($id);
            $response['data'] = $cadres->delete();

            return $this->deleteSuccessResponse($response);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * @param ResetPasswordCadresRequest $request
     * @return JsonResponse
     */
    public function resetPassword(ResetPasswordCadresRequest $request) : JsonResponse
    {
        $data = $request->all();

        try {
            $id = $data['id'];
            $cadres = $this->cadresService->findOneOrFail($id);
            if (Hash::check($data['old_password'], $cadres->password)) {
                $data['password'] = Hash::make($data['password']);
                $response['data'] = $cadres->update($data);

                return $this->updateSuccessResponse($response);
            }

            return response()->json([
                'errors'    => ['old_password' => __('messages.EM-012')],
                'code'      => Response::HTTP_UNPROCESSABLE_ENTITY
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * Admin change status active or deactive of cadres
     *
     * @param ChangeStatusRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function changeStatus(ChangeStatusRequest $request, $id): JsonResponse
    {
        $param = $request->only('status');

        $result = $this->cadresService->updates($param, $id);

        return isset($result)
            ? response()->json(['success' => __(
                $param['status'] == DEACTIVE
                ? 'messages.SM-011'
                : 'messages.SM-010'
            )
            ])
            : response()->json(['error' => __('messages.EM-000')], 500);
    }
}
