<?php


function func_show_detail_deal(){

$deal_id = isset($_GET['deal_id']) ? $_GET['deal_id'] : '';

ob_start();

$featured_img_url = get_the_post_thumbnail_url($deal_id);
$deal_name        = get_the_title($deal_id);

$classes      = wp_get_post_terms( $deal_id, 'deal_class' );
$airlines     = wp_get_post_terms( $deal_id, 'deal_airline' );
$price        = get_post_meta( $deal_id, 'deal_price', true );
$price_fm     = number_format($price, 0, ',', ',');
$price_tax    = get_field( 'deal_price_tax', $deal_id );

$class_titles   = [];
$airline_titles = [];

if ( !empty( $classes ) ) foreach ( $classes as $class ) $class_titles[] = $class->name;
if ( !empty( $airlines ) ) foreach ( $airlines as $airline ) $airline_titles[] = $airline->name;

if ( empty($deal_id ) ) {
    return;
}
?>
<div class="detail-wrapper-shortcode">

    <?php

    ?>

    <input id="deal-name" type="hidden" name="deal-name" value="<?php echo $deal_name;?>">
    <input id="deal-url" type="hidden" name="deal-url" value="<?php echo get_the_permalink($deal_id);?>">
    <input id="deal-airline" type="hidden" name="deal-airline"
        value="<?php echo !empty($airline_titles) ? implode( ', ', $airline_titles ) : 'No';?>">
    <input id="deal-class" type="hidden" name="deal-class"
        value="<?php echo !empty($class_titles) ? implode( ', ', $class_titles ) : 'No';?>">

    <div class="detail-wrap">

        <?php if ( !empty($featured_img_url) ) {
            ?>
        <div class="featured-image">
            <img src="<?php echo $featured_img_url;?>" alt="<?php echo $deal_name;?>">
        </div>
        <?php
        } ?>

        <div class="info">
            <div class="left">

                <div class="box">
                    <h4>Deal Name:</h4>
                    <span><?php echo $deal_name;?></span>
                </div>

                <?php if ( !empty( $airline_titles ) ) : ?>
                <div class="box">
                    <h4>Airline:</h4>
                    <span><?php echo implode( ', ', $airline_titles ); ?></span>
                </div>
                <?php endif; ?>

                <?php if ( !empty( $class_titles ) ) : ?>
                <div class="box">
                    <h4>Class:</h4>
                    <span><?php echo implode( ', ', $class_titles ); ?></span>
                </div>
                <?php endif; ?>

            </div>

            <div class="right">
                <div class="deal-price">
                    From
                    <span>$<?php echo $price_fm; ?></span>

                    <?php 
                    if ( $price_tax ) {
                        echo $price_tax;
                    }
                    ?>
                </div>
            </div>

        </div>

    </div>
</div>
<?php
return ob_get_clean();
}
add_shortcode('sc_detail_deal', 'func_show_detail_deal');

?>