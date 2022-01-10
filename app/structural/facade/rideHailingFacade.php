<?php

namespace App\Structural\Facade;

use App\Structural\Facade\Booking;
use App\Structural\Facade\CarCollection;
use Exception;
use PhpParser\Node\Stmt\TryCatch;

/**
 * FACADE PATTERN 
 * 
 * WHAT
 * Facade pattern is a structural design pattern that is used to hide
 * the complexity of the complex set of classes. 
 * 
 * Commonly known as HELPERS::
 * 
 * It provides us a simple interface on working with various complex subsystems
 * 
 * WHY/WHEN
 * Use when you have to create lots of classes in order to produce an output/actions
 * Use when you want to provide a simple method a client can use, simply abstracting away
 * the complexity of requirement. 
 * Use when you want to reduce the complexity overload for client/consumers 
 * 
 * HOW
 * 1. Make you subclasses (Can be libraries or complex subclasses).
 * 2. Create a Facade class that will handle all the complex logic ( the utilization of complex subclasses);
 * 3. Provide a method on the facade that can be used by the clients.
 */

//  As stated Facade encapsulate and abstract all the necessary logic
// that the client will handle, and now the client will only use this
// facade to book and select its car. 
class RideHailingFacade
{
    // The method provided to the client, and will only required to provide
    // the destination from and to, as well as the car type the client wants to ride.
    public static function bookRide(string $from, string $to, string $carType = "sedan")
    {
        // The client doesnt need to instantiate this classes in order to book a ride
        // everything is handled by the facade or the helper.   
        try {
            $book = new Booking();
            $ride = $book->destination($from,$to);

            $car = new CarCollection($carType);
            $selected = $car->getCar();

            $book->saveBooking($from,$to,$selected);
        } catch (Exception $e) {
            throw $e;
        }

        return $ride. ' with '.$selected;
    }   
}