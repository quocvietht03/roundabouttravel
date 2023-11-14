<?php

add_shortcode( 'sc_plan_my_trip_map', 'sc_plan_trip_map' );
function sc_plan_trip_map()
{
    wp_enqueue_script( 'planmytrip-map-js', PJ_URI . 'assets/js/planmytrip-map.js', ['jquery'], PJ_VERSION, true );
    wp_enqueue_script( 'bootstrap-js', PJ_URI . 'assets/libs/bootstrap/bootstrap.min.js', ['jquery'], PJ_VERSION, true );
    wp_enqueue_style( 'bootstrap-css', PJ_URI . 'assets/libs/bootstrap/bootstrap.min.css', false, PJ_VERSION );
?>

    <main>
        <div class="plan-my-trip-map-wrapper">
        	<div id="loader" class="loader"></div>
            <!-- sidebar -->
            <div class="tab-sm-100 col-md-5 sidebar" id="map">
				<div class="logo">
					<div class="logo-icon">
						<img src="https://www.roundabouttravel.com.au/wp-content/themes/rat/img/logo.png" alt="RoundAbout Travel">
					</div>
				</div>
				<aside class="sidebar-inner">
					<article class="sidebar-text">
						<h3>Round The World Trip Planner</h3>
						<p>
							Not sure what to do? Talk to our consultant and let us help you make your trip easier! Call us today on <u>1300 318 227</u>.
						</p>
						
						<div class="step-bar">
							<span class="steps_count">
								<h3><span id="completion-rate">20% </span> to complete</h3>
								(<span id="showstep">1</span> to 3 step)
							</span>
							<div class="step-bar-inner">
								<div class="move-bar"></div>
							</div>
						</div>
					</article>
				</aside>
            </div>
            <div class="tab-sm-100 col-md-7 steps-area">

                <!-- step-type -->
                <div class="step-counter">
                    <div class="step-counter-inner">
                        <div class="step-type active">
                            <div class="step-type-icon">
                                <i class="fa-solid fa-earth-oceania"></i>
                            </div>
                            <span>Start Your Trip</span>
                        </div>
                        <div class="step-type">
                            <div class="step-type-icon">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </div>
                            <span>Iteinery</span>
                        </div>
                        <div class="step-type no-line">
                            <div class="step-type-icon">
                                <i class="fa-solid fa-address-card"></i>
                            </div>
                            <span>Personal Detail</span>
                        </div>
                    </div>
                </div>

                <form id="steps" method="post" autocomplete="off" enctype="multipart/form-data">

                    <div class="show-section wrapper">
                        <div id="error"></div>
                        <!-- step-1-->
                        <section class="steps">

                            <!-- step-1-form-->
                            <div class="animate__animated animate__fadeIn form" id="step1">

								<div class="input-field row">
									<h2>Welcome to the RAT Trip Planner</h2>
									<p>Cannot find a RTW airfare to fit your trip? Just fill in the form and we will do all the hard work for you.</p>
								</div>
								

								
								<div class="helpbox" style="margin-bottom:50px;">
									<h4>Not sure about RTW airfare rules?</h4>
									<p>Visit our website - <a href="https://www.roundabouttravel.com.au/info/rtw-airfare-rules/" target="_blank">click here</a> to know more about RTW airfare rules.</p>
								</div>
							

                                <div class="main-heading">
                                    About your Trip
									<span class="separator"></span>
                                </div>
								
							
								<div class="input-field row">
                                    <div class="col-xl-6">
                                        <label for="cityFrom">
                                            What Australian city will you be leaving from?
                                        </label>
                                        <div class="select-field">
											<select id="cityFrom" name="cityFrom" required>
												<option value="Sydney" selected>Sydney</option>
												<option value="Melbourne">Melbourne</option>
												<option value="Brisbane">Brisbane</option>
												<option value="Canberra">Canberra</option>
												<option value="Adelaide">Adelaide</option>
												<option value="Perth">Perth</option>
												<option value="Hobart">Hobart</option>
												<option value="Darwin">Darwin</option>
												<option value="Gold Coast">Gold Coast</option>
												<option value="Sunshine Coast">Sunshine Coast</option>
												<option value="Alice Springs">Alice Springs</option>
												<option value="Broome">Broome</option>
												<option value="Cairns">Cairns</option>
												<option value="Launceston">Launceston</option>
												<option value="Devonport">Devonport</option>
											</select>
                                            <span></span>
                                        </div>
                                    </div>
								</div>

								<!---
								<div class="input-field row">
									<label>
										Which Direction are you going out from Australia? <div class="eztooltip">(Why this is important?)<span class="tooltiptext"><strong>QUICK TIPS</strong> <br/> The direction can either be East via the South Pacific, South America or North America or it can be West via Asia or Africa. The ticket must continue in this direction without continental backtracking.</span></div>
									</label>
									<div class="check-field row">
										<div class="tab-33 col-md-3">
											<div class="check-field-single">
												<img src="./assets/images/planmytrip-map/directions/west.png" alt="">
												<input id="d1" type="radio" name="direction" value="West">
												<label for="d1" class="radioIconLabel">West</label>
											</div>
										</div>
										<div class="tab-33 col-md-3">
											<div class="check-field-single">
												<img src="./assets/images/planmytrip-map/directions/east.png" alt="">
												<input id="d2" type="radio" name="direction" value="East">
												<label for="d2" class="radioIconLabel">East</label>
											</div>

										</div>
									</div>
								</div>
								--->


                            </div>
                            <div class="next-prev">
                                <button type="button" id="step1btn" class="step1 next">Next Step</button>
                            </div>
                        </section>
						
						<!-- step-2-->
                        <section class="steps">

                            <!-- step-2-form-->
                            <div class="animate__animated animate__fadeIn form" id="step2">
                                <div class="main-heading">
									About your Trip
									<span class="separator"></span>
                                </div>
								
								<div class="input-field row">
                                    <div class="col-xl-6">
                                        <label for="departureDate">
                                            When would you like to leave Australia?
                                        </label>
										<input name="departureDate" id="departureDate" type="date" required>
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="TravelClass">
                                            What is your preferred travel class?
                                        </label>
                                        <div class="select-field">
											<select name="TravelClass" id="TravelClass">
												<option value="Economy">Economy</option>
												<option value="Premium Economy">Premium Economy</option>
												<option value="Business">Business</option>
												<option value="First Class">First Class</option>
											</select>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>


                                <div class="input-field row">
									<label>How many travellers in this trip?</label>
                                    <div class="col-md-4">
                                        <div class="input-field row">
                                            <div class="col-xl-6">
                                                <input type="text" name="adult" id="adult" value="1">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="adult">Adults (11+)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-field row">
                                            <div class="col-xl-6">
                                                <input type="text" name="children" id="children" value="0">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="children">Children (2-11)</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-field row">
                                            <div class="col-xl-6">
                                                <input type="text" name="infant" id="infant" value="0">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="infant">Infants (< 2)</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="next-prev">
                                <button type="button" class="prev">Previous Step</button>
                                <button type="button" id="step2btn" class="next">Next Step</button>
                            </div>
                        </section>
						
                         <!-- step-3-->
                         <section class="steps">

                            <!-- step-3-form-->
                            <div class="animate__animated animate__fadeIn form" id="step3">
										
							
							
							
                                <div class="main-heading">
                                    Design My Itinerary
									<span class="separator"></span>
                                </div>
								
								<div id="desFormInputsWrapper" class="desFormInputsWrapper">
									<div class="groupFields">
										<div class="input-field row">
											<div class="destinationSuggest">
												<input required type="text" class="destination" id="destination1" name="destination[]" placeholder="Type e.g. LAX, London, Paris, etc to search..." list="destinationList"/>
												<div id="airportList" class="airportList airport-search__results"></div>
											</div>
										</div>
										
										<div class="checkboxFields row">
											<div class="col-xl-6">
												<input id="transit" class="transit"  name="transit[]" type="checkbox"/><label>Transit Only</label>
											</div>
											<div class="col-xl-6">
												<input disabled id="self" class="self" name="self[]" type="checkbox"/><label>Own transport to this destination</label>
											</div>
										</div>
										
										<div class="input-field row stayRow">
											<div class="col-md-12">
												<h5>How long will you stay?</h5>
											</div>
											<div class="col-xl-6">
												<div class="select-field">
													<select id='stay' name="stay[]" >
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
														<option>6</option>
														<option>7</option>
														<option>8</option>
														<option>9</option>
														<option>10</option>
														<option>11</option>
														<option>12</option>
														<option>13</option>
														<option>14</option>
														<option>15</option>
														<option>16</option>
														<option>17</option>
														<option>18</option>
														<option>19</option>
														<option>20</option>
														<option>21</option>
														<option>22</option>
														<option>23</option>
														<option>24</option>
														<option>25</option>
														<option>26</option>
														<option>27</option>
														<option>28</option>
														<option>29</option>
														<option>30</option>
													</select>
													<span></span>
												</div>
											</div>
											<div class="col-xl-6">
												<div class="select-field">
													<select id='period' name="period[]">
														<option>Day(s)</option>
														<option>Week(s)</option>
														<option>Month(s)</option>
													</select>
													<span></span>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								
								<div class="col-sm-12">
									<hr style="padding-bottom:30px;">
									<a href="javascript:void(0)" class="addMore">+ Add Destination </a>
								</div>
								
                            </div>
                            <div class="next-prev">
                                <button type="button" class="prev">Previous Step</button>
                                <button type="button" id="step3btn" class="next">Next Step</button>
                            </div>
                        </section>
                        <!-- step-4 -->
                        <section class="steps">

                            <!-- step-4-form -->
                            <div class="animate__animated animate__fadeIn form" id="step4">
                                <div class="main-heading">Your Personal Details<span class="separator"></span></div>
								
								
								<div class="input-field row">
									<div class="col-xl-6">
										<label for="fname">First Name</label>
										<input type="text" id="fname" name="fname" required>
									</div>
									<div class="col-xl-6">
										<label for="lname">Last Name</label>
										<input type="text" id="lname" name="lname" required>
									</div>
								</div>
								<div class="input-field row">
									<div class="col-xl-6">
										<label for="mobile">Phone Number</label>
										<input autocomplete="mobile" type="text" id="mobile" name="mobile" required>
									</div>
									<div class="col-xl-6">
										<label for="email">Email</label>
										<input type="text" id="email" name="email"  required>
									</div>
								</div>
								<div class="input-field row">
									<div class="col-md-12">
										<label for="comments">Comments</label>
										<textarea id="comments" name="comments" rows="4" cols="50"></textarea>
										</div>
								</div>
								<div class="checkboxFields row">
									<div class="col-md-12" id="agreementRow">
									    <input id="agreement" class="agreement"  name="agreement" type="checkbox" checked="checked"/><label for="agreement">By submitting I agree to the <a href="https://www.roundabouttravel.com.au/about/legal/" target="_blank">terms and conditions</a>.</label>
									</div>
								</div>
								<input type="hidden" id="sourceID" name="sourceID" value="RATPLANMYTRIPMAP">
								<input id="ip" type="hidden" name="ip" value="<?php echo $ip;?>">
                            </div>
                            <div class="next-prev">
                                <button type="button" class="prev">Previous Step</button>
                                <button id="sub" type="button" class="apply">Send</button>
                            </div>
                        </section>
                        
                    </div>
                </form>
            </div>
        </div>
    </main>




<?php
}
?>