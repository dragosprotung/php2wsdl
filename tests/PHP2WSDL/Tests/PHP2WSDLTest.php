<?php

namespace PHP2WSDL\Tests;

use DirectoryIterator;
use PHP2WSDL\PHPClass2WSDL;

class PHP2WSDLTest extends \PHPUnit_Framework_TestCase {

	public function dataProviderPHP2WSDL() {
		$data = array();
		
		$dir = new DirectoryIterator(__DIR__ . '/Fixtures');
		foreach ($dir as $fileinfo) {
			if ($fileinfo->isFile()) {
				$basename = $fileinfo->getBasename('.php');
				$withAnnotation = strpos($basename, 'WithAnnotations');
				$data[] = array('PHP2WSDL\Tests\Fixtures\\' . $basename, file_get_contents(__DIR__ . '/Expected/' . $basename . '.wsdl'), $withAnnotation);
			}
		}
		
		return $data;
	}

	/**
	 * @dataProvider dataProviderPHP2WSDL
	 */
    public function testPHP2WSDL($class, $expected, $withAnnotation) {
    	$wsdlGenerator = new PHPClass2WSDL($class, 'localhost');
    	$wsdlGenerator->generateWSDL($withAnnotation);
    	$actual = $wsdlGenerator->dump();
    	$this->assertEquals($expected, $actual);
	}
}

