<div class="car-meta-block">
    <div class="field field-color">
        <label for="car_meta_color">Color</label>
        <input type="text" id="car_meta_color" name="car_meta_color" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'car_meta_color', true)); ?>">
    </div>
    <div class="field">
        <label for="car_meta_fuel">Fuel</label>
        <select name="car_meta_fuel" id="car_meta_fuel" data-value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'car_meta_fuel', true)); ?>">
            <option value="patrol">Petrol</option>
            <option value="diesel" selected>Diesel</option>
            <option value="gas">Gas</option>
        </select>
    </div>
    <div class="field">
        <label for="car_meta_power">Power</label>
        <input type="number" id="car_meta_power" name="car_meta_power" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'car_meta_power', true)); ?>">
    </div>
    <div class="field">
        <label for="car_meta_price">Price</label>
        <input type="number" id="car_meta_price" name="car_meta_price" value="<?php echo esc_attr(get_post_meta(get_the_ID(), 'car_meta_price', true)); ?>">
        
    </div>
</div>

