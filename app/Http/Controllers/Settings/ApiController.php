<?php 

namespace App\Http\Controllers\Settings;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use \App\Form\Settings\Apikeys;


class ApiController extends Controller
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
        
        $formData = [];         
        $setttings = Setting::all();
        foreach ($setttings->toArray() as $key => $value) {
           $formData[$value['name']] = $value['val'];
        }
 
        $form = new Apikeys();
        $elements = $form->populate($formData);
        
       return view('settings.apikeys', compact('elements'));
    }

    /**
     * @param  array  $data
     * @return RedirectResponse
     */
    public function store(Request $request) {  

        $form = new Apikeys(); 
        $rules = $form->getValidationRules(); 
        $data = $this->validate($request, $rules);
        $validSettings = array_keys($rules);
         
        foreach ($data as $key => $val) {
            if(in_array($key, $validSettings)) { 
                Setting::add($key, $val, $form->getDataType($key));
            }
        }

        return redirect()->back()->with('success', 'Settings has been saved.');
    }

    


    
}