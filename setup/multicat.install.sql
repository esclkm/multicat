/* create table */
CREATE TABLE IF NOT EXISTS cot_multicat (
        `mc_id` INT(12) NOT NULL AUTO_INCREMENT,
        `mc_pageid` INT(12),
        `mc_pagecat` VARCHAR(256) NOT NULL,
        PRIMARY KEY (mc_id)
        );