<?php
class framework {
	function addHeadScripts($type='', $path=''){
		$head = "";
		$head .= '<meta http-equiv="X-UA-Compatible" content="IE=edge">';
		$head .= sprintf('<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">', $path);
		$head .= sprintf('<link rel="stylesheet" href="%scss/bootstrap.css">', $path);
		$head .= sprintf('<link rel="stylesheet" href="%scss/font-awesome.css">', $path);
		$head .= sprintf('<link rel="stylesheet" href="%scss/ionicons.css">', $path);
		$head .= sprintf('<link rel="stylesheet" href="%scss/AdminLTE.css">', $path);
		$head .= sprintf('<link rel="stylesheet" href="%scss/skin-purple.css">', $path);
		$head .= sprintf('<link rel="stylesheet" href="%scss/timercoin.css">', $path);
		
		$head .= sprintf('<script src="%sjs/jquery.min.js"></script>', $path);
		$head .= sprintf('<script src="%sjs/bootstrap.min.js"></script>', $path);
		$head .= sprintf('<script src="%sjs/adminlte.min.js"></script>', $path);
		$head .= sprintf('<script src="%sjs/framework.js"></script>', $path);
		$head .= "<script> $(document).ready(function () { $('.sidebar-menu').tree() })</script>";
		switch($type){
			case 'timer':
				$head .= sprintf('<script src="%sjs/timer_countdown.js"></script>', $path);
				break;
		}

		return $head;
	}
	
	function createCallout($type, $title="", $message){
		$callout = "";
		switch($type){
			case 0:
				$callout .= '<div class="callout callout-danger">';
				break;
			case 1:
				$callout .= '<div class="callout callout-info">';
				break;
			case 2:
				$callout .= '<div class="callout callout-warning">';
				break;
			case 3:
				$callout .= '<div class="callout callout-success">';
				break;
			default:
				$callout .= '<div class="callout callout-info">';
				break;
		}

		$callout .= sprintf('<h4>%s</h4>', $title);
		$callout .= sprintf('<p>%s</p>', $message);
		$callout .= '</div>';

		return $callout;
	}
	
	public function secondsBetweenDatetime($startDatetime, $finalDatetime){
		$seconds = $this->datetimeToSeconds($startDatetime) - $this->datetimeToSeconds($finalDatetime);

		$result = (int)floor($seconds);

		return $result;
	}

	public function datetimeToSeconds($datetime){
		$datetime = explode(" ", $datetime);

		$date = $this->dateToSeconds($datetime[0]);
		$time = $this->timeToSeconds($datetime[1]);

		$seconds = $date + $time;

		return $seconds;
	}

	public function dateToSeconds($date){
		$checkDate = explode("-", $date);

		$day = $checkDate[2];
		$month = $checkDate[1];
		$year = $checkDate[0];

		if(checkdate($month, $day, $year)){
			$result = strtotime($date);
		} else{
			printf("This isn't an valid time. Try input YYYY/MM/DD");
		}

		return $result;
	}

	public function timeToSeconds($time){
		$isValid = false;
		$checkTime = explode(":", $time);

		if($checkTime[0] >= 0 && $checkTime[0] <= 23){
			if($checkTime[1] >= 0 && $checkTime[1] <= 59){
				if($checkTime[2] >= 0 && $checkTime[2] <= 59){
					$isValid = true;
				}
			}
		}

		if($isValid){
			$result = strtotime($time);
		} else{
			printf("This isn't an valid time. Try input HH:MM:SS.");
			$result = 0;
		}

		return $result;
	}
	
	public function datetimeToArray($datetime){
		$datetime = explode(" ", $datetime);
		array_push($datetime, explode("-", $datetime[0]), explode(":", $datetime[1]));

		$datetime = array(
			"year" => $datetime[2][0],
			"month" => $datetime[2][1],
			"day" => $datetime[2][2],
			"hour" => $datetime[3][0],
			"minute" => $datetime[3][1],
			"second" => $datetime[3][2]);
		
		return $datetime;
	}
}

function getTimezoneList(){
	$string = "";
	foreach(timezone_abbreviations_list() as $abbr => $timezone){
		foreach($timezone as $val){
			if(isset($val['timezone_id'])){
				//var_dump($abbr,$val['timezone_id']);
				$string .= $val['timezone_id'].";";
			}
		}
	}
	$timezone = explode(";", $string);
	$timezone = array_unique($timezone);
	sort($timezone, SORT_STRING);
	
	return $timezone;
}
?>