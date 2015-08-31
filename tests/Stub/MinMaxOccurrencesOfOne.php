<?php

namespace PHP2WSDL\Test\Stub;

/**
 * Dummy class containing a minOccurs and a maxOccurs attribute both with a value of 1
 */
class MinMaxOccurrencesOfOne
{

    /**
     * @var string
     */
    public $normalValue;

    /**
     * @var string
     * @minOccurs 1
     * @maxOccurs 1
     */
    public $requiredString;

}
