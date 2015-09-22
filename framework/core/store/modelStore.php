<?php
/**
 * Created by PhpStorm.
 * User: prateek
 * Date: 20/09/15
 * Time: 10:16 AM
 */

namespace Lp\Framework\Core\Store;


class ModelStore extends StoreParent
{
    const DIR_TO_SEARCH = "models";
    /**
     * Static array which stores loaded models
     * @var array
     */
    private static $modelStore = array();

    /**
     * Make sure only one instance of this class ever exists.
     * @var
     */
    private static $_instance;

    /**
     * make this class static
     */
    private function __construct(){}

    /**
     * Standard get instance method.
     * if instance is null create own object else return instance
     *
     * @return ModelStore
     */
    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Gets the model object if exist in the store.
     *
     * @param $key mixed
     * @return bool
     */
    public function getFromStore($key)
    {
        if (in_array($key, self::$modelStore)) {
            return self::$modelStore[$key];
        } else {
            echo "its false";
            return false;

//            return $this->getFromFileStoreAndSave($key, self::DIR_TO_SEARCH_MODELS);
        }
    }

    /**
     * Save the model object against key.
     *
     * @param $key
     * @param $value
     * @return bool
     */
    public function saveInStore($key, $value)
    {
        $this->checkKeyValue($key, $value);
        self::$modelStore[$key] = $value;
        return $value;
    }

    private function __clone(){}
}