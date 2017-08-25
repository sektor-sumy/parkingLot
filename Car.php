<?php
namespace ParkingLot;

/**
 * Class Car
 */
class Car extends Vehicle
{
    /**
     * Car constructor.
     */
    public function __construct()
    {
        $this->spotsNeeded = 1;
        $this->vehicleSize = "compact";
    }

    /**
     * @param ParkingSpot $spot
     * @return bool
     */
    public function canFitInSpot(ParkingSpot $spot)
    {
        return $spot->getSpotSize() == "large"  || $spot->getSpotSize() == "compact";
    }

    public function write()
    {
        echo "C";
    }

    /**
     * @return string
     */
    public function __toString() {
        return "Car";
    }
}
