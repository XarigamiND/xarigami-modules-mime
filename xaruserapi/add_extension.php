<?php
/**
 * Mime Module
 *
 * @package modules
 * @copyright (C) 2002-2007 The Digital Development Foundation
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 *
 * @subpackage Xarigami Mime Module
 * @copyright (C) 2008-2010 2skies.com
 * @link http://xarigami.com/project/mime
 * @author Carl P. Corliss
 */
/**
  *  Get the name of a mime type
  *  @access public
  *  @param  integer    $subtypeId      the subtype ID to add an extension for
  *  @param  string     $extensionName  the extension name to add
  *  returns array      An array of (subtypeId, extension) or an empty array
  */

function mime_userapi_add_extension( $args )
{
    extract($args);

    if (!isset($subtypeId)) {
        throw new EmptyParameterException('subtypeId');
    }

    if (!isset($extensionName)) {
       throw new EmptyParameterException('extensionName');
    }

    // Get database setup
    $dbconn = xarDBGetConn();
    $xartable     = xarDBGetTables();

    // table and column definitions
    $extension_table = $xartable['mime_extension'];
    $extensionId     = $dbconn->GenID($extension_table);

    $sql = "INSERT
              INTO $extension_table
                 ( xar_mime_subtype_id,
                   xar_mime_extension_id,
                   xar_mime_extension_name
                 )
            VALUES (?, ?, ?)";
    $bindvars = array((int) $subtypeId, $extensionId, (string) strtolower($extensionName));

    $result = $dbconn->Execute($sql,$bindvars);

    if (!$result) {
        return FALSE;
    } else {
        return $dbconn->PO_Insert_ID($extension_table, 'xar_mime_extension_id');
    }
}

?>
