<?php

/**
 * DS Form plugin for Craft CMS 3.x
 *
 * DS Form
 *
 * @link      https://www.dotsquares.com/
 * @copyright Copyright (c) 2022 Dotsquares
 */


namespace ds\dsform\variables;
use ds\dsform\dsform;

use Craft;


class dsformVariable

    // Public Methods
    // =========================================================================
     /**
     * Whatever you want to output to a Twig template can go into a Variable method.
     * You can have as many variable functions as you want.  From any Twig template,
     * call it like this:
     *
     *     {{ craft.dsform.dscontactform() }}
     *  */
{
    public function dscontactform()
    {     

       return dsform::getInstance()->dsformService->dsforms();
    }

}
