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
		<input type="text" name="filename" placeholder="file name" id='filename'>
		<button id="save">Save</button>
		<button id='edit'>Edit</button>
		<button id='compile'>Compile</button>
		<button id='run'>Run</button>
		<div>
			<textarea name="code" cols=50 rows=20 id='code'></textarea>
		</div>
		<div id='displayarea'>
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
			$('#compile').hide();
			$('#run').hide();
		});

		$('#save').click(function() {
			var element = document.getElementById('code');
			parsedText = parseAngleBrackets(element.value);
			var filename = document.getElementById('filename').value;

			$.post("save.php",
				{
					'filename': filename,
					'filetext' : element.value
				},
				function(data, status){
					console.log(status);
				}
			);

			document.getElementById('display').innerHTML = parsedText;
			$('pre code').each(function(i, block) {
		    	hljs.highlightBlock(block);
		      });

			$('#save').hide();
			$('#code').hide();
			$('#edit').show();
			$('#compile').show();
			$('#run').show();
			$('#displayarea').show();
		});

		$('#edit').click(function (){
			$('#edit').hide();
			$('#displayarea').hide();
			$('#save').show();
			$('#code').show();
			$('#compile').hide();
			$('#run').hide();
		});

		$('#compile').click(function() {
			var filename = document.getElementById('filename').value;
			$.post("compile.php", 
				{
					'filename':filename
				},
				function(data, status){
					console.log(status+' \n '+data);
					console.log('---------------------------------------');
				}
			);
		});

		$('#run').click(function() {
			var filename = document.getElementById('filename').value;
			$.post("run.php",
				{'filename':filename},
				function(data, status)
				{
					console.log(data);
					console.log('--------------------------------------');
				});
		});

		$("textarea").keydown(function(e) {
			//stolen from stackoverflow
			if(e.keyCode === 9) { // tab was pressed
			// get caret position/selection
				var start = this.selectionStart;
				var end = this.selectionEnd;

				var $this = $(this);
				var value = $this.val();

				// set textarea value to: text before caret + tab + text after caret
				$this.val(value.substring(0, start)
					+ "\t"
					+ value.substring(end));

					// put caret at right position again (add one for the tab)
					this.selectionStart = this.selectionEnd = start + 1;

					// prevent the focus lose
					e.preventDefault();
				}
			});
		</script>
	</body>
</html>
