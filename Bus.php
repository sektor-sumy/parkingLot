<?php
namespace ParkingLot;

/**
 * Class Bus
 */
class Bus extends Vehicle
{
    /**
     * Bus constructor.
     */
    public function __construct()
    {
        $this->spotsNeeded = 5;
        $this->vehicleSize = "large";
    }

    public function write()
    {
         echo "B";
    }

    /**
     * @param ParkingSpot $spot
     * @return bool
     */
    public function canFitInSpot(ParkingSpot $spot)
    {
        return $spot->getSpotSize() == "large";
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "Bus";
    }

}
