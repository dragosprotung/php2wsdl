<?php

namespace PHP2WSDL\Tests;

use DirectoryIterator;
use PHP2WSDL\PHPClass2WSDL;

class PHP2WSDLTest extends \PHPUnit_Framework_TestCase
{

    public function testSimpleClassWithSoapTagAnnotations()
    {
        $class = 'PHP2WSDL\Tests\Fixtures\TestSimpleClassWithSoapTagAnnotations';
        $expectedFile = __DIR__ . '/Expected/TestSimpleClassWithSoapTagAnnotations.wsdl';

        $wsdlGenerator = new PHPClass2WSDL($class, 'localhost');
        $wsdlGenerator->generateWSDL(true);
        $actual = $wsdlGenerator->dump();
        $this->assertWSDLFileEqualsWSDLString($expectedFile, $actual);
    }

    public function testSimpleClassWithoutSoapTagAnnotations()
    {
        $class = 'PHP2WSDL\Tests\Fixtures\TestSimpleClassWithoutSoapTagAnnotations';
        $expectedFile = __DIR__ . '/Expected/TestSimpleClassWithoutSoapTagAnnotations.wsdl';

        $wsdlGenerator = new PHPClass2WSDL($class, 'localhost');
        $wsdlGenerator->generateWSDL(false);
        $actual = $wsdlGenerator->dump();
        $this->assertWSDLFileEqualsWSDLString($expectedFile, $actual);
    }

    public function dataProviderForTestInBatch()
    {
        $data = array();
        $dir = new DirectoryIterator(__DIR__ . '/Fixtures/DataProvider');
        foreach ($dir as $fileInfo) {
            if ($fileInfo->isFile()) {
                $basename = $fileInfo->getBasename('.php');
                $data[] = array(
                    'PHP2WSDL\Tests\Fixtures\DataProvider\\' . $basename,
                    __DIR__ . '/Expected/DataProvider/' . $basename . '.wsdl'
                );
            }
        }

        return $data;
    }

    /**
     * @dataProvider dataProviderForTestInBatch
     */
    public function testInBatch($class, $expectedWSDLFile) {
        $wsdlGenerator = new PHPClass2WSDL($class, 'localhost');
        $wsdlGenerator->generateWSDL(false);
        $actual = $wsdlGenerator->dump();
        $this->assertWSDLFileEqualsWSDLString($expectedWSDLFile, $actual);
    }


    private function assertWSDLFileEqualsWSDLString($expectedFile, $actualString, $message = '')
    {
        $expected = file_get_contents($expectedFile);
        $this->assertEquals($expected, $actualString, $message);
    }
}
