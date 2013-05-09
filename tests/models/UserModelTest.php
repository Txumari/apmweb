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
        
        public function testEncryptEmptyPassword()
        {
             $u = new User();
             $u->password = '';
            $u->_encrypt("password");
             $this->assertEmpty($u->password);
        }
        
        public function testEncryptEmptySalt()
        {
             $u = new User();
             $u->password = 'password';
             $u->salt = '';
            $u->_encrypt("password");
             $this->assertNotEmpty($u->salt);
        }
        
        public function testEncriptSaltEquals()
        {
            $u = new User();
            $u->password = 'password';
            $u->salt = 'saltEncripted';
            $u->_encrypt("password");
            $this->assertEquals($u->salt, 'saltEncripted');
        }
        
        public function testEncriptPasswordNotEquals()
        {
            $u = new User();
            $u->password = 'password';
            $u->_encrypt($u->password);
            $this->assertNotEquals($u->password, 'password');
        }
        
        public function testEncriptPasswordSaltSHA512()
        {
            $u = new User();
            $u->password = 'passwordSinEncriptar';
            $u->salt = 'saltEncripted';
            $u->_encrypt("password");
            $this->assertEquals($u->password, hash("sha512",'saltEncripted' . 'passwordSinEncriptar'));            
        }
}

?>
