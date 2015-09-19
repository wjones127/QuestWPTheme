// Adding drop cap to articles
$(document).ready( function() {
    var first_paragraph, open_tag, close_tag, first_letter,
    paragraph_length, rest_of_paragraph, i;
    
    function hasIMG(element) {
        // Checks if the paragraph node has an image
        return $(element).children('img').length != 0;
    };
    function getParagraph() {
        // Find the first paragraph that isn't an image.
        var i = 1;
        var paragraphs = $('article p');
        var the_paragraph = paragraphs[1];
        while (hasIMG(the_paragraph)) {
            i++;
            the_paragraph = paragraphs[i];
        };
        return the_paragraph;
    };
    function addDCTag(text) {
        // Adds the drop cap tag to the beginning of text
        var fl_re = /^(["']|&ldquo;|&lsquo;|&dquo;|&squo;){0,1}[A-z]{1}/;
        var open_tag = '<span class="dropcap">';
        var close_tag = '</span>';
        return text.replace(fl_re, open_tag + '$&' + close_tag);
    };
    function applyToText(html, func) {
	// Applies func to html after removing all html tags in the beginning
	var tag_re = /<[^>]*>/;
	var tags = '';
	while (html[0] == '<') {
	    var match = tag_re.exec(html);
	    tags += match[0];
	    html = html.slice(match[0].length);
	}
	return tags + func(html);
    }

    first_paragraph = getParagraph();
    first_paragraph.innerHTML = applyToText(first_paragraph.innerHTML, addDCTag);

    // We retrieve our drop cap elements using a class selector...
    var dropcaps = document.querySelectorAll(".dropcap");
    // ...then give them a height of three lines.
    // By default, the drop cap's baseline will also be the third paragraph line.
    window.Dropcap.layout(dropcaps, 3);
});
