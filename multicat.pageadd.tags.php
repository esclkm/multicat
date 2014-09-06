<?php

/* ====================
 * [BEGIN_COT_EXT]
 * Hooks=page.add.tags,page.edit.tags
 * Order=10
 * Tags=page.add.tpl:{PAGEADD_FORM_MULTICAT};page.edit.tpl:{PAGEEDIT_FORM_MULTICAT};
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

cot::$db->registerTable('multicat');
global $db_multicat;

$t_mc = new XTemplate(cot_tplfile('multicat.pageadd.tags', 'plug'));

if ((int) $id > 0)
{
	$pr = 'EDIT';
}
else
{
	$pr = 'ADD';
}

if (is_array($pagemulticat))
{
	foreach ($pagemulticat as $pagemcat)
	{
		$t_mc->assign('CATSELECT', cot_selectbox_structure('page', $pagemcat, 'pagemulticat[]'));
		$t_mc->parse('MAIN.ROW');
	}
}
elseif ((int) $id > 0)
{
	$sql_mc = $db->query("SELECT mc_pagecat FROM $db_multicat WHERE mc_pageid='$id'");
	while ($pag_mc = $sql_mc->fetch())
	{
		$t_mc->assign('CATSELECT', cot_selectbox_structure('page', $pag_mc['mc_pagecat'], 'pagemulticat[]'));
		$t_mc->parse('MAIN.ROW');
	}
}
$t_mc->assign('CATSELECT', cot_selectbox_structure('page', $pagemcat, 'pagemulticatsimple'));
$t_mc->assign('STYLE', 'style="display:none"');
$t_mc->parse('MAIN.ROW');
$t_mc->parse('MAIN');
$t->assign('PAGE'.$pr.'_FORM_MULTICAT', $t_mc->text('MAIN'));