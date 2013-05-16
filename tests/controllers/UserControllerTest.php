<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserControllerTest
 *
 * @author JesusM
 * @date 11-may-2013
 */
class UserControllerTest extends CIUnit_TestCase
{
	public function setUp()
	{
		// Set the tested controller
		$this->CI = set_controller('account');
	}
	
	public function testUserController()
	{
		// Call the controllers method
		$this->CI->index();
		
		// Fetch the buffered output
		$out = output();
		
		// Check if the content is OK
		// Check if the output contains de string "error" or "notice"
                $this->assertSame(0, preg_match('/(error|notice)/i', $out));
	}
}

?>
