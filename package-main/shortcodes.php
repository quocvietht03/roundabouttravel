<?php

add_shortcode( 'sc_plan_my_trip_classic', 'sc_plan_trip_classic' );
function sc_plan_trip_classic()
{
?>
<div class="page-template-template-plan-trip">
    <div class="main">
        <div id="main" role="main" class="clearfix">
            <h2 id="buildtripheading"></h2>
            <form id="buildtripform" action="#"></form>
            <ul class="steps">
                <li><span id="step1">Step 1</span></li>
                <li><span id="step2">Step 2</span></li>
                <li><span id="step3">Step 3</span></li>
            </ul>
            <div class="answers" style="width: 100px;">
                <h3></h3>
                <ul>
                </ul>
            </div>
            <div class="prev-next" style="display:none;">
                <p class="btn prev"><a href="#"></a></p>
                <p class="btn next"><a href="#"></a></p>
            </div>
            <!-- Below are the hidden pre-rendered tabs for the trip builder, which we use to copy markup for the tabs -->
            <div class="directionform" style="display:none;">
                <p class="question">Which direction do you wish to leave Australia?</p>
                <p class="globe"><img src="/wp-content/themes/roundabouttravel/assets/images/globe.png" alt=""></p>
                <div class="direction">
                    <button><a id="west" href="#"><i class="fa fa-long-arrow-left"></i>West</a></button>
                    <button><a id="east" href="#">East<i class="fa fa-long-arrow-right"></i></a></button>
                </div>
            </div>
            <div class="continentNumberform" style="display:none;">
                <p class="question">How many continents would you like to visit?</p>
                <section class="narrow">
                    <select class="continentNumber">
                        <option value="3" selected="selected">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </section>
            </div>
            <div class="continentDetailsform" style="display:none;">
                <p class="question">What continents do you want to visit?</p>
                <section class="continentSelect" style="padding-left:200px;"><input type="radio" name="continentSelect"
                        value=""></section>
            </div>
            <div class="continentSelectform" style="display:none;">
                <p class="question">What will be the next continent you visit?</p>
                <section class="narrow continentSelect continentOne"><input type="radio" name="continentOne" value="">
                </section>
                <section class="narrow continentSelect continentTwo"><input type="radio" name="continentTwo" value="">
                </section>
                <section class="narrow continentSelect continentThree"><input type="radio" name="continentThree"
                        value="">
                </section>
                <section class="narrow continentSelect continentFour"><input type="radio" name="continentFour" value="">
                </section>
                <section class="narrow continentSelect continentFive"><input type="radio" name="continentFive" value="">
                </section>
                <section class="narrow continentSelect continentSix"><input type="radio" name="continentSix" value="">
                </section>
                <section class="narrow continentSelect continentSeven"><input type="radio" name="continentSeven"
                        value="">
                </section>
            </div>
            <div class="itineraryform" style="display:none;">
                <div class="question-box">
                    <p class="question">What Australian city will you be leaving from?</p>
                    <div class="styled-select styled-select-inline narrow">
                        <select class="cityLeaving">
                            <option>Sydney</option>
                            <option>Melbourne</option>
                            <option>Brisbane</option>
                            <option>Canberra</option>
                            <option>Adelaide</option>
                            <option>Perth</option>
                            <option>Hobart</option>
                            <option>Darwin</option>
                            <option>Gold Coast</option>
                            <option>Sunshine Coast</option>
                            <option>Alice Springs</option>
                            <option>Broome</option>
                            <option>Cairns</option>
                            <option>Launceston</option>
                            <option>Devonport</option>
                        </select>
                    </div>
                </div>
                <div class="question-box">
                    <p class="question">When would you like to leave Australia?
                        Select your preferred departure date.
                    </p>
                    <section class="date narrow clearfix">
                        <input type="text" id="datepicker" class="dateLeaving">
                    </section>
                </div>
                <div class="question-box">
                    <p class="question">What is your preferred travel class?</p>
                    <div class="styled-select styled-select-inline narrow">
                        <select class="travelClass">
                            <option>Economy</option>
                            <option>Premium Economy</option>
                            <option>Business Class</option>
                            <option>First Class</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="question-box itineraryContinentDetailform" style="display:none;">
                <p class="question">Where would you like to go in CONTINENTNAME, and how long would you like to
                    stay?
                </p>
                <section class="asiatransit styled-form-elements">
                    <input type="checkbox" name="" id="asiatransit"> <label for="asiatransit">Transit</label>
                </section>
                <div class="clm2">
                    <div class="box">
                        <div class="styled-select">
                            <select name="country">
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                            </select>
                        </div>
                    </div>
                    <div class="box">
                        <div class="styled-select">
                            <select name="city">
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                            </select>
                        </div>
                    </div>
                </div>
                <section class="number" style="padding-bottom:20px;">
                    How long will you stay?
                    <div class="styled-select styled-select-inline">
                        <select name="stayAmount">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                            <option value="26">26</option>
                            <option value="27">27</option>
                            <option value="28">28</option>
                            <option value="29">29</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                    <span class="styled-form-elements radio-button"><input type="radio" name="stayUnit" id="days">
                        <label for="days">Days</label></span>
                    <span class="styled-form-elements radio-button"><input type="radio" name="stayUnit" id="weeks">
                        <label for="weeks">Weeks</label></span>
                    <span class="styled-form-elements radio-button"><input type="radio" name="stayUnit" id="months">
                        <label for="months">Months</label></span>
                    <span class="styled-form-elements checkbox"><input type="checkbox" name="" id="checkbox"> <label
                            for="checkbox">Make own arrangements to next destination</label></span>
                </section>
                <input class="extraCitiesNo" type="hidden" value="0" />
                <div class="extraCities">
                </div>
                <section class="plus-minus">
                    <p class="btn"><a href="#" name="addDestination"><i class="fa fa-plus"></i> Add destination</a>
                    </p>
                    <p class="btn"><a href="#" name="removeDestination"><i class="fa fa-minus"></i> Delete</a></p>
                    </span>
                </section>
            </div>
            <div class="previewform" style="display:none;">
                <div class="question-box">
                    <p>Fill in your passenger details as well as your personal details, and then preview your trip
                        to confirm your details are correct before submitting your trip to RoundAbout Travel.
                    </p>
                </div>
                <div class="question-box">
                    <dl class="result">
                        <dt>Depart from Adelaide, Australia</dt>
                        <dd>30 May 2015</dd>
                        <dt>Asia</dt>
                        <dd>Bali (Denpasar), Indonesia <br>
                            Staying for 2 Weeks
                        </dd>
                        <dt>Europe (incld M. East)</dt>
                        <dd>Transit</dd>
                        <dt>North America</dt>
                        <dd>Transit</dd>
                        <dt>Arrive in Adelaide, Australia</dt>
                        <dd>29 October 2015</dd>
                    </dl>
                </div>
                <div class="question-box">
                    <div class="clm2 be-col">
                        <div class="box">
                            <section class="number">
                                How many adults?
                                <div class="styled-select styled-select-inline">
                                    <select id="adultno">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5+</option>
                                    </select>
                                </div>
                            </section>
                        </div>
                        <div class="box">
                            <section class="number">
                                How many children?
                                <div class="styled-select styled-select-inline">
                                    <select id="childrenno">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5+</option>
                                    </select>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="question-box">
                    <p>Your details:</p>
                    <div class="clm2 be-f">
                        <div class="box">
                            <input type="text" id="firstname" placeholder="First Name">
                            <input type="text" id="lastname" placeholder="Last Name">
                        </div>
                        <div class="box">
                            <input type="text" id="phone" placeholder="Phone">
                            <input type="text" id="accountemail" placeholder="Your Email">
                        </div>
                    </div>
                    <textarea id="comments" placeholder="Comments"></textarea>
                </div>
                <div class="question-box">
                    <!---<p>Setup Your Account:</p>
                            <div class="clm2">
                                <div class="box">
                                    
                                </div>
                                <div class="box">
                                </div>
                            </div>--->
                    <div class="clm2 be-f">
                        <div class="box">
                            <input style="display:none;" value="123456" type="password" id="accountpassword"
                                placeholder="Create Password">
                        </div>
                        <div class="box">
                            <input style="display:none;" value="123456" type="password" id="accountconfirm"
                                placeholder="Confirm Password">
                        </div>
                    </div>
                </div>
            </div>
            <div id="dialog" title="Validation Error(s)" style="display:none;">
                <p>Error</p>
            </div>
            <?php // DC 12 Aug 2015
            if (DB_NAME === "argondev_rat") {
                $bookAppFolder = "bookingdev";
            } else {
                $bookAppFolder = "booking";
            } ?>
            <input type="hidden" id="bookingdirectory" value="<?php print $bookAppFolder; ?>" style="display:none;" />
        </div>
        <!--#main -->
    </div>
</div>
<?php
}


function func_show_detail_deal(){

$deal_id = $_GET['deal_id'];

ob_start();

$featured_img_url = get_the_post_thumbnail_url($deal_id);
$deal_name        = get_the_title($deal_id);

$classes      = wp_get_post_terms( $deal_id, 'deal_class' );
$airlines     = wp_get_post_terms( $deal_id, 'deal_airline' );
$price        = get_post_meta( $deal_id, 'deal_price', true );
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
                    <span>$<?php echo $price; ?></span>

                    <?php 
                    if ( $price_tax ) {
                        echo '<span class="tax">(inc taxes)</span>';
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