<?php 

namespace App\Http\Controllers\Settings;

use App;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\Controller;

class LocalizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    { 

    }

    /**
     * @param $locale
     * @return RedirectResponse
     */
    public function index($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}