<?php 

namespace App\Dexlib;
use Arr;

abstract class Form {

    abstract static protected function getElements();

    /**
     * @var array
     */
    public static $_model = [];
    /**
     * @var array
     */
    public static $_values = [];


    /**
     * Form elements
     * @var array
     */
    protected static $_elements = array();


    /**
     * @var array
     */
    public function __construct($obj = null) {
        if (empty(self::$_elements) && !empty($obj)) {
            $this->setElements($obj->getElements());
        }
    }


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
     * set the elements
     *
     * @return array
     */
    public static function setElements($elements)
    {
        self::$_elements = $elements;
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
    public static function getDefinedFields()
    {   
        if (!empty(self::$_elements)) {
            return collect(self::$_elements)->pluck('elements')->flatten(1);
        }

        return [];
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


     /**
     *set form values
     *
     * @param $array|data
     * @return $array
     */
    public static function populate($values = []){
       
        $collection = [];
        self::$_values = $values;
        if (!empty(self::$_elements)) {
            foreach (self::$_elements as $key => $value) {

                if(Arr::exists($value, 'elements')){
                    $value['elements'] = collect($value['elements'])->map(function ($item){ 
                        $formData = self::$_values;
                        
                        if(Arr::exists($formData, $item['name'])){
                            $item['value'] = !empty($formData[$item['name']]) ? $formData[$item['name']] : '';
                        }else{
                             $item['value'] = !empty($item['value']) ? $item['value'] : '';
                        }
                        
                       return $item;
                       
                    })->toArray();

                    $collection[$key] = $value;
                }
            }
        }
        
        return $collection;        
    }


}