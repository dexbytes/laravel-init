<?php 

namespace App\Http\Controllers\Settings;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use \App\Dexlib\Form;


class ApiController extends Controller
{
 

   /**
     * @param null
     * @return html
     */
    public function index()
    {   
        return view('settings.apikeys');
    }

    /**
     * @param  array  $data
     * @return RedirectResponse
     */
    public function store(Request $request) {  

        Form::setModel(\App\Form\Apikeys::get());
        $rules = Form::getValidationRules(); 
        $data = $this->validate($request, $rules);
        $validSettings = array_keys($rules);
         
        foreach ($data as $key => $val) {
            if(in_array($key, $validSettings)) { 
                Setting::add($key, $val, Form::getDataType($key));
            }
        }

        return redirect()->back()->with('status', 'Settings has been saved.');
    }

    


    
}