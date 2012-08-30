<?php

class PsUnit_ReflectionUtils {
	
	public static function getProperty($object, $property) {
		$properties = self :: getProperties($object, array($property));
		return $properties[$property];
	}
	
	public static function getProperties($object, $properties = array()) {
		$reflection = new ReflectionClass($object);
		$values = array();
		foreach ($properties as $property) {
			$reflectionProperty = $reflection->getProperty($property);
			$reflectionProperty->setAccessible(true);
			$values[$property] = $reflectionProperty->getValue($object);
		}
		return $values;
	}
	
}