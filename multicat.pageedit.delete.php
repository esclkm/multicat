<?php

/* ====================
 * [BEGIN_COT_EXT]
 * Hooks=page.edit.delete.done
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

cot::$db->registerTable('multicat');
global $db_multicat;

$db->query("DELETE FROM $db_multicat WHERE mc_pageid='$id'");
