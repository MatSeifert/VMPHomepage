$(document).ready(function() {
    var text_max = 500;
    $('#textarea_feedback').html(text_max + ' Zeichen übrig');

    $('#BugDesc').keyup(function() {
        var text_length = $('#BugDesc').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' Zeichen übrig');
    });
});