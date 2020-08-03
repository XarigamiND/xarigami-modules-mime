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
 * The main administration function
 * This function redirects to the modify config function
 * @access public
 * @return bool true on success
 */
function mime_admin_main()
{
    // Security check
    if(!xarSecurityCheck('AdminAll')) return;

    xarResponseRedirect(xarModURL('mime', 'admin', 'modifyconfig'));
    return true;
}

?>