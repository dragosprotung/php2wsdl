<?php

namespace PHP2WSDL\Test;

use PHP2WSDL\PHPClass2WSDL;

class PHP2WSDLTest extends \PHPUnit_Framework_TestCase
{

    public function testSimpleClassWithSoapTagAnnotations()
    {
        $class = 'PHP2WSDL\Test\Fixtures\TestSimpleClassWithSoapTagAnnotations';
        $expectedFile = __DIR__ . '/Expected/TestSimpleClassWithSoapTagAnnotations.wsdl';

        $wsdlGenerator = new PHPClass2WSDL($class, 'localhost');
        $wsdlGenerator->generateWSDL(true);
        $actual = $wsdlGenerator->dump();
        $this->assertWSDLFileEqualsWSDLString($expectedFile, $actual);
    }

    public function testSimpleClassWithoutSoapTagAnnotations()
    {
        $class = 'PHP2WSDL\Test\Fixtures\TestSimpleClassWithoutSoapTagAnnotations';
        $expectedFile = __DIR__ . '/Expected/TestSimpleClassWithoutSoapTagAnnotations.wsdl';

        $wsdlGenerator = new PHPClass2WSDL($class, 'localhost');
        $wsdlGenerator->generateWSDL(false);
        $actual = $wsdlGenerator->dump();
        $this->assertWSDLFileEqualsWSDLString($expectedFile, $actual);
    }

    /**
     * Data provider.
     *
     * @return array
     */
    public function dataProviderForTestInBatch()
    {
        $data = array();
        $dir = new \DirectoryIterator(__DIR__ . '/Fixtures/DataProvider');
        foreach ($dir as $fileInfo) {
            if ($fileInfo->isFile()) {
                $basename = $fileInfo->getBasename('.php');
                $data[] = array(
                    'PHP2WSDL\Test\Fixtures\DataProvider\\' . $basename,
                    __DIR__ . '/Expected/DataProvider/' . $basename . '.wsdl'
                );
            }
        }
        return $data;
    }

    /**
     * @dataProvider dataProviderForTestInBatch
     */
    public function testInBatch($class, $expectedWSDLFile)
    {
        $wsdlGenerator = new PHPClass2WSDL($class, 'localhost');
        $wsdlGenerator->generateWSDL(false);
        $actual = $wsdlGenerator->dump();
        $this->assertWSDLFileEqualsWSDLString($expectedWSDLFile, $actual);
    }

    public function testGenerateWSDLForURIWithAllComponents()
    {
        $class = 'PHP2WSDL\Test\Fixtures\TestGenerateWSDLForURIWithAllComponents';
        $expectedWSDLFile = __DIR__ . '/Expected/TestGenerateWSDLForURIWithAllComponents.wsdl';
        $uri = 'http://usr:pss@example.com:81/path/file.ext?r=a/b/c&a=1&b[]=2&b[]=3';

        $wsdlGenerator = new PHPClass2WSDL($class, $uri);
        $wsdlGenerator->generateWSDL(false);
        $actual = $wsdlGenerator->dump();

        $this->assertWSDLFileEqualsWSDLString($expectedWSDLFile, $actual);
    }

    public function testGenerateWSDLWithStylesheet()
    {
        $class = 'PHP2WSDL\Test\Fixtures\TestGenerateWSDLWithStylesheet';
        $expectedWSDLFile = __DIR__ . '/Expected/testGenerateWSDLWithStylesheet.wsdl';

        $wsdlGenerator = new PHPClass2WSDL($class, 'localhost');
        $wsdlGenerator->setStylesheet('/path/to/stylesheet.xsl');
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
