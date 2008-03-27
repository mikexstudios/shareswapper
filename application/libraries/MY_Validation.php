<?php defined('SYSPATH') or die('No direct script access.');
 
class Validation extends Validation_Core {
 
	public function __construct()
	{
		// don't for get to call the parent constructor!
		parent::__construct();
	}

	// --------------------------------------------------------------------
	
	/**
	 * Set Select
	 *
	 * Enables pull-down lists to be set to the value the user
	 * selected in the event of an error
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	string
	 */	
	function set_select($field = '', $value = '')
	{
		if ($field == '' OR $value == '' OR  ! isset($_POST[$field]))
		{
			return '';
		}
			
		if ($_POST[$field] == $value)
		{
			return ' selected="selected"';
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Set Radio
	 *
	 * Enables radio buttons to be set to the value the user
	 * selected in the event of an error
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	string
	 */	
	function set_radio($field = '', $value = '')
	{
		if ($field == '' OR $value == '' OR  ! isset($_POST[$field]))
		{
			return '';
		}
			
		if ($_POST[$field] == $value)
		{
			return ' checked="checked"';
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Set Checkbox
	 *
	 * Enables checkboxes to be set to the value the user
	 * selected in the event of an error
	 *
	 * @access	public
	 * @param	string
	 * @param	string
	 * @return	string
	 */	
	function set_checkbox($field = '', $value = '')
	{
		if ($field == '' OR $value == '' OR  ! isset($_POST[$field]))
		{
			return '';
		}
			
		if ($_POST[$field] == $value)
		{
			return ' checked="checked"';
		}
	}

}
 
?>
