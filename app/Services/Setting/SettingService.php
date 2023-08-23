<?php

namespace App\Services\Setting;

use App\Helpers\QueryHelper;
use App\Repositories\Setting\SettingRepositoryInterface;
use App\Services\FileService\FileServiceInterface;
use Illuminate\Database\Eloquent\Model;
use Throwable;

class SettingService implements SettingServiceInterface
{
    /** @var string */
    protected const PATH_FILE = '/settings';

    /** @var SettingRepositoryInterface */
    protected SettingRepositoryInterface $settingRepository;

    /** @var FileServiceInterface */
    protected FileServiceInterface $fileService;

    /**
     * Constructor
     *
     * @param SettingRepositoryInterface $settingRepository
     * @param FileServiceInterface $fileService
     */
    public function __construct(SettingRepositoryInterface $settingRepository, FileServiceInterface $fileService)
    {
        $this->settingRepository = $settingRepository;
        $this->fileService = $fileService;
    }

    /**
     * Display information of login user
     *
     * @return ?Model
     */
    public function view(): ?Model
    {
        try {
            return $this->settingRepository->first(
                [
                    'hospital_id',
                    'default_name',
                    'clinic_name',
                    'clinic_name_acronym',
                    'address',
                    'logo',
                    'phone',
                    'email',
                    'ministry_of_health',
                    'base_salary'
                ]
            );
        } catch (Throwable $e) {
            report($e);
        }

        return null;
    }

    /**
     * Update setting
     *
     * @param $param
     * @return ?Model
     */
    public function update($param): ?Model
    {
        $result = null;
        try {
            $setting = $this->settingRepository->first();
            if ($setting) {
                if (isset($param['logo'])) {
                    $file = $this->fileService->upload($param['logo'], self::PATH_FILE, $setting->logo);

                    $param = array_merge($param, ['logo' => $file[0]['fileName']]);
                }
                $result = $this->settingRepository->updates($setting, $param);
            }
        } catch (Throwable $e) {
            report($e);
        }
        return $result;
    }
}
