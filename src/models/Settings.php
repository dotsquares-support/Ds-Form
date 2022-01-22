<?php


/**
 * DS Form  plugin for Craft CMS 3.x
 *
 * DS Form
 *
 * @link      https://www.dotsquares.com/
 * @copyright Copyright (c) 2022 Dotsquares
 */

namespace ds\dsform\models;
use ds\dsform\dsform;


use Craft;
use craft\base\Model;


/**
 * DS Form Model
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 
 */


class Settings extends Model
{
   // Public Properties
    // =========================================================================

   
    public $title;
    public $email;
    public $fromemail;
   

    // Returns the validation rules for attributes.

    
    
    public function gettitle()
    {     
        return Craft::parseEnv(trim(dsform::getInstance()->getSettings()->title));
    }
    
    public function getemail()
    {     
        return Craft::parseEnv(trim(dsform::getInstance()->getSettings()->email));
    }

    public function getfromemail()
    {     
        return Craft::parseEnv(trim(dsform::getInstance()->getSettings()->fromemail));
    }
   
    
    
}