<?php 

namespace App\Dexlib;

abstract class Form {

    abstract static protected function get();

    /**
     * @var array
     */
    public static $_model = [];



     /**
     * set the model
     *
     * @return array
     */
    public static function setModel($model)
    {
        self::$_model = $model;
    }


     /**
     * Get the validation rules for fields
     *
     * @return array
     */
    public static function getValidationRules()
    {
        return self::getDefinedFields()->pluck('rules', 'name')
            ->reject(function ($val) {
            return is_null($val);
        })->toArray();
    }

    /**
     * Get all the fields from config
     *
     * @return Collection
     */
    private static function getDefinedFields()
    { 
        return collect(self::$_model)->pluck('elements')->flatten(1);
    }

    /**
     * Get the data type
     *
     * @param $field
     * @return mixed
     */
    public static function getDataType($field)
    {
        $type  = self::getDefinedFields()
                ->pluck('data', 'name')
                ->get($field);

        return is_null($type) ? 'string' : $type;
    }
}