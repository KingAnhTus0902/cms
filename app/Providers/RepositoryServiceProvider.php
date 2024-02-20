<?php

namespace App\Providers;

use App\Repositories\Auth\AuthRepository;
use App\Repositories\Auth\AuthRepositoryInterface;
use App\Repositories\DesignatedServiceOfMedicalSession\DSMedSessionRepository;
use App\Repositories\DesignatedServiceOfMedicalSession\DSMedSessionRepositoryInterface;
use App\Repositories\Disease\DiseaseRepository;
use App\Repositories\Disease\DiseaseRepositoryInterface;
use App\Repositories\GroupPermission\GroupPermissionRepository;
use App\Repositories\GroupPermission\GroupPermissionRepositoryInterface;
use App\Repositories\MedicalSessionRooms\MedicalSessionRoomRepository;
use App\Repositories\MedicalSessionRooms\MedicalSessionRoomRepositoryInterface;
use App\Repositories\Permission\PermissionRepository;
use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\Role\RoleRepository;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\UserRoom\UserRoomRepository;
use App\Repositories\UserRoom\UserRoomRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * All the container singletons that should be registered.
     *
     * @var array
     */
    public array $singletons = [
        UserRepositoryInterface::class => UserRepository::class,
        AuthRepositoryInterface::class => AuthRepository::class,
        RoleRepositoryInterface::class => RoleRepository::class,
        DiseaseRepositoryInterface::class => DiseaseRepository::class,
        DSMedSessionRepositoryInterface::class => DSMedSessionRepository::class,
        MedicalSessionRoomRepositoryInterface::class => MedicalSessionRoomRepository::class,
        PermissionRepositoryInterface::class => PermissionRepository::class,
        GroupPermissionRepositoryInterface::class => GroupPermissionRepository::class,
        UserRoomRepositoryInterface::class => UserRoomRepository::class
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $repositories = [
            'Department\DepartmentRepositoryInterface' => 'Department\DepartmentRepository',
            'Unit\UnitRepositoryInterface' => 'Unit\UnitRepository',
            'Room\RoomRepositoryInterface' => 'Room\RoomRepository',
            'Hospital\HospitalRepositoryInterface' => 'Hospital\HospitalRepository',
            'City\CityRepositoryInterface' => 'City\CityRepository',
            'DesignatedService\DesignatedServiceRepositoryInterface' => 'DesignatedService\DesignatedServiceRepository',
            'Cadres\CadresRepositoryInterface' => 'Cadres\CadresRepository',
            'Folk\FolkRepositoryInterface' => 'Folk\FolkRepository',
            'District\DistrictRepositoryInterface' => 'District\DistrictRepository',
            'MaterialType\MaterialTypeRepositoryInterface' => 'MaterialType\MaterialTypeRepository',
            'Material\MaterialRepositoryInterface' => 'Material\MaterialRepository',
            'Organization\OrganizationRepositoryInterface' => 'Organization\OrganizationRepository',
            'DesignatedServiceType\DesignatedServiceTypeRepositoryInterface' =>
                'DesignatedServiceType\DesignatedServiceTypeRepository',
            'VitalSign\VitalSignRepositoryInterface' => 'VitalSign\VitalSignRepository',
            'ExaminationType\ExaminationTypeRepositoryInterface' =>
                'ExaminationType\ExaminationTypeRepository',
            'Setting\SettingRepositoryInterface' => 'Setting\SettingRepository',
            'MedicalSession\MedicalSessionRepositoryInterface' => 'MedicalSession\MedicalSessionRepository',
            'DiseaseOfMedicalSession\DiseaseOfMedicalSessionRepositoryInterface'
                => 'DiseaseOfMedicalSession\DiseaseOfMedicalSessionRepository',
            'MedicineOfMedicalSession\MedicineOfMedicalSessionRepositoryInterface' =>
                'MedicineOfMedicalSession\MedicineOfMedicalSessionRepository',
            'HospitalTransfer\HospitalTransferRepositoryInterface' => 'HospitalTransfer\HospitalTransferRepository',
            'MedicalSessionRooms\MedicalSessionRoomRepositoryInterface' =>
                'MedicalSessionRooms\MedicalSessionRoomRepository',
        ];

        foreach ($repositories as $key => $value) {
            $this->app->bind("App\\Repositories\\$key", "App\\Repositories\\$value");
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
