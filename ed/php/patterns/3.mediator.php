<?php
/**
 * Mediator
 *
 * This pattern defines an object that encapsulates how a set of objects interact.
 *
 * @category Behaviour
 */

abstract class Mediator
{
    public abstract function send($message, Colleague $colleague);
}

class ConcreteMediator extends Mediator
{
    private $colleague1;
    private $colleague2;

    public function setColleague1(ConcreteColleague1 $colleague)
    {
        $this->colleague1 = $colleague;
    }

    public function setColleague2(ConcreteColleague2 $colleague)
    {
        $this->colleague2 = $colleague;
    }

    public function send($message, Colleague $colleague)
    {
        if ($colleague == $this->colleague1) {
            $this->colleague2->notify($message);
        } else {
            $this->colleague1->notify($message);
        }
    }
}

abstract class Colleague
{
    protected $mediator;

    public abstract function notify($message);

    public function __construct(Mediator $mediator)
    {
        $this->mediator = $mediator;
    }

    public function send($message)
    {
        $this->mediator->send($message, $this);
    }
}

class ConcreteColleague1 extends Colleague
{
    public function notify($message)
    {
        echo sprintf("Collegue1 gets message: %s\n", $message);
    }
}

class ConcreteColleague2 extends Colleague
{
    public function notify($message)
    {
        echo sprintf("Collegue2 gets message: %s\n", $message);
    }
}

$mediator = new ConcreteMediator();
$collegue1 = new ConcreteColleague1($mediator);
$collegue2 = new ConcreteColleague2($mediator);
$mediator->setColleague1($collegue1);
$mediator->setColleague2($collegue2);
$collegue1->send('How are you ?');
$collegue2->send('Fine, thanks!');

/*
Collegue2 gets message: How are you ?
Collegue1 gets message: Fine, thanks!
*/
