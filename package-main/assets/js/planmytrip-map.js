/*** Default Form Behaviour ***/
(function($) {
var currentStepCounter = 1;
var totalStepsCounter = 0;
// next prev

//show active step
function showActiveStep()
{
	totalStepsCounter = document.getElementsByClassName("steps").length + 1;
	var Persentage = Math.floor((currentStepCounter/totalStepsCounter)*100);
	var PersentageString = Persentage + "%";

	console.log(PersentageString);
    if (currentStepCounter == 1 || currentStepCounter == 2 )
    {
		//first 2 steps
        $(".step-counter-inner .step-type").removeClass("active");
        $(".step-counter-inner .step-type").eq(0).addClass("active");
        $(".step-bar-inner .move-bar").css('width', PersentageString);
        $("#completion-rate").html(PersentageString);
        $("#showstep").html('1');
        
    }
    else if (currentStepCounter == 4)
    {
		
		//last personal details steps
        $(".step-counter-inner .step-type").removeClass("active");
        $(".step-counter-inner .step-type").eq(2).addClass("active");
        $(".step-bar-inner .move-bar").css('width', PersentageString);
        $("#completion-rate").html(PersentageString);
        $("#showstep").html('3');
        
        //Set Max boundary + pan to all markers
		panView();
    }
    else
    {
        $(".step-counter-inner .step-type").removeClass("active");
        $(".step-counter-inner .step-type").eq(1).addClass("active");
        $(".step-bar-inner .move-bar").css('width', PersentageString);
        $("#completion-rate").html(PersentageString);
        $("#showstep").html('2');
        
    }
}


// next prev
var divs = $('.show-section section');
var now = 0; // currently shown div
divs.hide().first().show(); // hide all divs except first

function next()
{
    $('html, body').animate({
        scrollTop: $('.plan-my-trip-map-wrapper').offset().top -150
    }, 200);
	currentStepCounter++;
	console.log("Current Step: " + currentStepCounter);
    divs.eq(now).hide();
    now = (now + 1 < divs.length) ? now + 1 : 0;
    divs.eq(now).show(); // show next
    showActiveStep();

}

$(".prev").click(function() {
	currentStepCounter--;
	console.log("Current Step: " + currentStepCounter);
    divs.eq(now).hide();
    now = (now > 0) ? now - 1 : divs.length - 1;
    divs.eq(now).show(); // show previous
    showActiveStep();

});


// disable on enter
$('form').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13 && !event.is("textarea")) { 
      e.preventDefault();
      return false;
    }
  });
  
  

  // form validiation
var inputschecked = false;


function formvalidate(stepnumber)
{
  // check if the required fields are empty
  inputvalue = $("#step"+stepnumber+" :input").not("button").map(function()
  {
    if(this.value.length > 0)
    {
      $(this).removeClass('invalid');
      return true;

    }
    else
    {
      if($(this).prop('required'))
      {
        $(this).addClass('invalid');
        return false
      }
      else
      {
        return true;
      }
      
    }
  }).get();
  


  // console.log(inputvalue);

  inputschecked = inputvalue.every(Boolean);
  // console.log(inputschecked);
}

// form validiation
$(document).ready(function()
   {
        // check step1
        $("#step1btn").on('click', function()
        {
    
			formvalidate(1);
			
            if(inputschecked == false)
            {
                formvalidate(1);
                $('#error').html('<div class="reveal alert alert-danger">Please fill in all the required fields.</div>');
                $('html, body').animate({
                    scrollTop: $('#error').offset().top -200
                }, 200);
            }
            else
            {
                $('.reveal').remove();
                next();
            }
        })
        // check step2
        $("#step2btn").on('click', function()
        {
            formvalidate(2);
            
    
            if(inputschecked == false)
            {
                formvalidate(2);
                $('#error').html('<div class="reveal alert alert-danger">Please fill in all the required fields.</div>');
                $('html, body').animate({
                    scrollTop: $('#error').offset().top -200
                }, 200);

            }
            else
            {
				//hide pop up on map once step 2 is done
				if(originMarker.isPopupOpen() == true){
					originMarker.togglePopup();
				}
                $('.reveal').remove();
                next();
            }
        })
        // check step3
        $("#step3btn").on('click', function()
        {
            formvalidate(3);
            
    
            if(inputschecked == false)
            {
                formvalidate(3);
                $('#error').html('<div class="reveal alert alert-danger">Please fill in all the required fields.</div>');
                $('html, body').animate({
                    scrollTop: $('#error').offset().top -200
                }, 200);
            }
            else
            {
                $('.reveal').remove();
                next();
            }
        })

       $("#sub").on('click' , function()
       {
		   
		   
            var email = $("#email").val();

            //email validiation
            var re = /^\w+([-+.'][^\s]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
            var emailFormat = re.test(email);
            
            //number validiation
            var numbers = /^[0-9]+$/;
			
            formvalidate(4);
            


    
            if(inputschecked == false)
            {
                formvalidate(4);
                $('#error').append('<div class="reveal alert alert-danger">Please fill in all the required fields.</div>');
                $('html, body').animate({
                    scrollTop: $('#error').offset().top -200
                }, 200);
            }
            
			// check if email is valid
            else if(emailFormat == false)
            {
                // console.log("enter valid email address");
                $('.reveal').remove();
                $('#error').append('<div class="reveal alert alert-danger">Please enter a valid email address.</div>');
                $('html, body').animate({
                    scrollTop: $('#error').offset().top -200
                }, 200);
                if(emailFormat == true)
                {
                  $("#email").removeClass('invalid');
                }
                else
                {
                  $("#email").addClass('invalid');
                }
            }
            
            else
            {
                
                if(!$('#agreement').is(':checked')){
                    $("#agreementRow").addClass('invalid');
                    $('.reveal').remove();
                    $('#error').append('<div class="reveal alert alert-danger">Please accept the Terms & Conidition before you submit.</div>');
                    $('html, body').animate({
                        scrollTop: $('#error').offset().top -200
                    }, 200);
                } else {
                    $("#agreementRow").removeClass('invalid');
                    $('.reveal').remove();
                    
                    //$("#sub").html("<img src='../wp-content/themes/roundabouttravel/package-main/assets/images/planmytrip-map/loading.gif'>");
                    // var dataString = $("#step1, #step2, #step3").serialize() + '&' + $.param(attachment);
                    
                    var dataString = new FormData(document.getElementById("steps"));
    
    
    				for (var pair of dataString.entries()) {
    					console.log(pair[0]+ ', ' + pair[1]); 
    				}
    
    
    				toggleDisplay();
    				
    				
        			//go through all self[] and transit[] field and push value to parameters
        			//need to do it manually as post html form field not passing unchecked box value
        			
        			
        			//get all fields value 
        			var selfInputfields = document.getElementsByName('self[]');
        			var transitInputfields = document.getElementsByName('transit[]');
        
        			//need to check how to check the checkbox is unchecked and put value as off
        			// selfInputfields.length-1 to exclude last section reserve for html code copy
        			for (var i = 0; i < selfInputfields.length; i++) {
        				if(!selfInputfields[i].checked){ 
        					dataString.append('RealSelf[]','off');
        				} else {
        					dataString.append('RealSelf[]','on');
        				}
        				
        				if(!transitInputfields[i].checked){ 
        					dataString.append('RealTransit[]','off');
        				} else {
        					dataString.append('RealTransit[]','on');
        				}
        			}
    
    
    
                    // send form to send.php
                    $.ajax({
                             type: "POST",
                            url: "../wp-content/themes/roundabouttravel/package-main/form-handling/planmytrip-post.php",
                            data: dataString,
                              processData: false,
                             contentType: false,
                             success: function(data,status)
                             {
    
                                $("#sub").html("Success!");
                                
                                window.location.assign('/thank-you/');
                                
                             },
                             error: function(data, status)
                             {
    							toggleDisplay();
                                $("#sub").html("failed!");
    							alert("Error Occured, please contact the support team for your query.");
                             }
    				});
                }
 
            }

        });
   });



function toggleDisplay() {
  var x = document.getElementById("loader");
  if (window.getComputedStyle(x).display === "none") {
    x.style.display = "block";
	const mainBodyWrapper =  document.querySelector('.plan-my-trip-map-wrapper');
	mainBodyWrapper.style.cssText = 'pointer-events: none;opacity: 0.5;';
	document.body.style.overflowY = "hidden";
  } else {
    x.style.display = "none";
	const mainBodyWrapper =  document.querySelector('.plan-my-trip-map-wrapper');
	mainBodyWrapper.style.cssText = 'pointer-events: all;opacity: 1;';
	document.body.style.overflowY = "auto";
  }
}



/*** Itinerary Fields prep ***/

//initialise form
//editable select box with autocomplete options for IATA + CITY NAMES
//JSON already sort data in links count (how busy is the airport / size)

// JSOn file: https://github.com/algolia/datasets/blob/master/airports/airports.json

var fieldResultClicked = false;

const searchInput = document.getElementById("destination1");

const searchairport = async (id, searchBox) => {
	console.log("ID: " + id);
	console.log("Search Value: " + searchBox);
  // get json
  const res = await fetch("https://raw.githubusercontent.com/algolia/datasets/master/airports/airports.json");
  const airports = await res.json();

  // get data
  let fits = airports.filter((airport) => {
    const regex = new RegExp(`^${searchBox}`, "gi");
    return (
      airport.country.match(regex) ||
      airport.name.match(regex) ||
      airport.city.match(regex) ||
     airport.iata_code.match(regex)
    );
  });

	//update HTML on screen
  if (searchBox.length === 0) {
	//if no result
    fits = [];
    outputHtml(id,fits);
  } else {
	outputHtml(id,fits);
  }
};

// show results in HTML
const outputHtml = (id, fits) => {
	//locate the nearest div to display result
	var airportList = document.getElementById(id).closest("div").querySelector(".airportList");
	if (fits.length > 0) {
		document.getElementById(id).classList.remove("noResult");
		document.getElementById(id).classList.remove("invalid");
		const airportFits = fits.map(
		(fit) =>
			`<div tabindex="0" class="airport-search__result">
				<div class="airport__id">
					<h5 class="airport__name">${fit.name} [${fit.iata_code}], ${fit.city}, ${fit.country}</h5>
				</div>
				<div class="airport__location" style="display:none;">
					<span class="airport__lat">${fit._geoloc.lat}</span>
					<span class="airport__lng">${fit._geoloc.lng}</span>
				</div>
			  </div>`
		  /*`<option data-lat="${fit._geoloc.lat}" data-long="${fit._geoloc.lng}" data-airport="${fit.iata_code} ${fit.name}" data-city="${fit.city} ${fit.country}" value="${fit.name} [${fit.iata_code}], ${fit.city}, ${fit.country}" data-city="${fit.city} ${fit.country}"> </option>`*/
		)
		.join("");
		airportList.innerHTML = airportFits;

		/*
		//Add listener to see if result is clicked
		var resultElement = document.querySelectorAll(".airport-search__result");
		resultElement.forEach(result => {
		  result.addEventListener('click', function handleResultsClick(event) {
			//if clicked
			console.log('result box clicked', event);
			var fieldValue = result.querySelector(".airport__name").innerHTML;
			var airportLat = result.querySelector(".airport__lat").innerHTML;
			var airportLng = result.querySelector(".airport__lng").innerHTML;
			
			//update value to input field
			console.log("CLICKED " + fieldValue + " " + airportLat + " " + airportLng);
			result.closest(".destinationSuggest").querySelector('.destination').value = fieldValue;
			console.log("Result after Edit " + result.closest(".destinationSuggest").querySelector('.destination').value);
			
			//remove list
			result.closest(".destinationSuggest").querySelector('.airportList').innerHTML = "";
			
			// TODO update map

		
			});
		});
		*/
	} else {
		//no result return, force user retype
		if ( fieldResultClicked == false){
			airportList.innerHTML = `<div tabindex="0" class="airport-search__result">
										<h5>No Result, please enter a different word to search</h5>
									</div>`;
			document.getElementById(id).classList.add("invalid");
			document.getElementById(id).classList.add("noResult");
			console.log();
		}
	}	  
};

searchInput.addEventListener("input", function(evt){
	console.log("search field input/ changed detected");
	fieldResultClicked = false;
	searchairport(this.id, this.value);
});


searchInput.addEventListener("blur", function(evt){
	//when input field out focus
	console.log("BLUR TRIGGERED ID: "+this.id);
	if(!document.getElementById(this.id).classList.contains('noResult'))
	{
		if(!fieldResultClicked){
			if(evt.relatedTarget ===null){
				//Trigger form validation show red
				$(this).addClass('invalid');

				//Update the input field
				var fieldValue = document.getElementById(this.id).closest(".destinationSuggest").querySelector('.airport__name').innerHTML;
				var airportLat = document.getElementById(this.id).closest(".destinationSuggest").querySelector('.airport__lat').innerHTML;
				var airportLng = document.getElementById(this.id).closest(".destinationSuggest").querySelector('.airport__lng').innerHTML;
				console.log(fieldValue);
				this.value = fieldValue;
				//ADD COORDINATE TO HTML ATTRIBUTE
				this.dataset.lat = airportLat;
				this.dataset.lng = airportLng;
				//Run Function to draw Marker
				drawDesMarkers(this.id);
				//remove list
				document.getElementById(this.id).closest(".destinationSuggest").querySelector('.airportList').innerHTML = "";
			} else {
				//if clicking on the search result (need to add tabindex="0" to div element ensure it can be detected)
				if(evt.relatedTarget.classList == "airport-search__result"){
					console.log("EVENT target HTML: "+evt.relatedTarget.getElementsByClassName( 'airport__name' )[0].innerHTML);
					//Update the input field
					var fieldValue = evt.relatedTarget.getElementsByClassName( 'airport__name' )[0].innerHTML;
					var airportLat = evt.relatedTarget.getElementsByClassName( 'airport__lat' )[0].innerHTML;
					var airportLng = evt.relatedTarget.getElementsByClassName( 'airport__lng' )[0].innerHTML;
					console.log(fieldValue);
					this.value = fieldValue;
					//ADD COORDINATE TO HTML ATTRIBUTE
					this.dataset.lat = airportLat;
					this.dataset.lng = airportLng;
					//Run Function to draw Marker
					drawDesMarkers(this.id);
					//remove list
					document.getElementById(this.id).closest(".destinationSuggest").querySelector('.airportList').innerHTML = "";
				}
			}
			//Result selected, remove styling + flag it is clicked (prevent no result logic)
			fieldResultClicked = true;
			document.getElementById(this.id).classList.remove("noResult");
			document.getElementById(this.id).classList.remove("invalid");
		}
	} else {
		document.getElementById(this.id).value = "";
	}
});

    /** Form Behaviour - hide stay row if transit only is clicked **/
    $("#transit").click(function(event){ 
        console.log(this.id);
        drawDesMarkers(this.id);
    	if (this.checked) {
    	    console.log("TRANSIT CHECKED");
    		$(this).closest( ".groupFields" ).find(".stayRow").toggle();
    	} else {
    	    console.log("TRANSIT UNCHECKED");
    		$(this).closest( ".groupFields" ).find(".stayRow").toggle();
    	}
    });
    
    $("#stay").change(function(event){
        console.log(this.id);
        drawDesMarkers(this.id);
    });

    $("#period").change(function(event){
        console.log(this.id);
        drawDesMarkers(this.id);
    });



/** Form Behaviour -  add more destination **/


//add more fields group
$(document).ready(function(){
	var maxField = 20; //Input fields increment limitation
	var addButton = $('.addMore'); //Add button selector
	var wrapper = $('.desFormInputsWrapper'); //Input field wrapper
	var counter = 1;
	var x = 1; //Initial field counter is 1

	// Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(counter < maxField){ 

			var fieldHTML = '<div class="groupFields"><hr><div class="input-field row"><div class="col-sm-12 nextCityTitle"><span>Next Destination City</span><a href="javascript:void(0)" class="remove_button"><i class="fa-solid fa-xmark"></i></a></div><div class="input-field row"></div><div class="destinationSuggest"><input required type="text" class="destination" id="destination'+ (x+1) +'" name="destination[]" placeholder="Type e.g. LAX, London, Paris, etc to search..." list="destinationList"/><div id="airportList'+ (x+1) +'" class="airportList airport-search__results"></div></div></div><div class="checkboxFields row"><div class="col-md-6"><input id="transit'+ (x+1) +'" class="transit"  name="transit[]" type="checkbox"/><label>Transit Only</label></div><div class="col-md-6"><input id="self'+ (x+1) +'" class="self" name="self[]" type="checkbox"/><label>Own transport to this destination</label></div></div><div class="input-field row stayRow"><div class="col-md-12"><h5>How long will you stay?</h5></div>	<div class="col-md-6"><div class="select-field"><select id="stay'+ (x+1) +'" name="stay[]" ><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option><option>7</option><option>8</option>	<option>9</option><option>10</option><option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option><option>17</option><option>18</option><option>19</option><option>20</option>	<option>21</option><option>22</option><option>23</option><option>24</option><option>25</option><option>26</option><option>27</option><option>28</option><option>29</option><option>30</option></select><span></span></div></div>	<div class="col-md-6"><div class="select-field"><select id="period'+ (x+1) +'" name="period[]"><option>Day(s)</option><option>Week(s)</option><option>Month(s)</option></select><span></span></div></div></div></div>';


            $(wrapper).append(fieldHTML); //Add field html
            

			/*Readd event listener*/
			var elementID = "destination".concat((x+1));
			const searchInput = document.getElementById(elementID);
			
			//Add Listner - Detect Search Airport field input
			searchInput.addEventListener("input", function(evt){
				//console.log("ID PRE TRIGGER: "+this.id);
				searchairport(this.id, this.value)
			});
			
			
            searchInput.addEventListener("blur", function(evt){
				//when input field out focus
				console.log("BLUR TRIGGERED ID: "+this.id);
				if(evt.relatedTarget ===null){
					//Update the input field
					var fieldValue = document.getElementById(this.id).closest(".destinationSuggest").querySelector('.airport__name').innerHTML;
					var airportLat = document.getElementById(this.id).closest(".destinationSuggest").querySelector('.airport__lat').innerHTML;
					var airportLng = document.getElementById(this.id).closest(".destinationSuggest").querySelector('.airport__lng').innerHTML;
					console.log(fieldValue);
					this.value = fieldValue;
					//ADD COORDINATE TO HTML ATTRIBUTE
					this.dataset.lat = airportLat;
					this.dataset.lng = airportLng;
					//Run Function to draw Marker
					drawDesMarkers(this.id);
					
					
					//remove list
					document.getElementById(this.id).closest(".destinationSuggest").querySelector('.airportList').innerHTML = "";
				} else {
					if(evt.relatedTarget.classList == "airport-search__result"){
						console.log("EVENT target HTML: "+evt.relatedTarget.getElementsByClassName( 'airport__name' )[0].innerHTML);
						//Update the input field
						var fieldValue = evt.relatedTarget.getElementsByClassName( 'airport__name' )[0].innerHTML;
						var airportLat = evt.relatedTarget.getElementsByClassName( 'airport__lat' )[0].innerHTML;
						var airportLng = evt.relatedTarget.getElementsByClassName( 'airport__lng' )[0].innerHTML;
						console.log(fieldValue);
						this.value = fieldValue;
						//ADD COORDINATE TO HTML ATTRIBUTE
						this.dataset.lat = airportLat;
						this.dataset.lng = airportLng;
						//Run Function to draw Marker
						drawDesMarkers(this.id);
						
						
						//remove list
						document.getElementById(this.id).closest(".destinationSuggest").querySelector('.airportList').innerHTML = "";
					}
				}
			});
			
			
			//Add Listner - Detect transit is clicked
			elementID = "transit".concat((x+1));
			const transitInput = document.getElementById(elementID);
			transitInput.addEventListener("click", function(evt){
                console.log(this.id);
                drawDesMarkers(this.id);
            	if (this.checked) {
            	    console.log("TRANSIT CHECKED");
            		$(this).closest( ".groupFields" ).find(".stayRow").toggle();
            	} else {
            	    console.log("TRANSIT UNCHECKED");
            		$(this).closest( ".groupFields" ).find(".stayRow").toggle();
            	}
			});
			
			
			//Add Listner - Detect self is clicked
			elementID = "self".concat((x+1));
			const selfInput = document.getElementById(elementID);
			selfInput.addEventListener("change", function(evt){
                console.log(this.id);
                drawDesMarkers(this.id);
			});

			//Add Listner - Detect stay is clicked
			elementID = "stay".concat((x+1));
			const stayInput = document.getElementById(elementID);
			stayInput.addEventListener("change", function(evt){
                console.log(this.id);
                drawDesMarkers(this.id);
			});
			
			//Add Listner - Detect period is clicked
			elementID = "period".concat((x+1));
			const periodInput = document.getElementById(elementID);
			periodInput.addEventListener("change", function(evt){
                console.log(this.id);
                drawDesMarkers(this.id);
			});
			

			
			x++;
            counter++; //Increase field counter

        }else{
            alert('A maximum of '+maxField+' fields are allowed to be added. ');
        }
    });
    
    // Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).closest(".groupFields").remove(); //Remove field html
		drawDesMarkers(this.id);
        counter--; //Decrease field counter
    });
});




/*** MAP INITALISATION ***/

//set up initial marker Icon
var originIcon = L.icon({
    iconUrl: '../wp-content/themes/roundabouttravel/package-main/assets/images/planmytrip-map/planmt-marker.png',
    iconSize:     [50, 50], // size of the icon
	iconAnchor:   [25, 50],
    popupAnchor:  [0, -40] // point from which the popup should open relative to the iconAnchor
});

var d1Icon = L.icon({
    iconUrl: '../wp-content/themes/roundabouttravel/package-main/assets/images/planmytrip-map/direction1.png',
    iconSize:     [68.5, 50], // size of the icon
	iconAnchor:   [100, 70]
});

var d2Icon = L.icon({
    iconUrl: '../wp-content/themes/roundabouttravel/package-main/assets/images/planmytrip-map/direction2.png',
    iconSize:     [68.5, 50], // size of the icon
	iconAnchor:   [-30, 70]
});

var originList = [
	['Sydney', -33.8688, 151.2093],
	['Melbourne', -37.813629, 144.963058],
	['Brisbane', -27.469770, 153.025131],
	['Canberra', -35.3075, 149.1244],
	['Adelaide', -34.9284, 138.6008],
	['Perth', -31.9523, 115.8613],
	['Hobart', -42.8826, 147.3257],
	['Darwin', -12.4637, 130.8444],
	['Gold Coast', -28.016666, 153.399994],
	['Sunshine Coast', -26.6500, 153.0667],
	['Alice Springs', -23.6980, 133.8807],
	['Broome', -17.9618, 122.2370],
	['Cairns', -16.9203, 145.7709],
	['Launceston', -41.4391, 147.1358],
	['Devonport', -41.1801, 146.3503]
];


//call leaflet API
var map = L.map('map', {
    center: [originList[0][1],originList[0][2]],
    zoom: 5,
	worldCopyJump: true,
	scrollWheelZoom: false
});
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
	noWrap: false,
    attribution: '&copy; <a href="https://roundabouttravel.com.au">RoundAbout Travel.</a> Data by <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);



var originMarker = L.marker([originList[0][1],originList[0][2]], {icon: originIcon}).addTo(map);
originMarker.bindPopup("<b>Leaving From: </b>Sydney");

/*** Detect Original City is changed ***/

var CityFromField = document.getElementById('cityFrom');
var OriginMarkerCor = [-33.8688,151.2093];

//var directionMarker;
//var directionMarkerSelected = false;

CityFromField.onchange = (event) => {
	CityFromFieldValue = event.target.value;
	//console.log("Selecting Field: " + CityFromFieldValue);
	/*
	if(directionMarker instanceof L.Marker){
		map.removeLayer(directionMarker);
	}*/
	
	//CHECK IF DIRECTION IS SELECTED 
	//DRAW direction icon again if origin is changed
	for (var j=0; j < originList.length; j++){
		//console.log("Comparing Field: " + originList[j][0]);
		if(CityFromFieldValue == originList[j][0]){
			console.log("COORD"+originList[j][1] + originList[j][2]);
			OriginMarkerCor = [originList[j][1], originList[j][2]];
			map.removeLayer(originMarker);
			originMarker = L.marker([originList[j][1],originList[j][2]], {icon: originIcon}).addTo(map);
			originMarker.bindPopup("<b>Leaving From: </b>"+CityFromField.value);
			/*
			if(directionMarkerSelected && document.getElementById('d1').checked){
				directionMarker = L.marker([OriginMarkerCor[0],OriginMarkerCor[1]], {icon: d1Icon}).addTo(map);
			} else if(directionMarkerSelected && document.getElementById('d2').checked){
				directionMarker = L.marker([OriginMarkerCor[0],OriginMarkerCor[1]],{icon: d2Icon}).addTo(map);
			}
			*/
			map.panTo(new L.LatLng([originList[j][1]],[originList[j][2]]));
			break;
		}
	}
					
}


/*** HANDLING DIRECTIONM MARKERS ***/
/*
var direction1 = document.getElementById('d1');
direction1.onchange = (event) => {
	if(directionMarker instanceof L.Marker){
		map.removeLayer(directionMarker);
	}
	directionMarker = L.marker([OriginMarkerCor[0],OriginMarkerCor[1]], {icon: d1Icon}).addTo(map);
	directionMarkerSelected = true;
}

var direction2 = document.getElementById('d2');
direction2.onchange = (event) => {
	if(directionMarker instanceof L.Marker){
		map.removeLayer(directionMarker);
	}
	directionMarker = L.marker([OriginMarkerCor[0],OriginMarkerCor[1]],{icon: d2Icon}).addTo(map);
	directionMarkerSelected = true;
}

*/
/** STEP 2 INFO TO POP UP **/

var FromCity = document.getElementById('cityFrom').value;
var departureDate = document.getElementById('departureDate');
var TravelClass = document.getElementById('TravelClass');
var AdultEl = document.getElementById('adult');
var ChildrenEl = document.getElementById('children');
var InfantEl = document.getElementById('infant');

departureDate.onchange = (event) => {
	console.log(departureDate.value);
	originMarker.bindPopup("<b>Leaving From: </b>"+FromCity+"<br/><b>Departure Date: </b>"+departureDate.value+"<br/><b>Travel Class: </b>"+TravelClass.value +"<br/><b>Travelling with </b>"+AdultEl.value+" Adults " +ChildrenEl.value+" Children " +InfantEl.value+" Infants ");
	if(originMarker.isPopupOpen() == false){
		originMarker.togglePopup();
	}
}

TravelClass.onchange = (event) => {
	console.log(TravelClass.value);
	originMarker.bindPopup("<b>Leaving From: </b>"+FromCity+"<br/><b>Departure Date: </b>"+departureDate.value+"<br/><b>Travel Class: </b>"+TravelClass.value +"<br/><b>Travelling with </b>"+AdultEl.value+" Adults " +ChildrenEl.value+" Children " +InfantEl.value+" Infants ");
	if(originMarker.isPopupOpen() == false){
		originMarker.togglePopup();
	}
}

AdultEl.onchange = (event) => {
	console.log(AdultEl.value);
	originMarker.bindPopup("<b>Leaving From: </b>"+FromCity+"<br/><b>Departure Date: </b>"+departureDate.value+"<br/><b>Travel Class: </b>"+TravelClass.value +"<br/><b>Travelling with </b>"+AdultEl.value+" Adults " +ChildrenEl.value+" Children " +InfantEl.value+" Infants ");
	if(originMarker.isPopupOpen() == false){
		originMarker.togglePopup();
	}
}

ChildrenEl.onchange = (event) => {
	console.log(ChildrenEl.value);
	originMarker.bindPopup("<b>Leaving From: </b>"+FromCity+"<br/><b>Departure Date: </b>"+departureDate.value+"<br/><b>Travel Class: </b>"+TravelClass.value +"<br/><b>Travelling with </b>"+AdultEl.value+" Adults " +ChildrenEl.value+" Children " +InfantEl.value+" Infants ");
	if(originMarker.isPopupOpen() == false){
		originMarker.togglePopup();
	}
}

InfantEl.onchange = (event) => {
	console.log(InfantEl.value);
	originMarker.bindPopup("<b>Leaving From: </b>"+FromCity+"<br/><b>Departure Date: </b>"+departureDate.value+"<br/><b>Travel Class: </b>"+TravelClass.value +"<br/><b>Travelling with </b>"+AdultEl.value+" Adults " +ChildrenEl.value+" Children " +InfantEl.value+" Infants ");
	if(originMarker.isPopupOpen() == false){
		originMarker.togglePopup();
	}
}



/** Step 3 **/

//GO EAST / GO WEST -> Continents option


//Get Destination field changes (add listener)
var DesMarkers = [];
var AllMapMarkersGroup = [];
var geodesic = new L.Geodesic().addTo(map);

function panView(){
	//Add Markers then zoom to fit
	console.log("PAN VIEW CALLED");
	console.log(AllMapMarkersGroup);
	var group = new L.featureGroup(AllMapMarkersGroup);
	map.fitBounds(group.getBounds().pad(0.1));
	
	//prevent move drag outside the bound
	map.setMaxBounds(group.getBounds());

	
	//close all popup
	map.closePopup();
	
}

function drawDesMarkers(FieldChangedID){

    //Unset Boundry which set for step 4 (in case people go back)
	map.setMaxBounds(null);
	
	//console.log("MARKERS DRAWING");
	//console.log(FieldChangedID);
	//clear MARKERS
	for(var i=0; i < DesMarkers.length; i++){
		//console.log("DESKMARKER LIST");
		//console.log(DesMarkers[i]);
		if(DesMarkers[i] instanceof L.Marker){
			map.removeLayer(DesMarkers[i]);
		}
	}	
	
	// clear CURVE LINES
	geodesic.setLatLngs([]);
	
	DesMarkers = [];
	
	var destinationInputfields = document.getElementsByName('destination[]');
	var stayInputfields = document.getElementsByName('stay[]');
	var periodInputfields = document.getElementsByName('period[]');
	var transitInputfields = document.getElementsByName('transit[]');
	var selfInputfields = document.getElementsByName('self[]');
	
	AllMapMarkersGroup = [];
	AllMapMarkersGroup.push(originMarker);
	
	var currentNumber = 0;
	
	for (var i=0; i < destinationInputfields.length; i++){
		//console.log(destinationInputfields[i].value);
		//console.log(destinationInputfields[i].dataset.lat);
		//console.log(destinationInputfields[i].dataset.lng);
		if(destinationInputfields[i].dataset.lat === undefined || destinationInputfields[i].dataset.lng === undefined ){
		    break;
		}
		DesMarkers[i] = L.marker([destinationInputfields[i].dataset.lat,destinationInputfields[i].dataset.lng], {icon: originIcon}).addTo(map);
		var popContents = "Number " + (i+1) + " Stop<br/><b>"+destinationInputfields[i].value+"</b>";
		if(transitInputfields[i].checked == true){
			popContents = popContents + "<br/>Transit Only";
		}else {
		    popContents = popContents + "<br/>For " + stayInputfields[i].value + " " + periodInputfields[i].value
		}
		if(selfInputfields[i].checked == true) {
			popContents = popContents + "<br/>Own Transport to thie destination";
		}
		DesMarkers[i].bindPopup(popContents);
		

		
		//current Changed field auto toggle popup if it is closed 
		var desInputfieldsID = destinationInputfields[i].id;
		if(desInputfieldsID == FieldChangedID && DesMarkers[i].isPopupOpen() == false){
			DesMarkers[i].togglePopup();
			currentNumber = i;
		}
		
		var transitInputfieldsID = transitInputfields[i].id;
		if(transitInputfieldsID == FieldChangedID && DesMarkers[i].isPopupOpen() == false){
			DesMarkers[i].togglePopup();
			currentNumber = i;
		}
		
		var selfInputfieldsID = selfInputfields[i].id;
		if(selfInputfieldsID == FieldChangedID && DesMarkers[i].isPopupOpen() == false){
			DesMarkers[i].togglePopup();
			currentNumber = i;
		}
		
		var stayInputfieldsID = stayInputfields[i].id;
		if(stayInputfieldsID == FieldChangedID && DesMarkers[i].isPopupOpen() == false){
			DesMarkers[i].togglePopup();
			currentNumber = i;
		}
		
		var periodInputfieldsID = periodInputfields[i].id;
		if(periodInputfieldsID == FieldChangedID && DesMarkers[i].isPopupOpen() == false){
			DesMarkers[i].togglePopup();
			currentNumber = i;
		}
		
		//build all marker list
		AllMapMarkersGroup.push(DesMarkers[i]);
		
		console.log("CURRENT NUMBER: "+currentNumber);
		//pan view to the marker which updated
		if(i==destinationInputfields.length-1){
			map.setView([destinationInputfields[currentNumber].dataset.lat,destinationInputfields[currentNumber].dataset.lng],3);
		}	
	}


	//Add last stop (marker) for Line
	AllMapMarkersGroup.push(originMarker);
	//Draw Line
	var latlng =[];
	for(var i=0; i< AllMapMarkersGroup.length; i++){
		//console.log(AllMapMarkersGroup[i]._latlng.lat);
		//console.log(AllMapMarkersGroup[i]._latlng.lng);

		var latlng1 = new L.LatLng(AllMapMarkersGroup[i]._latlng.lat, AllMapMarkersGroup[i]._latlng.lng);
		latlng.push(latlng1);
	}
	
	const options = {
		weight: 3,
		opacity: 1,
		color: '#60B9E2',
		steps: 5,
	};
	geodesic = new L.Geodesic(latlng,options).addTo(map);

				  
				  
	

}
})(jQuery);