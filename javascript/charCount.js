$(document).ready(function() {
    var text_max = 5000;
    $('#textarea_feedback').html(text_max + ' Zeichen übrig');

    $('#NewsContent').keyup(function() {
        var text_length = $('#NewsContent').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' Zeichen übrig');
    });
});