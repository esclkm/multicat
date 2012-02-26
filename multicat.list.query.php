<?php

/* ====================
 * [BEGIN_COT_EXT]
 * Hooks=page.list.query
 * Order=100
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

$multicatwhere = str_replace('page_cat', 'mc_pagecat', $where['cat']);

$sql_mc = $db->query("SELECT mc_pageid FROM $db_multicat WHERE $multicatwhere");
$pageidin = array();
while ($pag_mc = $sql_mc->fetch())
{
	$pageidin[] = (int)$pag_mc['mc_pageid'];
}

if (count($pageidin) > 0)
{
	$pageidins = " page_id IN (".implode(", ", $pageidin).")";
	$where['cat'] = "(" . $where['cat'] . " OR " . $pageidins . ")";
}

?>
