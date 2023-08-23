<?php

namespace App\Providers;

use App\Services\Auth\AuthService;
use App\Services\Auth\AuthServiceInterface;
use App\Services\DesignatedService\DesignatedServiceService;
use App\Services\DesignatedService\DesignatedServiceServiceInterface;
use App\Services\DesignatedServiceOfMedicalSession\DSMedSessionService;
use App\Services\DesignatedServiceOfMedicalSession\DSMedSessionServiceInterface;
use App\Services\Disease\DiseaseService;
use App\Services\Disease\DiseaseServiceInterface;
use App\Services\FileService\FileService;
use App\Services\FileService\FileServiceInterface;
use App\Services\Hospital\HospitalService;
use App\Services\Hospital\HospitalServiceInterface;
use App\Services\Mail\MailService;
use App\Services\Mail\MailServiceInterface;
use App\Services\MedicalSession\MedicalSessionService;
use App\Services\MedicalSession\MedicalSessionServiceInterface;
use App\Services\Permission\PermissionService;
use App\Services\Permission\PermissionServiceInterface;
use App\Services\Report\ReportService;
use App\Services\Report\ReportServiceInterface;
use App\Services\Role\RoleService;
use App\Services\Role\RoleServiceInterface;
use App\Services\Room\RoomService;
use App\Services\Room\RoomServiceInterface;
use App\Services\Setting\SettingService;
use App\Services\Setting\SettingServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All the container singletons that should be registered.
     *
     * @var array
     */
    public array $singletons = [
        UserServiceInterface::class => UserService::class,
        AuthServiceInterface::class => AuthService::class,
        RoleServiceInterface::class => RoleService::class,
        MailServiceInterface::class => MailService::class,
        RoomServiceInterface::class => RoomService::class,
        DiseaseServiceInterface::class => DiseaseService::class,
        DSMedSessionServiceInterface::class => DSMedSessionService::class,
        DesignatedServiceServiceInterface::class => DesignatedServiceService::class,
        MedicalSessionServiceInterface::class => MedicalSessionService::class,
        FileServiceInterface::class => FileService::class,
        SettingServiceInterface::class => SettingService::class,
        PermissionServiceInterface::class => PermissionService::class,
        ReportServiceInterface::class => ReportService::class,
        HospitalServiceInterface::class => HospitalService::class
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(SettingServiceInterface $settingService)
    {
        View::share('setting', $settingService->view());
    }
}
