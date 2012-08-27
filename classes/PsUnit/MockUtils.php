<?php

class PsUnit_MockUtils {
	
	public static function mockConfiguration($config = array()) {
		
		// We mock the Configuration class & its public static methods
		$mock = \Mockery :: mock('alias:Configuration');
		
		// Configuration :: get() will return the configured values
		foreach ($config as $key => $value) {
			$mock->shouldReceive('get')->with($key)->andReturn($value);
		}
		
	}
	
	public static function mockContext($vars = array()) {
		
		// We can't mock the Context class
		// because we would need to autoload it
		$context = Context :: getContext();
		foreach ($vars as $key => $value) {
			$context->{$key} = $value;
		}
		
	}
	
}