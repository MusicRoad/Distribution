<?php

namespace MusicRoad\InstrumentBundle\Validator\Constraints;

class JsonSchemaConstraint implements ConstraintInterface
{
    private $schemaUrl;

    public function __construct($schemaUrl)
    {
        $this->schemaUrl = $schemaUrl;
    }

    public function validate($data)
    {

    }
}
