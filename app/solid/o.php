<?php


// Open Closed principle states that "A class or method should be open for extension but closed for modification"

// How to do it: 
/**
 * When you have a class or method you want to extend
 * without modyfing it, separate the extensible behavior 
 * behind an interface, and then flip the dependencies.
 * 
 * - Uncle Bob says
 */

//  Wrong Implementation
// We have a company A 

// class CompanyA
// {
//     public int $profit;
//     // It has a property profit that is calculated on the higher level module
//     public function __construct(int $profit){
//         $this->profit = $profit;
//     }

// }

// // Same goes with our company B
// class CompanyB
// {
//     public int $profit;
//     public function __construct(int $profit){
//         $this->profit = $profit;
//     }
// }

// // This is the higher module that calculates the taxes of companies
// class CompanyTax
// {
//     public function __construct()
//     {
        
//     }

//     // Here we have an extensible method that calculates all the taxes depending
//     // on the company provided
//     public function calcTotalTaxCompany($company)
//     {
//         $taxes = [];
        
//         // Looping through companies as we calculate the taxes 
//         // and appending it to the array of taxes 
//         foreach ($company as $comp)
//         {
//             // We check which class is that company and then tax it depending on the class
//             if (is_a($comp, 'CompanyA')) 
//             {
//                 $taxes[] = $comp->profit - ($comp->profit * 0.20);
//             } else if (is_a($comp, 'CompanyB'))
//             {
//                 $taxes[] = $comp->profit - ($comp->profit * 0.40);
//             }            
//         }        
        
//         return $taxes;
//     }
// }


// $comp = new CompanyTax();
// print_r($comp->calcTotalTaxCompany([new CompanyA(2000), new CompanyB(3000)]));


//  EXAMPLE OF HOW TO IMPLEMENT IT PROPERLY 

// Recall that we have an extensible method in our class
// and from that we have to code it in an interface

// First step is to separate the extensible behavior behind an interface
interface CalculateTax
{
    public function calcTotalTaxCompany();
}


// Next is to flip the dependencies (To classes implementing interface)
// Meaning we have to implement the INTERFACE on all the companies

class CompanyA implements CalculateTax
{
    public int $profit;

    public function __construct(int $profit)
    {   
        $this->profit = $profit;
    }

    public function calcTotalTaxCompany()
    {
        return $this->profit - ($this->profit * 0.20);
    }
}

class CompanyB implements CalculateTax
{
    public int $profit;

    public function __construct(int $profit)
    {
        $this->profit = $profit;
    }

    public function calcTotalTaxCompany()
    {
        return $this->profit - ($this->profit * 0.40);
    }
}

class CompanyTax
{
    public function calculateTaxes(array $company)
    {
        $taxes = [];

        foreach ($company as $comp)
        {
            $taxes[] = $comp->calcTotalTaxCompany();
        }
        
        return $taxes;
    }
}

$comp = new CompanyTax();

print_r($comp->calculateTaxes([new CompanyA(2000), new CompanyB(3000)]));


