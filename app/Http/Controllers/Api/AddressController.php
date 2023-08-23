<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\City\CityRepositoryInterface;
use App\Repositories\District\DistrictRepositoryInterface;
use App\Constants\CommonConstants;

class AddressController extends Controller
{
    /**
     * @var districtRepository
     */
    protected $districtRepository;

    /**
     * @var cityRepository
     */
    protected $cityRepository;

    /**
     * @param DistrictRepositoryInterface $districtRepositoryInterface
     * @param CityRepositoryInterface $cityRepositoryInterface
     */
    public function __construct(
        DistrictRepositoryInterface $districtRepositoryInterface,
        CityRepositoryInterface $cityRepositoryInterface
        )
    {
        $this->districtRepository   = $districtRepositoryInterface;
        $this->cityRepository       = $cityRepositoryInterface;
    }

    /**
     * Get list districts by city_id. Parameters is ?city_id=<city_id>
     * @param Request $request
     * @return void
     */
    public function listDistrict(Request $request)
    {
        $cityId = $request->data['city_id'] ?? '';
        $districtId = $request->data['district_id'] ?? '';

        try {
            $districts = $cityId ?
                $this->districtRepository->findBy(['city_id' => $cityId], CommonConstants::SELECT_ALL) :
                $this->districtRepository->all();
            $view = '<option value="">--- Chọn quận/huyện ---</option>';
            foreach ($districts as $district) {
                if ($districtId !== '' && $district->id == $districtId) {
                    $view.= '<option value="'. $district->id. '" selected>'. $district->name. '</option>';
                } else {
                    $view.= '<option value="'. $district->id. '">'. $district->name. '</option>';
                }
            }

            return $view;
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }

    /**
     * @param Request $request
     * @return void
     */
    public function listCity(Request $request)
    {
        $cityId = $request->data['city_id'] ?? '';

        try {
            $cities = $this->cityRepository->all();
            $view = '<option value="">--- Chọn tỉnh/thành ---</option>';
            foreach ($cities as $city) {
                if ($cityId !== '' && $city->id == $cityId) {
                    $view.= '<option value="'. $city->id. '" selected>'. $city->name. '</option>';
                } else {
                    $view.= '<option value="'. $city->id. '">'. $city->name. '</option>';
                }
            }

            return $view;
        } catch (\Exception $e) {
            return $this->badRequestErrorResponse($e);
        }
    }
}
