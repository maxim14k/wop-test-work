jQuery(document).ready(function($) {

    /** Color picker для мета-поля Цвет авто */
    $('#colorpicker').hide();
    
    $('#colorpicker').farbtastic('#color');
    if ( $("#car_meta_price").val().length === 0 )
        {
        var input = $( "#car_meta_price" );
         input.val( input.val() + "#ffffff" );
        }
    $('#car_meta_price').click(function() {
        $('#colorpicker').fadeIn();
    });
    
    $(document).mousedown(function() {
        $('#colorpicker').each(function() {
            var display = $(this).css('display');
            if ( display == 'block' )
                $(this).fadeOut();
        });
    });

    /** end */

});