<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Role Name
    |--------------------------------------------------------------------------
    */

    'defaultRole' => env('ROLES_DEFAULT_USER_MODEL', 'Admin'),
    
    /*
    |--------------------------------------------------------------------------
    | Enable user registration
    |--------------------------------------------------------------------------
    */

    'enableRegister' => env('ENABLE_REGISTER', true),


];