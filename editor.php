<html>
	<head>
		<title>SCS - FOSEditor</title>
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="js/custom.js"></script>
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
		<script>hljs.initHighlightingOnLoad();</script>
	</head>

	<body>
		<div>
			<textarea name="code" cols=50 rows=20 id='code'></textarea>
			<button id="save" onclick="transfer();">Save</button>
		</div>
		<div id='displayarea'>
			<button id='edit' onclick="editable();">edit</button>
			<pre>
				<code class="cpp" id="display">
				</code>
			</pre>
		</div>

		<!-- reserved for filemanager -->
		<div class='filemanager'>

		</div>

		<!-- reserved for restricted terminal -->
		<div class='terminal'>

		</div>

		<script>
		$(document).ready(function () {
			$('#edit').hide();
			$('#displayarea').hide();
		});

		function transfer(){
			var element = document.getElementById('code');
			parsedText = parseAngleBrackets(element.value);
			document.getElementById('display').innerHTML = parsedText;
			$('pre code').each(function(i, block) {
		    	hljs.highlightBlock(block);
		      });
			$('#save').hide();
			$('#code').hide();
			$('#edit').show();
			$('#displayarea').show();
		}

		function editable(){
			$('#edit').hide();
			$('#displayarea').hide();
			$('#save').show();
			$('#code').show();
		}
		</script>
	</body>
</html>
