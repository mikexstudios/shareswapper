<?php defined('SYSPATH') or die('No direct script access.');

class url extends url_Core {
	
	/**
	 * Takes an id (an integer) and converts it
	 * to a base 36 which shortens the representation.
	 * Used for assigning a URL to a file. We want to start
	 * at four digits, so we add (36^3) to all input values.	 
	 * 
	 * @param int An integer id.
	 * @return string
	 */	 	 	 	 	 	 	
	public static function int_to_short_id($in_id) {
		$num = $in_id + 46656; //Start at 4 characters
		
		$out   = '';  
		$alpha = 'abcdefghijklmnopqrstuvwxyz0123456789';  
		do
		{  
		    $r = $num % 36;  
		    //echo $num.' '.$r."\n";
		    $num = floor($num / 36);
		    $out = $alpha[$r] . $out;  
		} while($num > 0);   
		return $out;  
	}
	
	/**
	 * Takes short id and deconverts it into integer representation.	  
	 * 
	 * @param string short id
	 * @return int
	 */	 	 	 	 	 	 	
	public static function short_id_to_int($in_id) {
		$out   = 0;  
		$alpha = 'abcdefghijklmnopqrstuvwxyz0123456789';
		
		$power = 0; //Start at 36^0 digit position.
		do
		{  
			$char = substr($in_id, -1); //Last char
		  $in_id = substr($in_id, 0, -1); //Everything but last char
		  
		  //Find where $char is:
		  $digit = strpos($alpha, $char);
		  $out += pow(36, $power) * $digit;
		  
		  $power++;
		} while(!empty($in_id));   
		
		$out -= 46656; // Start at 4 characters.
		
		return (int)$out;  
	}

}

?>
