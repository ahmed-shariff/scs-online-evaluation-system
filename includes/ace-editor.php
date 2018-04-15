<script src="<?php  echo $ROOT?>/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
 $( document ).ready(function() {
     //alert($(".editor")[0].parentNode.innerHTML)
     $(".editor").each(function(idx, dom){
	 var editor = ace.edit(dom);
	 editor.setTheme("ace/theme/ambiance");
	 editor.session.setMode("ace/mode/javascript");
	 editor.setOptions({
	     "minLines": <?php echo $ACE_MIN_LINES ?>,
	     "maxLines": <?php echo $ACE_MAX_LINES ?>
	 });
     });
 });
</script>
