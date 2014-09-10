$('#button').toggle( 
    function() {
        $('#right').animate({ left: 250 }, 'slow', function() {
            $('#button').html('Close');
        });
    }, 
    function() {
        $('#right').animate({ left: 0 }, 'slow', function() {
            $('#button').html('Menu');
        });
    }
);