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
	
	<script>hljs.initHighlightingOnLoad();</script>
	<style type="text/css" media="screen">
	 #editor { 
	     position: absolute;
	 }
	</style>

	<script>
	 $( document ).ready(function() {
	    var editor = ace.edit("editor");
	    editor.setTheme("ace/theme/monokai");
	    editor.session.setMode("ace/mode/javascript");
	    
	    $("#editor").height($("body").height() - $("nav").height() - 3);
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
		
		// document.getElementById('display').innerHTML = parsedText;
		// $('pre code').each(function(i, block) {
		//     hljs.highlightBlock(block);
		// });

		// $('#save').hide();
		// $('#code').hide();
		// $('#edit').show();
		// $('#compile').show();
		// $('#run').show();
		// $('#displayarea').show();
	    });
	 });
	 
	</script>
    </head>

    <body>
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
	<div class="col-xs-12 col-sm-12 col-md-12" id="editor">
	    function foo(items) {
	    var x = "All this is syntax highlighted";
	    return x;
	    }
	</div>
	<script src="/scs/ace-builds/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
	<script>
	</script>
    </body>
</html>
