<?php

// DEPENDENCY INVERSION PRINCIPLE
/**
 * The dependency inversion principle states that "An entity must depend on abstraction, and not on concrete implementations.
 * It states that the high level modules should and must not depend on the low level modules. But instead
 * depend on the abstraction.
 * 
 * It is also a principle of decoupling
 */

//  Meaning the calling class or should not care how the class/method does the job
//  as long as it does the job.

// 1. What are higher level modules? Anything that accepts the abstraction and does something with it. Without caring how it is done. 
// 2. What are low level modules? Any class that implementing the abstraction (the method they implement and has their own logic).
// 3. What are the abstraction and how do we depend on them?

interface Creditor
{
    public function getMoneyBack();
}

class RockyCreditor implements Creditor // low level modules are the ones that implements the interface
{
    public function getMoneyBack()
    {
        return 'I want the whole money back or Im gonna kill you!';
    }
}
// We can make as many Creditor as long as they implements the interface and method

class CompanyCreditor implements Creditor // they have their own way on how to get the money back
{
    public function getMoneyBack()
    {
        return 'This is Company Creditor and we are hired to get the 50% of the borrowed money! Thank you.';
    }
}

class Debtor // The higher level module is the one that accepts the low level module
{
    public function payMoneyBack(Creditor $creditor) // Accepts the Creditor and does not depend on what type of creditor is passed
    {
        return $creditor->getMoneyBack();
    }
}

$debtor = new Debtor();

echo $debtor->payMoneyBack(new RockyCreditor());
echo $debtor->payMoneyBack(new CompanyCreditor());

// FINAL NOTE: Both the lower and higher level modules must depend on the interface ( AKA Abstraction )