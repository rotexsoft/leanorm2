<?php
namespace LeanOrm2\Utils;

/**
 * Description of Array
 *
 * @author Rotimi Adegbamigbe
 */
class Arrays {

    public static function array_get(array &$array, $key, $default_value = null) {

        if (array_key_exists($key, $array)) {

            return $array[$key];
            
        } else {

            return $default_value;
        }
    }

    /**
     * 
     *  based on http://stackoverflow.com/questions/1019076/how-to-search-by-key-value-in-a-multidimensional-array-in-php
     * 
     */
    public static function search_r(&$array, $key, $value, &$results) {

        if (!is_array($array)) {
            return;
        }

        if (array_key_exists($key, $array) && $array[$key] === $value) {

            $results[] = $array;
        }

        foreach ($array as $subarray) {

            search_r($subarray, $key, $value, $results);
        }
    }

    public static function search_2d(&$array, $key, $value, &$results) {

        foreach ($array as &$avalue) {

            if (array_key_exists($key, $avalue) && $avalue[$key] === $value) {

                $results[] =& $avalue;
            }
        }
    }
}
