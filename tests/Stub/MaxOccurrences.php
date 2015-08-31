<?php

namespace PHP2WSDL\Test\Stub;

/**
 * Dummy class containing a maxOccurs attribute
 */
class MaxOccurrences
{

    /**
     * @var string
     */
    public $normalValue;

    /**
     * @var string
     * @maxOccurs 4
     */
    public $string4Times;

    /**
     * @var string
     * @maxOccurs unbounded
     */
    public $unboundedString;

    /**
     * @var string
     * @maxOccurs someValue
     */
    public $stringWithInvalidMaxOccurs;
}
