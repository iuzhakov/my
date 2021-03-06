<?php
/**
 * Builder
 *
 * Unlike the abstract factory pattern and the factory method pattern whose intention is to enable polymorphism,
 * the intention of the builder pattern is to find a solution to the telescoping constructor anti-pattern.
 * It occurs when the increase of object constructor parameter combination leads to an exponential list of constructors.
 *
 * @category Creational
 */

abstract class BuilderAbstract
{
    public function buildPartA() {}

    public function buildPartB() {}

    abstract public function getResult();
}

abstract class DirectorAbstract
{
    protected $builder = null;

    public function __construct(BuilderAbstract $builder)
    {
        $this->builder = $builder;
    }

    public function construct()
    {
        $this->builder->buildPartA();
        $this->builder->buildPartB();
    }
}

class Product {}

class Director extends DirectorAbstract {}

class Builder extends BuilderAbstract
{
    protected $product = null;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function buildPartA() {}

    public function buildPartB() {}

    public function getResult()
    {
        return $this->product;
    }
}

$builder = new Builder();
$director = new Director($builder);
$director->construct();
$product = $builder->getResult();
