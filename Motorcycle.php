<?php
namespace ParkingLot;

/**
 * Class Motorcycle
 */
class Motorcycle extends Vehicle
{
    /**
     * Motorcycle constructor.
     */
    public function __construct()
    {
        $this->spotsNeeded = 1;
        $this->vehicleSize = "motorcycle";
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "Motorcycle";
    }

    /**
     * @param ParkingSpot $spot
     * @return bool
     */
    public function canFitInSpot(ParkingSpot $spot)
    {
        return true;
    }

    public function write()
    {
        echo "M";
    }
}
