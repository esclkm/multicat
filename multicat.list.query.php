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
// Tables and extras
cot::$db->registerTable('multicat');

$multicatwhere = str_replace('page_cat', 'mc_pagecat', $where['cat']);

$pageidin = $db->query("SELECT mc_pageid FROM $db_multicat WHERE $multicatwhere")->fetchAll(PDO::FETCH_COLUMN, 0);

if (is_array($pageidin) && count($pageidin) > 0)
{
	$pageidins = " page_id IN (".implode(", ", $pageidin).")";
	$where['cat'] = "(" . $where['cat'] . " OR " . $pageidins . ")";
}
