$(document).ready(function() {
	// Variablen zur Textlänge
    var textMaxContent = 5000;
    var textMaxSnippet = 110;

    $('#NewsContent').elastic();

    // Anzeigen der übrigen Zeichen für den Newsinhalt
    $('#feedbackC').html(textMaxContent + ' Zeichen übrig');

    $('#NewsContent').keyup(function() {
        var text_length = $('#NewsContent').val().length;
        var text_remaining = textMaxContent - text_length;

        $('#feedbackC').html(text_remaining + ' Zeichen übrig');
    });


    // Anzeigen der übrigen Zeichen für das Newssnippet
    $('#feedbackS').html(textMaxSnippet + ' Zeichen übrig');

    $('#SocialMediaSnippet').keyup(function() {
        var text_length = $('#SocialMediaSnippet').val().length;
        var text_remaining = textMaxSnippet - text_length;

        $('#feedbackS').html(text_remaining + ' Zeichen übrig');
    });
});
