<?php
/**
 * @package   gantry
 * @subpackage core
 * @version   2.0.10 February 4, 2010
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2010 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 * Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
 *
 */
defined('JPATH_BASE') or die();

/**
 * Base class for all Gantry custom features.
 *
 * @package gantry
 * @subpackage core
 */
class GantryLayout {
    var $render_params = array();

    function render($params = array()){
        global $gantry;
        ob_start();
        return ob_get_clean();
    }

    function _getParams($params = array()){
        $ret = new stdClass();
        $ret_array = array_merge($this->render_params, $params);
        foreach($ret_array as $param_name => $param_value){
            $ret->$param_name = $param_value;
        }
        return $ret;
    }
}