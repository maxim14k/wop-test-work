<?php

get_header();

$brand = get_the_terms(get_the_ID(), 'brand')[0]->name;
$country = get_the_terms(get_the_ID(), 'country')[0]->name;
$color = get_post_meta(get_the_ID(), 'car_meta_color', true);
$fuel = get_post_meta(get_the_ID(), 'car_meta_fuel', true);
$power = get_post_meta(get_the_ID(), 'car_meta_power', true);;
$price = get_post_meta(get_the_ID(), 'car_meta_price', true);;

?>

<div class="content">
    <h1><?php the_title(); ?></h1>
    <div class="meta_field"><span>Brand: </span><?php echo $brand; ?></div>
    <div class="meta_field"><span>Country: </span><?php echo $country; ?></div>
    <div class="meta_field"><span>Color: </span><div class="color-block" style="background-color:<?php echo $color; ?>"></div></div>
    <div class="meta_field"><span>Fuel: </span><?php echo get_fuel_name($fuel); ?></div>
    <div class="meta_field"><span>Power: </span><?php echo $power; ?></div>
    <div class="meta_field"><span>Price: </span><?php echo $price; ?></div>
</div>


<?php get_footer(); ?>