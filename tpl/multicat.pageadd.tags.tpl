<!-- BEGIN: MAIN -->

<!-- BEGIN: ROW -->
<div class="multicat" {STYLE}>
	{CATSELECT}
	<input name="deloption" value="x" type="button" class="delcat" />
</div>
<!-- END: ROW -->
<input id="addcat" name="addcat" value="{PHP.L.Add}" type="button" style="display:none;" />	
<script type="text/javascript">
	$(".delcat").live("click", function() {
		$(this).closest(".multicat").children("select").attr("name", "pagemulticat[]");
		if ($(".multicat").length > 1)
		{
			$(this).closest(".multicat").remove();
		}
		return false;
	});

	$(document).ready(function() {
		$("#addcat").click(function() {
			$(".multicat").last().clone().insertAfter($(".multicat").last()).show().children("select").attr("name", "pagemulticat[]");
			return false;
		});
		$("#addcat").show();
	});
</script>

<!-- END: MAIN -->