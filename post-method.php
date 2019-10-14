
<?php

// Check if the form is submitted 
if ( isset( $_POST['modalSubmit'] ) ) 
{ 
	// retrieve the form data by using the element's name attributes value as key 
	$pickupLoc = $_POST['Pickup-location']; 
	$pickupDate = $_POST['Pickup-date']; // display the results
	$pickupTime = $_POST["Pickup-time"];
	$returnLocation = $_POST["Return-location"];
	$returnDate = $_POST["Return-date"];
	$returnTime = $_POST["Return-time"];
	$carGroup = $_POST["Car-group"];
	$insurancePicker = $_POST["Requested-insurance"];
	$shabbatObservance = $_POST["Shabbat-observance"];
	$tourist = $_POST["Tourist"];
	$fullName = $_POST["Name"];
	$email = $_POST["Email"];
	$phone = $_POST["Phone"];
	$remarks = $_POST["Remarks"];
	$ageGroup = $_POST["Age-group"];

	if($shabbatObservance == "on")
	{
		$shabbatObservance = "Yes";
	}
	else{
		$shabbatObservance = "No";
	}
	if($tourist == "on")
	{
		$tourist = "Yes";
	}
	else{
		$tourist = "No";
	}





		$headers =  'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8'."\r\n";
		//$headers .= "Content-Disposition:attachment;filename=NewRes.html" . "\r\n";
		$headers .= 'From: System Admin <info@kdtravel.com>' . "\r\n";
		
		

		// Email Variables
		$toUser  = "glamamit89@gmail.com"; // recipient
		$subject = "New reservation from your site for - ".$fullName; // subject
		$body    = "
					<html>
					<head>
					<meta charset='utf-8'>
					<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Abel'>
					
					<title>King David Travel</title>
					<html lang='EN'>
					<style>
					body {
						
					}
						
					#box{
						font-family:Abel,sans-serif;
						border: 1px solid #aaa; /*getting border*/
						border-radius: 4px; /*rounded border*/
						color: #000; /*text color*/
						font-size:30px;
						display: block;
						text-align:left;
						margin-left: auto;
						margin-right: auto;
						background-color:transparent;
						}
					</style>
					</head>
					<body>
					
					<div id='box'>"; // content


					$body .= "<b>Pickup location: </b>".$pickupLoc . "<br/>" . "<b>Pickup date: </b>" . $pickupDate . "<br/>" . "<b>Pickup time: </b>" . $pickupTime . "<br/><br/>" . 
					"<b>Return location: </b>" . $returnLocation . "<br/>" .  "<b>Return date: </b>" . $returnDate . "<br/>" .  "<b>Return time: </b>" . $returnTime . "<br/><br/>" . 
					"<b>Car group selected: </b>". $carGroup . "<br/>" .  "<b>Insurance selected: </b>" . $insurancePicker . "<br/>" .  "<b>Shabat observance: </b>" . $shabbatObservance . "<br/>" .  "<b>Tourist customer (NO VAT): </b>" . $tourist . "<br/><br/>" . 
					"<b>Customer full name: </b>" . $fullName . "<br/>" .  "<b>Customer email address: </b>" . $email . "<br/>" . "<b>Customer phone number: </b>" . $phone . "<br/>" . "<b>Customer age group: </b>" . $ageGroup . "<br/><br/>" . 
					"<b>Customer remarks: </b>" . $remarks ."<br/><br/>";
					$body.="
					
					</div> 
					</body>
					</html>";
					
					//echo $body;
					if (mail($toUser,$subject,$body,$headers)) 
					{
						echo "sent";
					} 
					else 
					{
						echo "failed";
					}
			}
			redirect('aut.html');
			
	function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}
?>
