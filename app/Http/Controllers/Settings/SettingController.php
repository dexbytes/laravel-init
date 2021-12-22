<?php 

namespace App\Http\Controllers\Settings;

use App;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Form\Setting as formSetting;
use Storage;
 
class SettingController extends Controller
{
    /**
     * @param null
     * @return html
     */
    public function general()
   {    
        $formData = [];         
        $setttings = Setting::all();
        foreach ($setttings->toArray() as $key => $value) {
           $formData[$value['name']] = $value['val'];
        }

        $form = new formSetting();
        $elements = $form->populate($formData);
  
        return view('settings.general', compact('elements'));
    }

    /**
     * @param  array  $data
     * @return RedirectResponse
     */
    public function store(Request $request) {  
        
        $form = new formSetting(); 
        $rules = $form->getValidationRules(); 
        $data = $this->validate($request, $rules);
        $validSettings = array_keys($rules);


        $request->has('enable_registration') ? $data['enable_registration'] = true : $data['enable_registration'] = false; 

        $fileName = '';
        if ($request->file('logo')) {
            $fileName = time().'_application_logo_'.$request->file('logo')->getClientOriginalName();
            
             //Move Uploaded File
            $fileName = $request->file('logo')->storeAs('logo', $fileName, 'public');
            $data['logo'] = $fileName;
        }
 
       
        foreach ($data as $key => $val) {
            if( in_array($key, $validSettings) ) { 
                Setting::add($key, $val, Setting::getDataType($key));
            }
            if(in_array($key, ['default_lang', 'default_role', 'enable_registration'])){
               if($key == 'default_lang') \App\Dexlib\Env::setEnvironmentValue(['APP_LOCALE' => $val]);
               if($key == 'default_role') \App\Dexlib\Env::setEnvironmentValue(['ROLES_DEFAULT_USER_MODEL' => $val]);
               if($key == 'enable_registration') \App\Dexlib\Env::setEnvironmentValue(['ENABLE_REGISTER' => (boolean) $val]);
            }

        }

        return redirect()->back()->with('status', 'Settings has been saved.');
    }

 
}