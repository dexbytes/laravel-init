<?php 
use App\Http\Controllers\Settings\SettingController;
use App\Http\Controllers\Settings\ApiController;
use App\Http\Controllers\Settings\ConfigurationController;
use App\Http\Controllers\Settings\TranslationController;

// Registered, activated, and is current user routes.
Route::group(['middleware' => ['auth']], function () {
        // General Settings
        Route::prefix('settings')->group(function () {
        Route::get('/general', [SettingController::class, 'index'])->name('settings.general');
        Route::post('/general/store', [SettingController::class, 'store'])->name('general.store');  
        
        //API Key settings
        Route::get('/apikeys', [ApiController::class, 'index'])->name('settings.index');   
        Route::post('/apikeys/store', [ApiController::class, 'store'])->name('apikeys.store'); 

        //Configuration settings
         Route::get('/configuration', [ConfigurationController::class, 'index'])->name('configuration.index');   
        Route::post('/configuration/store', [ConfigurationController::class, 'store'])->name('configuration.store'); 

        //Translation settings
        Route::get('/translation/create', [TranslationController::class, 'create'])->name('language.create'); 
        Route::post('/translation/store', [TranslationController::class, 'store'])->name('language.store');   
        Route::get('/translation', [TranslationController::class, 'index'])->name('translation.index');   
        Route::get('/translation/edit/{lang}/{file?}', [TranslationController::class, 'edit'])->name('translation.edit');
        Route::post('/translation/save', [TranslationController::class, 'save'])->name('translation.save');
        Route::post('/translation/translate', [TranslationController::class, 'translate'])->name('translation.translate');  

    });

});
