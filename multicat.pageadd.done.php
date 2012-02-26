<?php
/* ====================
 * [BEGIN_COT_EXT]
 * Hooks=page.add.add.done,page.edit.update.done
 * [END_COT_EXT]
==================== */
/**
 * multicat for Cotonti CMF
 *
 * @version 2.00
 * @author esclkm, http://www.littledev.ru
 * @copyright (с) 2011 esclkm, http://www.littledev.ru
 */

defined('COT_CODE') or die('Wrong URL');

$db_multicat = !empty($db_multicat) ? $db_multicat : $db_x.'multicat';

global $pagemulticat;

$db->query("DELETE FROM $db_multicat WHERE mc_pageid='$id'");

if (is_array($pagemulticat))
{
	foreach ($pagemulticat as $pagemcat)
	{
		$pagemcat = cot_import($pagemcat,'D','TXT');		
		$db->query("INSERT INTO $db_multicat (mc_pageid, mc_pagecat) VALUES (".(int)$id.", '".$db->prep($pagemcat)."')");
	}
}

?>