<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\CadresService;
use App\Constants\CommonConstants;

class CadresController extends Controller
{
    /**
     * @var cadresService
     */
    protected $cadresService;

    /**
     * @param CadresService $cadresService
     */
    public function __construct(
        CadresService $cadresService,
        )
    {
        $this->cadresService    = $cadresService;
    }

    /**
     * @return Illuminate\View\View
     */
    public function index() : View
    {
        return view('cadres.index');
    }
}
