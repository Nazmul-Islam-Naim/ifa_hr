<?php
	/*function years()
	{
		$years = array();
		for ($i=2010; $i <= (int)date('Y'); $i++) 
		{ 
			array_push($years, $i);
		}
		return $years;
	}*/

	function years()
	{
		$years = array();
		for ($i=2010; $i <= 2035; $i++) 
		{ 
			array_push($years, $i);
		}
		return $years;
	}

	function months(){
		$months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');
		return $months;
	}

	function days(){
		$days = array('Sun' => 'Sunday', 'Mon' => 'Monday', 'Tue' => 'Tuesday', 'Wed' => 'Wednesday', 'Thu' => 'Thursday', 'Fri' => 'Friday', 'Sat' => 'Saturday');
		return $days;
	}

	function dateFormateForView($date){
		$date = date('d-m-Y', strtotime($date));
		return $date;
	}

	function genders(){
		$genders = array(1 => 'Male', 2 => 'Female', 3 => 'Other');
		return $genders;
	}

	function maritalStatus(){
		$value = array(1 => 'Single', 2 => 'Married', 3 => 'Widowed', 4 => 'Separated', 5 => 'Not Specified');
		return $value;
	}

	function contractType(){
		$value = array(1 => 'Permanent', 2 => 'Probation');
		return $value;
	}

	class Converter
	{
		public static $bn = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"];
		public static $en = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
	
		public static function bn2en($number)
		{
			return str_replace(self::$bn, self::$en, $number);
		}
	
		public static function en2bn($number)
		{
			return str_replace(self::$en, self::$bn, $number);
		}
		/**
		 */
		
	}
?>