<?php

namespace PHP2WSDL\Test\Stub;

/**
 * Dummy class containing a minOccurs attribute
 */
class MinOccurrences
{

    /**
     * @var string
     */
    public $normalValue;

    /**
     * @var string
     * @minOccurs 0
     */
    public $nonRequiredString;

    /**
     * @var string
     * @minOccurs -3
     */
    public $stringWithNegativeMinOccurs;

    /**
     * @var string
     * @minOccurs 3
     */
    public $atLeast3TimesString;
}
