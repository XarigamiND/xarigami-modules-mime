<?php
/**
 * IEvents module
 *
 * @package modules
 *
 * @subpackage Xarigami Mime Module
 * @copyright (C) 2008-2011 2skies.com
 * @link http://xarigami.com/project/mime
 */
/**
 * Overview displays standard Overview page
 *
 * Only used if you actually supply an overview link in your adminapi menulink function
 * and used to call the template that provides display of the overview
 *
 * @return array xarTplModule with $data containing template data
 * @since 2 Oct 2005
 */
function mime_admin_overview()
{

    $data = array();
    $data['menulinks'] = xarModAPIFunc('mime','admin','getmenulinks');
    /* if there is a separate overview function return data to it
     * else just call the main function that usually displays the overview
     */

    return $data;
}

?>
