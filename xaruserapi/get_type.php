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
  *  @param  integer    typeId    the ID of the mime type to lookup   (optional)
  *  @param  integer    typeName  the Name of the mime type to lookup (optional)
  *  returns array      An array of (typeId, typeName) or an empty array
  */

function mime_userapi_get_type( $args )
{

    extract($args);

    if (!isset($typeId) && !isset($typeName)) {
        throw new BadParameterException('typeName');
    }

    // Get database setup
    $dbconn = xarDBGetConn();
    $xartable     = xarDBGetTables();

    $where = ' WHERE ';

    if (isset($typeId)) {
        $where .= ' xar_mime_type_id = ' . $typeId;
    } else {
        $where .= " xar_mime_type_name = '".strtolower($typeName)."'";
    }

    // table and column definitions
    $type_table = $xartable['mime_type'];

    $sql = "SELECT xar_mime_type_id,
                   xar_mime_type_name
              FROM $type_table
            $where";

    $result = $dbconn->Execute($sql);

    if (!$result || $result->EOF)  {
        return array();
    }

    $row = $result->GetRowAssoc(false);

    return array('typeId'   => $row['xar_mime_type_id'],
                 'typeName' => $row['xar_mime_type_name']);
}

?>
