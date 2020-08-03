<?php
/**
 * Mime Module
 *
 * @package modules
 * @copyright (C) 2002-2008 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Mime Module
 * @copyright (C) 2008-2011 2skies.com
 * @link http://xarigami.com/project/mime
 * @author Carl P. Corliss
 */
$modversion['name']           = 'MIME API';
$modversion['id']             = '999';
$modversion['version']        = '1.2.0';
$modversion['displayname']    = 'Mime';
$modversion['description']    = 'Hook based module that returns the content-type of a given file.';
$modversion['credits']        = 'xardocs/credits.txt';
$modversion['help']           = 'xardocs/help.txt';
$modversion['changelog']      = 'xardocs/changelog.txt';
$modversion['license']        = 'xardocs/license.txt';
$modversion['official']       = 1;
$modversion['author']         = 'Carl P. Corliss <carl.corliss@xaraya.com>';
$modversion['contact']        = 'http://xarigami.com/';
$modversion['homepage']        = 'http://xarigami.com/mime';
$modversion['admin']          = 1;
$modversion['user']           = 0;
$modversion['class']          = 'Utility';
$modversion['category']       = 'Utilities';
$modversion['dependencyinfo']   = array(
                                    0 => array(
                                            'name' => 'core',
                                            'version_ge' => '1.4.0'
                                         )
                                  );
if (false) {
    $d = xarML('Mime');
    $d = xarML('Hook based module that returns the content-type of a given file.');
}
?>