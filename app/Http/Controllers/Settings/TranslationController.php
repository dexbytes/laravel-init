<?php 

namespace App\Http\Controllers\Settings;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use Lang;

class TranslationController extends Controller
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
     * @param null
     * @return html
     */
    public function index()
    {   
        return view('settings.translation.language');
    }

    /**
     * @param null
     * @return html
     */
    public function edit($lang = 'en')
    {   
        $language = \App\Dexlib\Locale::getActiveLang();
        $langName = $language[$lang];
        $filesInFolder = File::allFiles('../resources/lang/en');
        $files = [];
       
        foreach ($filesInFolder as $key => $value) {
           $data = [
                'file_path' => $value->getPathName(),
                'file_name' => $value->getFileName(),
                'code' => pathinfo($value->getFileName(), PATHINFO_FILENAME),
                'name' => ucfirst(pathinfo($value->getFileName(), PATHINFO_FILENAME))
           ];  
           $files[] = $data;
        }
 
     /*   $array = Lang::get('pagination'); // return entire array
        $text  = Lang::get('pagination.next'); // return single item
     */
       return view('settings.translation.list', compact('langName', 'lang', 'files'));
    }

}