<?php
/**
 * Facade
 *
 * A facade is an object that provides a simplified interface to a larger body of code, such as a class library.
 *
 * @category Structural
 */

class Bank
{
    public function OpenTransaction() {}
    public function CloseTransaction() {}
    public function transferMoney($amount) {}
}

class Client
{
    public function OpenTransaction() {}
    public function CloseTransaction() {}
    public function transferMoney($amount) {}
}

class Log
{
    public function logTransaction() {}
}

class Facade
{
    public function transfer($amount)
    {
        $Bank = new Bank();
        $Client = new Client();
        $Log = new Log();
        $Bank->OpenTransaction();
        $Client->OpenTransaction();
        $Log->logTransaction('Transaction open');
        $Bank->transferMoney(-$amount);
        $Log->logTransaction('Transfer money from bank');
        $Client->transferMoney($amount);
        $Log->logTransaction('Transfer money to client');
        $Bank->CloseTransaction();
        $Client->CloseTransaction();
        $Log->logTransaction('Transaction close');
    }
}

$Transfer = new Facade();
$Transfer->transfer(1000);
