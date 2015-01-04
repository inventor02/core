<?php

defined('SYSPATH') or die('No direct script access.');

class Enum_Training_Course_Theory extends \Enums\Base {
    const NONE = 0;
    const REQUIRED = 1;
    const AVAILABLE = 2;
    
    public static function getDescription($value){
        switch($value){
            case self::NONE:
                 return "No theory assessment";
            case self::REQUIRED:
                 return "Theory assessment is mandatory to course completion";
            case self::AVAILABLE:
                 return "Theory material and/or optional tests are available for this course"; 
            default:
                 return parent::getDescription($value);
        }
    }
    
}