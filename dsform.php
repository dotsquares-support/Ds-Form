<?php
/**
 * DS Form plugin for Craft CMS 3.x
 *
 * DS Form
 *
 * @link      https://www.dotsquares.com/
 * @copyright Copyright (c) 2021 Dotsquares
 */

namespace ds\dsform;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use ds\dsform\models\Settings;
use ds\dsform\services\dsformService;
use craft\web\twig\variables\CraftVariable;
use ds\dsform\variables\dsformVariable;

use yii\base\Event;



class dsform extends Plugin

{
    public $hasCpSettings = true;
	public static $plugin;
    
    // Public Methods
    // =========================================================================

    public function init()
    {
        parent::init();
         self::$plugin = $this;
         
        // Register our service

        $this->setComponents([
            //classname
            'dsformService' =>  services\dsformService::class,
            
        ]);

        
        // Register our variable
        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                //handle name                             //classname
                $variable->set('dsform', variables\dsformVariable::class);
            }
        );


       
    }

     // Protected Methods
    // =========================================================================
        protected function createSettingsModel()
        {
            return new Settings();
        }
    
    
            // Get the settings that are being defined by template
    
        protected function settingsHtml()
        {
            return \Craft::$app->getView()->renderTemplate(
                // Plugin handle name/settings
                'dsform/settings',
                [ 'settings' => $this->getSettings() ]
            );

        } 
    





}

?>
