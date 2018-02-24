<html>
    <head>
	<title>SCS - FOSEditor</title>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
	<!-- link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" -->
	<!-- script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script -->
	<!-- link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"-->

	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<!-- jQuerry.terminal -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.terminal/1.11.4/js/jquery.terminal.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.terminal/1.11.4/css/jquery.terminal.min.css" rel="stylesheet"/>

	<script src="ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
	<script>hljs.initHighlightingOnLoad();</script>
	<style type="text/css" media="screen">
	</style>
	
	<script>
	 $( document ).ready(function() {
	     var editor = ace.edit("editor");
	     editor.setTheme("ace/theme/ambiance");
	     editor.session.setMode("ace/mode/javascript");
	     var available_height = $("body").height() - $("nav").height() - 3;
	     
	     $("#editor").height(available_height * 0.7);//$("body").height() - $("nav").height() - 3);
	     $("#terminal").height(available_height * 0.3);
	     $('#save').click(function() {
		 var element = editor.getValue();
		 parsedText = parseAngleBrackets(element);
		 var filename = $("#filename").val();
		 $.post("save.php",
			{
			    'filename': filename,
			    'filetext' : element
			},
			function(data, status){
			    console.log(status);
			}
		 );
	     });
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
    </head>

    <body>
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
		<div class="col-xs-12 col-sm-12 col-md-12">
		    <div id="editor">
		    function foo(items) {
			var x = "All this is syntax highlighted";
			return x;
			}
		    </div>
		</div>
	    </div>
	    <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
		    <div id="terminal"></div>
		</div>
	    </div>
	</div>
    </body>
</html>
