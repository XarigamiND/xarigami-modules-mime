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
  *  Get the magic number(s) for a particular mime subtype
  *  @access public
  *  @param  integer    subtypeId   the magicId of the magic # to lookup   (optional)788888888888888888888890
  *  returns array      An array of (subtypeid, magicId, magic, offset, length) or an empty array
  */

function mime_userapi_add_magic( $args )
{

    extract($args);

    if (!isset($subtypeId)) {
        throw new EmptyParameterException('subtypeId');
    }

    if (!isset($magicValue)) {
        throw new EmptyParameterException('magicValue');
    }

    if (!isset($magicOffset)) {
       throw new EmptyParameterException('magicOffset');
    }

    if (!isset($magicLength)) {
       throw new BadParameterException('magicLength');
    }

    // Get database setup
    $dbconn = xarDBGetConn();
    $xartable     = xarDBGetTables();

    // table and column definitions
    $magic_table = $xartable['mime_magic'];
    $magicId     =  $dbconn->GenID($magic_table);

    $sql = "INSERT
              INTO $magic_table
                 (
                   xar_mime_subtype_id,
                   xar_mime_magic_id,
                   xar_mime_magic_value,
                   xar_mime_magic_offset,
                   xar_mime_magic_length
                 )
            VALUES (?, ?, ?, ?, ?)";

    $bindvars = array((int) $subtypeId, $magicId, (string) $magicValue, (int) $magicOffset, (int) $magicLength);

    $result = $dbconn->Execute($sql, $bindvars);

    if (!$result) {
        return FALSE;
    } else {
        return $dbconn->PO_Insert_ID($magic_table, 'xar_mime_magic_id');
    }
}

?>
