<?php 
/**
 * Ds Form plugin for Craft CMS 3.x
 *
 *
 * @link      https://dotsquares.com
 * @copyright Copyright (c) 2021 dotsquares
 */


namespace ds\dsform\resources;

use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;


/**
 * Ds FormAsset AssetBundle
 *
 * AssetBundle represents a collection of asset files, such as CSS, JS, images.
 *
 * Each asset bundle has a unique name that globally identifies it among all asset bundles used in an application.
 * The name is the [fully qualified class name](http://php.net/manual/en/language.namespaces.rules.php)
 * of the class representing it.
 *
 * An asset bundle can depend on other asset bundles. When registering an asset bundle
 * with a view, all its dependent asset bundles will be automatically registered.
 *
 * http://www.yiiframework.com/doc-2.0/guide-structure-assets.html
 *
 * @author    dotsquares
 * @package   DsForm
 * @since     1.0.0
 */

class DsformAsset extends AssetBundle
{
    
    // Public Methods
    // =========================================================================

    /**
     * Initializes the bundle.
     */

    public function init()
    {
     
        // define the path that your publishable resources live
        $this->sourcePath = '@ds/dsform/resources';

        // define the dependencies
        $this->depends = [
            CpAsset::class,
        ];

        // define the relative path to CSS files that should be registered with the page
        $this->js = [
           
           
            'js/custom.js',
        ];
        
        
      
    
    
        
        $this->css = [
            'css/style.css',

        ];

        parent::init();
    }
}
