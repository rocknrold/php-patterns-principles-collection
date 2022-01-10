<?php

namespace App\Structural\Facade;

class Booking
{
    protected $rate = 4;
    protected static array $bookings = [];

    public function destination(string $from, string $to)
    {
        $price = (strlen($from) + strlen($to)) * $this->rate;
        
        return 'Ride booked: From '.$from. ' To '.$to.' with a total price of PHP '.$price.'.00';
    }

    public static function saveBooking($from, $to, $car)
    {
        

        array_push(static::$bookings, ["from" => $from, "to" => $to, "car" => $car]);
    }

    public static function getBookings()
    {
        return self::$bookings;
    }

}