<?php
/**
 * Mime module
 *
 * @package modules
 * @copyright (C) 2002-2008 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Mime Module
 * @copyright (C) 2008-2011 2skies.com
 * @link http://xarigami.com/project/mime
 */
/**
 * This is a standard function to modify the configuration parameters of the
 * module
 * @author Ernst Herbst
 */
function mime_admin_modifyconfig()
{
    // Security Check
     if(!xarSecurityCheck('AdminBase',0)) return xarResponseForbidden();
    $data['menulinks'] = xarModAPIFunc('mime','admin','getmenulinks');

    // Generate a one-time authorisation code for this operation
    $data['authid'] = xarSecGenAuthKey();
    // everything else happens in Template for now
    return $data;
}

?>