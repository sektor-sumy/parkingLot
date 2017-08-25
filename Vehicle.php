<?php
namespace ParkingLot;

/**
 * Class Vehicle
 */
abstract  class Vehicle
{
    protected $spotsNeeded;
    protected $vehicleSize;

    /**
     * @return mixed
     */
    public function getSpotsNeeded() {
        return $this->spotsNeeded;
    }

    /**
     * @param ParkingSpot $spot
     * @return mixed
     */
    public abstract function canFitInSpot(ParkingSpot $spot);

    /**
     * @return mixed
     */
    public abstract function write();
}
