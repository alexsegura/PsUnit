<?php

class DispatcherTest extends PHPUnit_Framework_TestCase {
	
	public function setUp() {
		
	}
	
	public function teardown() {
        \Mockery::close();
    }
	
	public function testGetControllerDefaultRouteIndexController() {
		
		// Rewriting = off
		PsUnit_MockUtils :: mockConfiguration(array(
			'PS_REWRITING_SETTINGS' => 0
		));
		
		PsUnit_MockUtils :: mockContext(array(
			'shop' => new Shop()
		));
		
		$_GET = array(
			'fc' 			=> null, 
			'controller' 	=> 'index'
		);
		
		$dispatcher = Dispatcher :: getInstance();
		$controller = $dispatcher->getController();
		$this->assertEquals('index', $controller);
		
		// Here we would need to check $dispatcher's internal state
		// but all is protected, with no getters
		
	}
	
	public function testGetControllerModuleRouteDefaultController() {
		
		// Rewriting = off
		PsUnit_MockUtils :: mockConfiguration(array(
			'PS_REWRITING_SETTINGS' => 0
		));
		
		PsUnit_MockUtils :: mockContext(array(
			'shop' => new Shop()
		));
		
		$_GET = array(
			'fc' 			=> 'module', 
			'controller' 	=> 'default'
		);
		
		$dispatcher = Dispatcher :: getInstance();
		$controller = $dispatcher->getController();
		$this->assertEquals('default', $controller);
		
		// Here we would need to check $dispatcher's internal state
		// but all is protected, with no getters
		
	}
	
}