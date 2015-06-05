$(function() {
    $('.up, .down').click(function() {
        var $voteContainer = $(this).closest('div');
        var originalScore = Number($voteContainer.data('original-score'));
        var action = ($(this).hasClass('up')) ? 'up' : 'down';
        var clicked = ($(this).hasClass('upColor') || $(this).hasClass('downColor')) ? true : false;
        $voteContainer.find('.upColor').removeClass('upColor');
        $voteContainer.find('.downColor').removeClass('downColor');
        if (clicked)
        {
            $voteContainer.find('.count').html(originalScore);
            return;
        }
        switch (action)
        {
            case 'up':
                $voteContainer.find('.count').html(originalScore + 1);
                $(this).addClass('upColor');
            break;
            case 'down':
                $(this).addClass('downColor');
                if (originalScore == 0)
                {
                    $voteContainer.find('.count').html(0);
                }
                else
                {
                    $voteContainer.find('.count').html(originalScore - 1);
                }
            break;
        }
    });

});
