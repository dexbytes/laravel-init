<?php 

namespace App\Http\Controllers\Settings;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use \App\Form\Settings\Configuration;


class ConfigurationController extends Controller
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
     * @param  array  $data
     * @return RedirectResponse
     */
    public function index()
    {   
        $formData = [];         
        $setttings = Setting::all();
        foreach ($setttings->toArray() as $key => $value) {
           $formData[$value['name']] = $value['val'];
        }

        $form = new Configuration();
        $elements = $form->populate($formData);
  
        return view('settings.configuration', compact('elements'));
    }

    public function store(Request $request) {  

        $form = new Configuration(); 
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