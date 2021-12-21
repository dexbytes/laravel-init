<?php 
use App\Http\Controllers\Settings\SettingController;
use App\Http\Controllers\Settings\ApiController;
use App\Http\Controllers\Settings\ConfigurationController;
use App\Http\Controllers\Settings\TranslationController;

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth']], function () {
        // General Settings
        Route::prefix('settings')->group(function () {
        Route::get('/general', [SettingController::class, 'general'])->name('settings.general');
        Route::post('/general/store', [SettingController::class, 'store'])->name('general.store');  
        
        //API Key settings
        Route::get('/apikeys', [ApiController::class, 'index'])->name('settings.index');   
        Route::post('/apikeys/store', [ApiController::class, 'store'])->name('apikeys.store'); 

        //Configuration settings
         Route::get('/configuration', [ConfigurationController::class, 'index'])->name('configuration.index');   
        Route::post('/configuration/store', [ConfigurationController::class, 'store'])->name('configuration.store'); 

        //Translation settings
         Route::get('/translation', [TranslationController::class, 'index'])->name('translation.index');   
        Route::get('/translation/edit/{lang}', [TranslationController::class, 'edit'])->name('translation.edit'); 

        //Demo
        Route::get('/demo', [SettingController::class, 'demo'])->name('settings.demo');
    });

});
