<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Services\CadresService;

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
