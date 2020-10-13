<?php
class Abstraction
{
    protected $implementation;

    public function __construct(Implementation $implementation)
    {
        $this->implementation = $implementation;
    }

    public function operation(): string
    {
        return "Abstraction: Base operation with:<br>" .
            $this->implementation->operationImplementation();
    }
}


class ExtendedAbstraction extends Abstraction
{
    public function operation(): string
    {
        return "ExtendedAbstraction: Extended operation with:<br>" .
            $this->implementation->operationImplementation();
    }
}

interface Implementation
{
    public function operationImplementation(): string;
}

class ConcreteImplementationA implements Implementation
{

    public function operationImplementation(): string
    {
        return "ConcreteImplementationA: Here's the result on the platform A.<br>";
    }
}

class ConcreteImplementationB implements Implementation
{

    public function operationImplementation(): string
    {
        return "ConcreteImplementationB: Here's the result on the platform B.<br>";
    }
}

function clientCode(Abstraction $abstraction)
{
    echo $abstraction->operation();
}

$implementation = new ConcreteImplementationA();
$abstraction = new Abstraction($implementation);
clientCode($abstraction);

echo "<br>";

$implementation = new ConcreteImplementationB();
$abstraction = new ExtendedAbstraction($implementation);
clientCode($abstraction);
