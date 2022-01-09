<?php

namespace App\Creational\Singleton;

/**
 * SINGLETON PATTERN
 * ----------------------------------------------
 * 
 * The singleton pattern is a creational pattern,
 * the class or object can and only has one instance
 * throughout the entire application. 
 * 
 */


// We have an application class
// we all know that are application can only have one instance of itself 
 class Application
 {
    
   // Variable $instance that is of type Application which is our own class; 
   private static ?Application $instance; 
    
   // In singleton pattern constructor visibility is to private
   // this is to prevent creation of new instance of this Singleton class
   private function __construct()
   {    
   }

   // In order to create an instance of this application class we have to provide
   // a get method that can be called whenever this class is in need.
   public static function getApplication() : Application //get the application instance
   {
      // we are checking if the local variable instance is null
      if (!isset(static::$instance))
      {
         // if not set then create a new instance of this Application class
         self::$instance = new Application();
      }

      // If application has already an instance then just return that instance 
      return self::$instance; 
   }
 }
