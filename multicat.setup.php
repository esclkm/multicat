<?php

/* ====================
 * [BEGIN_COT_EXT]
 * Code=multicat
 * Name=Multicat
 * Description=Multicat for shop plug
 * Version=1.0
 * Date=2010-Dec-20
 * Author=esclkm, http://www.littledev.ru
 * Copyright=(с) 2010 esclkm, http://www.littledev.ru
 * Notes=
 * SQL=
 * Auth_guests=R
 * Lock_guests=W12345A
 * Auth_members=R
 * Lock_members=12345
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

if($action == 'install' && $z == 'admin')
{
    $db->query( "CREATE TABLE IF NOT EXISTS $db_multicat (
        `mc_id` INT(12) NOT NULL AUTO_INCREMENT,
        `mc_pageid` INT(12),
        `mc_pagecat` VARCHAR(256) NOT NULL,
        PRIMARY KEY (mc_id)
        );");
}
?>