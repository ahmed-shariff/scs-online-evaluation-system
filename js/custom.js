function parseAngleBrackets (text) {
	text = text.replace(/>/g,'&gt;');
	text = text.replace(/</g,'&lt;');

	return text;
}