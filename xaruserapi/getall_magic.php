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
function mime_userapi_getall_magic( $args )
{
    extract($args);

    if (isset($subtypeId)) {
        if (is_int($subtypeId)) {
            $where = " WHERE xar_mime_subtype_id = $subtypeId";
        } else {
            $msg = xarML('Supplied parameter [#(1)] for function [#(2)], is not an integer!',
                         'subtypeId','mime_userapi_getall_magic');
            throw new BadParameterException(null,$msg);
        }
    } else {
        $where = '';
    }

    // Get database setup
    $dbconn = xarDBGetConn();
    $xartable     = xarDBGetTables();

    // table and column definitions
    $magic_table = $xartable['mime_magic'];

    $sql = "SELECT xar_mime_subtype_id,
                   xar_mime_magic_id,
                   xar_mime_magic_value,
                   xar_mime_magic_offset,
                   xar_mime_magic_length
              FROM $magic_table
            $where
          ORDER BY xar_mime_subtype_id,
                   xar_mime_magic_offset";

    $result = $dbconn->Execute($sql);

    if (!$result | $result->EOF)  {
        return array();
    }

    while (!$result->EOF) {
        $row = $result->GetRowAssoc(false);

        $subtypeInfo[$row['xar_mime_magic_id']]['magicId']     = $row['xar_mime_magic_id'];
        $subtypeInfo[$row['xar_mime_magic_id']]['subtypeId']   = $row['xar_mime_subtype_id'];
        $subtypeInfo[$row['xar_mime_magic_id']]['magicValue']  = $row['xar_mime_magic_value'];
        $subtypeInfo[$row['xar_mime_magic_id']]['magicOffset'] = $row['xar_mime_magic_offset'];
        $subtypeInfo[$row['xar_mime_magic_id']]['magicLength'] = $row['xar_mime_magic_length'];

        $result->MoveNext();
    }
    $result->Close();

    return $subtypeInfo;
}
?>
