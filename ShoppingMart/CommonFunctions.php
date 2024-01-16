<?php
// function to get the full state name to display as per o/p
function getState($stateName){
	$fullStateName = "";
	if($stateName == "GJ")
		$fullStateName = "Gujarat";
	else if($stateName == "UP")
		$fullStateName = "Uttar Pradesh";
	else if($stateName == "RJ")
		$fullStateName = "Rajasthan";
	else if($stateName == "MP")
		$fullStateName = "Madhya Pradesh";
	else if($stateName == "HP")
		$fullStateName = "Himachal Pradesh";
	else if($stateName == "MH")
		$fullStateName = "Maharashtra";
	
	return $fullStateName;
}

?>