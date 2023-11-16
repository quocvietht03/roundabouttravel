<?php


require 'vendor/autoload.php';



if(isset($_POST))
{
    $cityFrom ='';
    $departureDate ='';
    $TravelClass = '';
    $adults ='';
    $children ='';
    $infant ='';
    $fname ='';
    $lname ='';
    $mobile ='';
    $email ='';
    $comments ='';
    $prefNotes ='';
    $source ='';
    $ipaddr ='';
    $destination ='Round the World';
    $branch = 'RAT';
    $status = 'Submitted';
    $subject ='';
    
    $email_message='';
    
    if( htmlspecialchars($_POST["sourceID"]) == 'RATPLANMYTRIPMAP'){
        $subject = "Enquiry - [RoundAbout Travel] Plan My Trip Map";
        $cityFrom = $_POST['cityFrom'];
    	$departureDate = $_POST['departureDate'];
    	$TravelClass = $_POST['TravelClass'];
    	$adults = $_POST['adult'];
    	$children = $_POST['children'];
    	$infant = $_POST['infant'];
    	
    	$destinationCity = $_POST['destination'];
    	$transit = $_POST['RealTransit'];
    	$self = $_POST['RealSelf'];
    	$stay = $_POST['stay'];
    	$period = $_POST['period'];
    	
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $comments = $_POST['comments'];
        
        $source = "Web - Plan My Trip";
    	$ipaddr = $_POST['ip'];
    	
    	$prefNotes = '';
    	
    	for ($i=0; $i<count($destinationCity); $i++){
    		$prefNotes .= "--- Destination " . ($i+1) . " ---\n";
    		$prefNotes .= "Destination: ".clean_string($destinationCity[$i]). "\n";
    		if(clean_string($self[$i] == 'on')){
    			$prefNotes .= "Own Transport to this city \n";
    		}
    		if(clean_string($transit[$i] == 'on')){
    			$prefNotes .= "Transit Only \n";
    			$prefNotes .= "\n";
    		} else {
    			$prefNotes .= "How long: ".clean_string($stay[$i])." ".clean_string($period[$i])."\n\n";
    		}
    		
    	}
    	
        //build email message
    	$email_message = "Form details below:<br>";
     
    	
    	$email_message .= "<b>First Name</b>: ".clean_string($fname)."<br>";
    	$email_message .= "<b>Last Name</b>: ".clean_string($lname)."<br>";
    	$email_message .= "<b>Email</b>: ".clean_string($email)."<br>";
    	$email_message .= "<b>Telephone</b>: ".clean_string($mobile)."<br><br/>";
    	$email_message .= "<b>Comments</b>: ".$comments."<br><br>";
    	$email_message .= "<b>Origin</b>: ".clean_string($cityFrom)."<br>";
    	$email_message .= "<b>Departure Date</b>: ".clean_string($departureDate)."<br>";
    	$email_message .= "<b>Travel Class</b>: ".clean_string($TravelClass)."<br>";
    	$email_message .= "<b>PAX Number Adults/ Children/ Infants</b>: ".clean_string($adults)."/". clean_string($children) ."/" . clean_string($infant) ."<br>"."<br>";

    	for ($i=0; $i<count($destinationCity); $i++){
    		$email_message .= "--- Destination " . ($i+1) . " ---<br>";
    		$email_message .= "Destination: ".clean_string($destinationCity[$i])."<br>";
    		if(clean_string($self[$i] == 'on')){
    			$email_message .= "Own Transport to this city<br>";
    		}
    		if(clean_string($transit[$i] == 'on')){
    			$email_message .= "Transit Only <br>";
    			$email_message .="<br>";
    			
    		}else {
                $email_message .= "How long: ".clean_string($stay[$i])." ".clean_string($period[$i])."<br><br>";
    		}	
    	}

    } else if( htmlspecialchars($_POST["sourceID"]) == 'RATPLANMYTRIPCLASSIC'){
        $subject = "Enquiry - [RoundAbout Travel] Plan My Trip Classic";
        
        $state = $_POST['state'];
        $direction = $state['direction']['direction'];
        $continentNumber = $state['continentNumber']['continentNumber'];
        $cityFrom  = $state['itinerary']['cityLeaving'];
        
        $tmpdate = str_replace('/', '-', $state['itinerary']['dateLeaving']);
        $departureDate  = date('Y-m-d', strtotime($tmpdate));
        
        $TravelClass = $state['itinerary']['travelClass'];
    
        $adults = str_replace('+','',$state['preview']['adultNo']);
        $children = str_replace('+','',$state['preview']['childrenNo']);
        $infant = str_replace('+','',$state['preview']['infantNo']);
        $fname = $state['preview']['firstName'];
        $lname = $state['preview']['lastName'];
        $email = $state['preview']['accountEmail'];
        $mobile = $state['preview']['phone'];
        $prefNotes = $state['preview']['comments'];
        $source = "Web - Plan My Trip Classic";

        //build email message
    	$email_message .= "<b>First Name</b>: ".clean_string($fname)."<br>";
    	$email_message .= "<b>Last Name</b>: ".clean_string($lname)."<br>";
    	$email_message .= "<b>Email</b>: ".clean_string($email)."<br>";
    	$email_message .= "<b>Telephone</b>: ".clean_string($mobile)."<br><br/>";
    	$email_message .= "<b>Comments</b>: ".$comments."<br><br>";
    	$email_message .= "<b>Origin</b>: ".clean_string($cityFrom)."<br>";
    	$email_message .= "<b>Departure Date</b>: ".clean_string($departureDate)."<br>";
    	$email_message .= "<b>Travel Class</b>: ".clean_string($TravelClass)."<br>";
    	$email_message .= "<b>PAX Number Adults/ Children/ Infants</b>: ".clean_string($adults)."/". clean_string($children) ."/" . clean_string($infant) ."<br>"."<br>";
    	
    	$email_message .= "<b>Comments</b>: <br>";

        $comments  = "Depart from ".$cityFrom .", leaving on ".$departureDate .". Heading ".ucfirst($direction)." to:\n";
        $email_message .= "Depart from ".$cityFrom .", leaving on ".$departureDate .". Heading ".ucfirst($direction)." to:<br>";
    
        for($i=1; $i<=$continentNumber; $i++){
            if($i==1)
                $continent = $state['continentFirst']['continentFirst'];
            if($i==2)
                $continent = $state['continentSecond']['continentSecond'];
            if($i==3)
                $continent = $state['continentThird']['continentThird'];
            if($i==4)
                $continent = $state['continentFourth']['continentFourth'];
            if($i==5)
                $continent = $state['continentFifth']['continentFifth'];
            for($j=0; $j<=$state['itinerary']['extraCitiesNo'.$i]; $j++){
                $cityNo = $j+1;
                $country = $state['itinerary']['extraCities'.$i]['country'.$cityNo];
                $city = $state['itinerary']['extraCities'.$i]['city'.$cityNo];
                $asiatransit = $state['itinerary']['extraCities'.$i]['asiatransit'.$cityNo];
                $makeOwnArrangement = $state['itinerary']['extraCities'.$i]['makeOwnArrangement'.$cityNo];
                $comments .= ucwords(str_replace('_',' ',$continent))." - ";
                $email_message .= ucwords(str_replace('_',' ',$continent))." - ";
                if($asiatransit != 1){
                    $stayAmount = $state['itinerary']['extraCities'.$i]['stayAmount'.$cityNo];
                    $stayUnit = $state['itinerary']['extraCities'.$i]['stayUnit'.$cityNo];
                    $comments .= $country." - ".$city.", staying for ".$stayAmount." ".$stayUnit;
                    $email_message .= $country." - ".$city.", staying for ".$stayAmount." ".$stayUnit;
                } else {
                    $stayAmount = '';
                    $stayUnit = '';
                    $comments .= "In transit";
                    $email_message .= "In transit";
                }
                if($makeOwnArrangement == 1){
                    $comments .= ", making own arrangements to next destination";
                    $email_message .= ", making own arrangements to next destination";
                }
                $comments .= "\n";
                $email_message .= "<br>";
            }
        }

    }


    	
    	
        // send mail to admin
        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
            ->setUsername('info@roundabouttravel.com.au')
            ->setPassword('norwood5067')
        ;
        
        $mailer = new Swift_Mailer($transport);
    
        //Creating message
        $message = (new Swift_Message($subject))
            ->setFrom(['email@roundabouttravel.com.au' => 'RoundAbout Travel'])
            ->setTo(["kenny@roundabouttravel.com.au" => "Kenny Chau", "info@roundabouttravel.com.au" => "RoundAbout Travel"])
            ->setContentType("text/html")
            ->setBody($email_message)
        ;
    
        $result = $mailer->send($message);
            
    
        
        // TODO send mail to client
        
        
        // insert CRM
    	
		$url = 'https://roundabouttravel.com.au/crm/api/insertRecord.php';
		$data = [
			'firstname' => $fname, 
			'lastname' => $lname,
			'phone' => $mobile, 
			'email' => $email,
			'perferredNotes' => $prefNotes, 
			'message' => $comments,
			'preferreddates' => $departureDate, 
			'departure_city' => $cityFrom,
			'travelClass' => $TravelClass,
			'nadult' => $adults, 
			'nchildren' => $children,
			'ninfants' => $infant,
			'leadsource' => $source,
			'branch' => $branch,
			'destination' => $destination,
			'ipAddr' => $ipaddr
		];

	
		// use key 'http' even if you send the request to https://...
		$options = [
			'http' => [
				'header' => "Content-type: application/x-www-form-urlencoded\r\n". 
				            "Authorization: Basic cmF0YWRtaW46Q29tcGxleEFQSTIwMjA=\r\n",
				'method' => 'POST',
				'content' => http_build_query($data),
			],
		];

		$context = stream_context_create($options);
		
		$result = file_get_contents($url, false, $context);
		if ($result === false) {
			/* Handle error */
			echo "CRM Insert error";
		}
		

    	//Insert to Mailchimp

            
        // MailChimp API credentials
        $apiKey = 'b397167989d119d44ab249b0ed4ab80c-us5';
        $listID = '845eca9eba';
        
        // MailChimp API URL
        $memberID = md5(strtolower($email));
        $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
        $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listID . '/members/' . $memberID;
        
        // member information
        $json = json_encode([
            'email_address' => $email,
            'status'        => 'subscribed',
            'tags'  => array($source),
            'merge_fields'  => [
                'FNAME'     => $fname,
                'LNAME'     => $lname
            ]
        ]);
        
        // send a HTTP POST request with curl
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        curl_close($ch);
                
        print "success";
        
        return;
}

function clean_string($string) {
  $bad = array("content-type","bcc:","to:","cc:","href");
  return str_replace($bad,"",$string);
}


/*
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
error_log( "Hello, errors!" );
*/