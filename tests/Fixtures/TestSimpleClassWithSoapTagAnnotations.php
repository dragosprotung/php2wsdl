<?php

namespace PHP2WSDL\Test\Fixtures;

/**
 * Example class with @soap annotation.
 */
class TestSimpleClassWithSoapTagAnnotations
{

    public $param1 = array();
    public $param2;

    /**
     * Constructor.
     *
     * @param string $param2
     */
    function __construct($param2 = "")
    {
        $this->param2 = $param2;
    }


    /**
     * Adds two numbers.
     *
     * @soap
     *
     * @param float $p1
     * @param float $p2
     * @return float
     */
    protected function add($p1, $p2)
    {
        return ($p1 + $p2);
    }

    /**
     * Make array.
     *
     * @param mixed $el1
     * @param mixed $el2
     * @return array
     */
    public function makeArray($el1, $el2)
    {
        return array($el1, $el2);
    }
}
