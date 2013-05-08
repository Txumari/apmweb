<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserModelTest
 *
 * @author JesusM
 */


class UserModelTest extends CIUnit_TestCase
{
	protected $tables = array(
		'user' => 'user'
	);
	
	private $_pcm;
	
	public function __construct($name = NULL, array $data = array(), $dataName = '')
	{
		parent::__construct($name, $data, $dataName);
	}
	
	public function setUp()
	{
		//parent::setUp();
		
		/*
		* this is an example of how you would load a product model,
		* load fixture data into the test database (assuming you have the fixture yaml files filled with data for your tables),
		* and use the fixture instance variable
		
		$this->CI->load->model('Product_model', 'pm');
		$this->pm=$this->CI->pm;
		$this->dbfixt('users', 'products');
		
		the fixtures are now available in the database and so:
		$this->users_fixt;
		$this->products_fixt;
		
		*/
		
//		$this->CI->load->model('user');
//		$this->_pcm = $this->CI->Phone_carrier_model;

	}
	
	public function tearDown()
	{
		//parent::tearDown();
	}
        
        public function testEncryptEmpty()
        {
             $u = new User();
             //$u->password = 'password';
             $this->assertEmpty($u->_encrypt(''));
        }
}

?>
