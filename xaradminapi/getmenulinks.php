<?php
/**
 * Pass individual menu items to the admin panels
 *
 * @package modules
 * @copyright (C) 2002-2007 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Mail module
 * @copyright (C) 2009 2skies.com
 * @link http://xarigami.com/projects/mime
 * @author Xarigami Team 
 */

/**
 * utility function pass individual menu items to the admin panels
 *
 */
function mime_adminapi_getmenulinks()
{
    // Security Check
    $menulinks = array();

        $menulinks[] = Array('url' => xarModURL('mime','admin','modifyconfig'),
            'title' => xarML('Modify the configuration'),
            'label' => xarML('Modify Config'),
            'active' => array('modifyconfig')            
            );

    return $menulinks;
}
?>