<?php
/**
 * Visitor
 *
 * Is a way of separating an algorithm from an object structure
 * on which it operates. A practical result of this separation
 * is the ability to add new operations to existing object structures
 * without modifying those structures.
 *
 * @category Behaviour
 */

interface Visited
{
    public function accept(Visitor $visitor);
}

class VisitedArray implements Visited
{
    protected $elements = array();

    public function addElement($element)
    {
        $this->elements[]=$element;
    }

    public function getSize()
    {
        return count($this->elements);
    }

    public function accept(Visitor $visitor)
    {
        $visitor->visit($this);
    }
}

interface Visitor
{
    public function visit(VisitedArray $elements);
}

class DataVisitor implements Visitor
{
    protected $info;

    public function visit(VisitedArray $visitedArray)
    {
        $this->info = sprintf ("The array has %d elements", $visitedArray->getSize());
    }

    public function getInfo()
    {
        return $this->info;
    }
}

$visitedArray = new VisitedArray();
$visitedArray->addElement('Element 1');
$visitedArray->addElement('Element 2');
$visitedArray->addElement('Element 3');
$dataVisitor = new DataVisitor();
$visitedArray->accept($dataVisitor);
$dataVisitor->visit($visitedArray);
printf('Info from visitor object: %s'.PHP_EOL, $dataVisitor->getInfo());

/*
Info from visitor object: The array has 3 elements
*/
