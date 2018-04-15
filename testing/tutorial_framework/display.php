<?php
include "../../includes/header.php";
include "../../includes/ace-editor.php";
include "../../includes/jquerry_terminal.php";

$tutorial_file = "sample.xml";
$xml_content = simplexml_load_file($tutorial_file);
function row_wrapper($content){
    return "<div class='row'>
	<div class='col-xs-12 col-sm-10 col-md-8'>
    ".$content."
	</div>
    </div>";
}

$course = row_wrapper("<h3>".$xml_content->course."</h3>");
$tutor = row_wrapper("<div>Tutored by: ".$xml_content->tutor."</div>");
$description = row_wrapper("<div>".$xml_content->description."</div>");
$questions = "";
for($idx = 0; $idx < count($xml_content->question);$idx++){
    $questions .= row_wrapper("Question ".($idx+1).":");
    $questions .= row_wrapper($xml_content->question[$idx]->description);
    $questions .= row_wrapper("<div class='editor'>".$xml_content->question[$idx]->editor."</div>");
}
?>
<script>
 $( document ).ready(function() {
     available_height = $("body").height() - $("nav").height() - 3;
     
     //$(".editor").height(100);//$("body").height() - $("nav").height() - 3);
     $("#terminal").height(available_height * 0.3);
     // $('#save').click(function() {
     // 	 element = editor.getValue();
     // 	 parsedText = parseAngleBrackets(element);
     // 	 var filename = $("#filename").val();
     // 	 $.post("save.php",
     // 		{
     // 		    'filename': filename,
     // 		    'filetext' : element
     // 		},
     // 		function(data, status){
     // 		    console.log(status);
     // 		}
     // 	 );
     // });
     $('#terminal').terminal(function(command, term) {
	 term.pause();
	 $.post('echo_command.php', {command: command}).then(function(response) {
	     term.echo(response).resume();
	 });
     }, {
	 greetings: 'Dummy Terminal'
     });
     
 });
 
</script>

<?php 
include "../../includes/header_end.php";
?>
<div class="container-fluid" style="width:100%">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<div class="navbar-header">
	    <div class="navbar-brand">SCS Online Portal</div>
	</div>
	<div class="input-group-sm form-inline">
	    <input type="text" class="form-control" placeholder="File Name" id="filename">
	    <div class="input-group-append">
		<button class="btn btn-outline-secondary" type="button" id="save">Save</button>
	    </div>
	</div>
	<ul class="navbar-nav">
	    <li class="nav-item active">
		<a class="nav-link" href="#">Active</a>
	    </li>
	    <li class="nav-item">
		<a class="nav-link" href="#">Link</a>
	    </li>
	    <li class="nav-item">
		<a class="nav-link" href="#">Link</a>
	    </li>
	    <li class="nav-item">
		<a class="nav-link disabled" href="#">Disabled</a>
	    </li>
	</ul>
    </nav>
    <div class="row">
	<div class='col-xs-0 col-sm-1 col-md-2'>
	</div>
	<div class='col-xs-12 col-sm-10 col-md-8'>
	    <?php
	    echo $course;
	    echo $tutor;
	    echo $description;
	    echo $questions;
	    ?>
	</div>
    </div>
    <!-- div class="row">
	     <div class="col-xs-12 col-sm-12 col-md-12">
	     <div class="editor">
	     function foo(items) {
	     var x = "All this is syntax highlighted";
	     return x;
	     }
	     </div>
	     </div>
	     </div>
	     
	     <div class="row">
	     <div class="col-xs-12 col-sm-12 col-md-12">
	     <div class="editor">
	     Boohoooooooo
	     </div>
	     </div>
	     </div>
	     <div class="row">
	     <div class="col-xs-12 col-sm-12 col-md-12">
	     <div id="terminal"></div>
	     </div>
	     </div-->
</div>
<?php include "../../includes/footer.php" ?>