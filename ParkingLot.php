<?php
namespace ParkingLot;

/**
 * Class ParkingLot
 * @package ParkingLot
 */
class ParkingLot
{
    const NUM_OF_LEVELS = 5;
    private $levels = [];

    /**
     * ParkingLot constructor.
     */
    public function __construct()
    {
        for ($i = 0; $i < self::NUM_OF_LEVELS; $i++) {
            $this->levels[$i] = new Level(30, $i);
        }
    }

    public function write()
    {
        for ($level = 0; $level < count($this->levels); $level++) {
            echo "Level ".$level.":";
            echo $this->levels[$level]->write();
        }
        echo "<br />";
    }

    /**
     * @param Vehicle $vehicle
     * @return bool
     */
    public function parkVehicle(Vehicle $vehicle)
    {
        foreach ($this->levels as $level) {
            if ($level->parkVehicle($vehicle)) {
                echo "Parking a ".$vehicle->__toString();

                return true;
            }
        }
        echo "There are no more spaces for this ".$vehicle->__toString().". The program will now terminate.";
        echo "<br />";
        echo "The final state of the parking lot is :";

        return false;
    }
}
