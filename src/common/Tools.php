<?php
/**
 * @author zjl <[<email address>]>
 */
namespace src\common;

use \src\crypto\JsonMapper\JsonMapper;
use \src\exception\SDKException;

class Tools{ 
    /**
     * [isEmpty description]
     * @param  [type]  $info [description]
     * @return boolean       [description]
     */
   static public function isEmpty($info){
        if(empty($info)) {
            return true;
        }
        else {
            return false;
        }   
   }

   /**
    * [isNULL description]
    * @param  [type]  $info [description]
    * @return boolean       [description]
    */
   static public function isNULL($info){
        if(!isset($info)  || is_null($info)) {
            return true;
        }
        else {
            return false;
        }   
   }

   static public function BU2MO($bu) {
        if (is_string($bu) || !is_numeric($bu) || $bu < 0) {
            return false;
        }
        $mo = (int)bcmul($bu, pow(10, 8), 0);
        if (!is_int($mo)) {
            return false;
        }
        return $mo;
   }

   static public function MO2BU($mo) {
       if (!is_int($mo) || $mo < 0) {
           return false;
       }
       $bu = bcdiv($mo, pow(10, 8), 8);
       return $bu;
   }

   static public function jsonToClass($json, $class) {
       try {
           $mapper = new JsonMapper();
           $mapper->bStrictNullTypes = false;
           $resultObject = json_decode($json);
           $classContent = $mapper->map($resultObject, $class);
       }
       catch (\Exception $exception) {
           throw new SDKException("SYSTEM", $exception->getMessage());
       }
       return $classContent;
   }

   static public function jsonArrayToClassArray($jsonArray, $className) {
       try {
           $mapper = new JsonMapper();
           $mapper->bStrictNullTypes = false;
           $resultObject = json_decode($jsonArray);
           $classContent = $mapper->mapArray($resultObject, array(), $className);
       }
       catch (\Exception $exception) {
           throw new SDKException("SYSTEM", $exception->getMessage());
       }
       return $classContent;
   }
}