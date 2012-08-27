<?php

class DispatcherTest extends PHPUnit_Framework_TestCase {
	
	public function setUp() {
		
		$shop = new Shop();
		$shop->hydrate(array(
			'id_shop' => 1
		));
		
		PsUnit_MockUtils :: mockContext(array(
			'shop' => $shop
		));
		
	}
	
	public function teardown() {
        \Mockery::close();
    }
	
	public function testGetControllerDefaultRouteIndexController() {
		
		// Rewriting = off
		PsUnit_MockUtils :: mockConfiguration(array(
			'PS_REWRITING_SETTINGS' => 0
		));
		
		$_GET = array(
			'fc' 			=> null, 
			'controller' 	=> 'index'
		);
		
		$dispatcher = Dispatcher :: getInstance();
		$controller = $dispatcher->getController();
		$this->assertEquals('index', $controller);
		
		// Here we need to check $dispatcher's internal state
		// but all is protected, with no getters
		// So we need to use Reflection
		$front_controller = PsUnit_ReflectionUtils :: getProperty($dispatcher, 'front_controller');
		$this->assertEquals(Dispatcher :: FC_FRONT, $front_controller);
		
	}
	
	public function testGetControllerModuleRouteDefaultController() {
		
		// Rewriting = off
		PsUnit_MockUtils :: mockConfiguration(array(
			'PS_REWRITING_SETTINGS' => 0
		));
		
		$_GET = array(
			'fc' 			=> 'module', 
			'controller' 	=> 'default'
		);
		
		$dispatcher = Dispatcher :: getInstance();
		$controller = $dispatcher->getController();
		$this->assertEquals('default', $controller);
		
		// Here we need to check $dispatcher's internal state
		// but all is protected, with no getters
		// So we need to use Reflection
		$front_controller = PsUnit_ReflectionUtils :: getProperty($dispatcher, 'front_controller');
		$this->assertEquals(Dispatcher :: FC_MODULE, $front_controller);
	}
	
}