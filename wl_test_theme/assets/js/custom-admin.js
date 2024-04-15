jQuery(document).ready(function($) {

    /** Call ColorPicker */
    jQuery('#car_meta_color').each(function(){
        jQuery(this).wpColorPicker();
    });
    /** end */

    /** change Select Fuel */
    var car_meta_fuel = $('#car_meta_fuel').attr('data-value');  console.log(car_meta_fuel);
    $("#car_meta_fuel").val(car_meta_fuel).change();
    /** end */
});