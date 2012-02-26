<?php
/* ====================
 * [BEGIN_COT_EXT]
 * Hooks=page.add.add.first,page.edit.update.first
 * Order=10
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
$pagemulticat = cot_import('pagemulticat','P','ARR');

$newpagecat = cot_import('newpagecat','P','TXT');
$rpagecat = cot_import('rpagecat','P','TXT');

if(is_array($pagemulticat))
{
	$pagemulticat = array_unique($pagemulticat);
	$pagemulticat = array_diff($pagemulticat,array($newpagecat, $rpagecat, ''));
}

?>