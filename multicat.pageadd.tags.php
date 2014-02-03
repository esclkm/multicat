<?php

/* ====================
 * [BEGIN_COT_EXT]
 * Hooks=page.add.tags
 * Order=10
 * Tags=page.add.tpl:{MULTICAT_SELECTOR}
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

if (is_array($pagemulticat))
{
	foreach ($pagemulticat as $pagemcat)
	{
		$page_form_mcategories .= '<div class="multicat">' . cot_selectbox_structure('page', $pagemcat, 'pagemulticat[]') . '<input name="deloption" value="x" type="button" class="delcat" style="display:none;" />
</div>';
	}
}

$t->assign('MULTICAT_SELECTOR', $page_form_mcategories . '
<div class="multicat" style="display:none;">' . cot_selectbox_structure('page', $pagemcat, 'pagemulticatsimple') . '<input name="deloption" value="x" type="button" class="delcat" style="display:none;" />
</div><input id="addcat" name="addcat" value="' . $L['Add'] . '" type="button" style="display:none;" />	
<script type="text/javascript">
$(".delcat").live("click",function () {
	$(this).parent().children("select").attr("name", "pagemulticat[]");
	if ($(".multicat").length > 1)
	{
		$(this).parent().remove();
	}
	return false;
});

$(document).ready(function(){
	$("#addcat").click(function () {
	$(".multicat").last().clone().insertAfter($(".multicat").last()).show().children("select").attr("name","pagemulticat[]");
	return false;
	});
	$("#addcat").show();
	$(".delcat").show();
});
</script>');
?>