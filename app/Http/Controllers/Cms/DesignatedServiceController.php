<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Services\DesignatedServiceService;

class DesignatedServiceController extends Controller
{
    protected $designatedServiceService;


    public function __construct(
        DesignatedServiceService $designatedServiceService
    ){
        $this->designatedServiceService = $designatedServiceService;
    }

    public function index()
    {
        $rooms = Room::all();
        return view('designated_service.index', compact( 'rooms'));
    }

}
