<?php

namespace App\Http\Controllers\Mobile;

use App\Services\CadresService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use function League\Flysystem\toArray;

class CadresController extends BaseController
{
    /**
     * @var cadresService
     */
    protected $cadresService;

    /**
     * @param CadresService $cadresService
     */
    public function __construct(
        CadresService $cadresService
        )
    {
        $this->cadresService = $cadresService;
    }

    /**
     * Detail cadres
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function detail()
    {
        $user = auth()->guard('mobile')->user();
        $data = [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'birthday' => $user->birthday,
                'gender' => $user->gender == 0 ? "Nam" : "Nữ",
                'identity_card_number' => $user->identity_card_number,
                'medical_insurance_number' => $user->medical_insurance_number,
                'phone'  => $user->phone,
                'email' => $user->email,
                'address' => $user->address,
            ]
        ];

        return $this->response(
            $data ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST,
            '',
            $data
        );
    }
}
