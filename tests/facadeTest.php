<?php

namespace Test;

use App\Structural\Facade\Booking;
use App\Structural\Facade\RideHailingFacade;
use Exception;
use PHPUnit\Framework\TestCase;

class FacadeTest extends TestCase
{
    public function test_facade_can_book_ride_with_default_cartype()
    {
        $book = RideHailingFacade::bookRide('Taguig City', 'Makati City');

        $firstBook = Booking::getBookings()[0];

        $this->assertEquals('Taguig City', $firstBook["from"]);
    }

    public function test_facade_actually_has_booked_now()
    {
        $this->assertNotEmpty(Booking::getBookings());
    }

    public function test_facade_can_book_ride_using_suv()
    {
        $book = RideHailingFacade::bookRide('Taguig City', 'Pangasinan', 'suv');

        $secondBook = Booking::getBookings()[1];

        $this->assertEquals('SUV', $secondBook["car"]);
    }

    public function test_facade_no_car_type_found()
    {
        $this->expectException(Exception::class);
        $book = RideHailingFacade::bookRide('Taguig City', 'Makati City', 'pickup');

        $this->assertCount(2, Booking::getBookings());
    }
}