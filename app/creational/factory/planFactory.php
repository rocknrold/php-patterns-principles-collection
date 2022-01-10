<?php

namespace App\Creational\Factory;

use Exception;

/**
 * FACTORY DESIGN PATTERN 
 * 
 * WHAT 
 * This is a creational design pattern that helps on creating objects,
 * it relies on the interface/abstract classes. 
 * IT HAS A METHOD THAT RETURNS A CLASS/NEW INSTANCE DEPENDING ON THE INPUT GIVEN.
 * 
 * Abstract away the creation of objects. Helps reduce the use of new keyword
 * all around the codebase.
 *
 * When creating an object the client(the one who consumes/create an instance)
 * is abstracted on how the object was created because the factory takes care of
 * creating the instance of the class with a function the accepts a type in order
 * for the factory to know which object to be instantiated.
 *  
 * 
 * WHY
 * Easy to use and implement 
 * Promotes decoupling of classes 
 * 
 * WHEN
 * Use when you have to abstract away the creation of classes with same type/category 
 * Use when you have a complicated logic to crete an object of the class
 * 
 * HOW
 * 1. define an interface/abstract class that has methods common to every type/category
 * 2. implement the interface on each subclasses/types/categories.
 * 3. create a factory class that will be responsible on creating objects of concrete class(subclasses);
 * 
 * NOTE:
 * Factory method uses a similar concept of dependency injection;
 */

class PlanFactory
{
    // This example is only one way to create concrete objects;
    // It accepts type of plan and return a Plan (This is the interface common to all plan);
    public function create($plan = 'free') : Plan
    {
        // Plan path will determine the fullpath of concrete classes;
        $planPath = "App\\Creational\\Factory\\Plans\\".ucfirst($plan);
        
        // Checks if that class of plan exists;
        if (!class_exists($planPath))
        {
            throw new Exception("Class not found exception ".$planPath);
        }

        // Return a new instance of the class.
        return new $planPath();
        // After creating new object of any type of concrete class
        // The client has now the ability to use the methods on the
        // concrete implementation of plan type.  
    }

    
}