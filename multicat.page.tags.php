<?php
/* ====================
 * [BEGIN_COT_EXT]
 * Hooks=page.tags
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

$sql_mc = $db->query("SELECT mc_pagecat FROM $db_multicat WHERE mc_pageid='$id'");
$page_form_categories = '<li class="maincat">' . cot_breadcrumbs(cot_structure_buildpath('page', $pag['page_cat']), false) . '</li>';
while ($pag_mc = $sql_mc->fetch())
{
	$page_form_categories .= '<li>' . cot_breadcrumbs(cot_structure_buildpath('page', $pag_mc['mc_pagecat']), false) . '</li>';
}
$t->assign('PAGE_MULTICAT', '<ul class="multicat">' . $page_form_categories . '</ul>');
?>