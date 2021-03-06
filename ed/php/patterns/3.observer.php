<?php
/**
 * Observer (publish-subscribe)
 *
 * Is a design pattern in which an object, called the subject, maintains a list of its dependents,
 * called observers, and notifies them automatically of any state changes.
 *
 * @category Behaviour
 */

abstract class Observer
{
    public function update($subject)
    {
        if (method_exists($this, $subject->getState())) {
            call_user_func_array(array($this, $subject->getState()), array($subject));
        }
    }
}

abstract class Subject
{
    protected $observers;
    protected $state;

    public function __construct()
    {
        $this->observers = array();
        $this->state = null;
    }

    public function attach(Observer $observer)
    {
        $i = array_search($observer, $this->observers);
        if ($i === false) {
            $this->observers[] = $observer;
        }
    }

    public function getState()
    {
        return $this->state;
    }

    public function setState($state)
    {
        $this->state = $state;
        $this->notify();
    }

    public function notify()
    {
        if (!empty($this->observers)) {
            foreach ($this->observers as $observer) {
                $observer->update($this);
            }
        }
    }
}

class Auth extends Subject
{
    function login()
    {
        $this->setState('login');
    }

    function logout()
    {
        $this->setState('logout');
    }
}

class ForumUser extends Observer
{
    function login($subject)
    {
        echo 'Forum user logged in.'.PHP_EOL;
    }

    function logout($subject)
    {
        echo 'Forum user logged out.'.PHP_EOL;
    }
}

$auth = new Auth();
$auth->attach(new ForumUser());
$auth->login();
$auth->logout();

/*
Forum user logged in.
Forum user logged out.
*/
