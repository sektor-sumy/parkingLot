<?php
namespace ParkingLot;

/**
 * Class Level
 */
class Level
{
    private $level;
    private $spots = [];
    private $availableSpots = 0;
    const SPOTS_PER_ROW = 10;

    /**
     * Level constructor.
     * @param $numberOfSpot
     * @param $level
     */
    public function __construct($numberOfSpot, $level)
    {
        $this->level = $level;
        $busSpots = $numberOfSpot/5;
        $motorcycleSpots = $numberOfSpot/5;
        $carSpots = $numberOfSpot - $busSpots - $motorcycleSpots;

        for ($spotNumber = 0 ; $spotNumber < $busSpots; $spotNumber++) {
            $spotSize = "large";
            $row = $spotNumber/self::SPOTS_PER_ROW;
            $this->spots[$spotNumber] = new ParkingSpot($spotSize, $row);
        }

        for ($spotNumber = $busSpots , $k=0; $k < $carSpots; $spotNumber++,$k++) {
            $spotSize = "compact";
            $row = $spotNumber/self::SPOTS_PER_ROW;
            $this->spots[$spotNumber] = new ParkingSpot($spotSize, $row);//spots[spotNumber]=new ParkingSpot(spotNumber,this,spotSize,row);
        }

        for ($spotNumber = $carSpots + $busSpots , $k=0; $k < $motorcycleSpots; $spotNumber++, $k++) {
            $spotSize = "motorcycle";
            $row = $spotNumber/self::SPOTS_PER_ROW;
            $this->spots[$spotNumber] = new ParkingSpot($spotSize,$row);//spots[spotNumber]=new ParkingSpot(spotNumber,this,spotSize,row);
        }
        $this->availableSpots = $numberOfSpot;
    }

    /**
     * @return int
     */
    public function getAvailableSpots()
    {
        return $this->availableSpots;
    }

    public function write()
    {
        $lastRow = -10;//this just has to not be 0 for the increment to be placed in the first row (or the zero row)
        foreach ($this->spots as $spot) {
            if ($spot->getRow() != $lastRow) {
                echo "<br />";
                $lastRow = $spot->getRow();
            }
            $spot->write();
        }
    }

    /**
     * @param Vehicle $vehicle
     * @return bool
     */
    public function parkVehicle(Vehicle $vehicle)
    {
        $spotNumber = $this->findOpenSpots($vehicle);
        if (!$spotNumber) {
            return false;
        }
        if ($this->getAvailableSpots() < $vehicle->getSpotsNeeded()) {
            return false;
        }

        return $this->parkAtSpot($spotNumber, $vehicle);
    }

    /**
     * @param Vehicle $vehicle
     * @return bool|int
     */
    private function findOpenSpots(Vehicle $vehicle)
    {
        $spotsNeeded = $vehicle->getSpotsNeeded();
        $lastRow = -10;
        $spacesFound = 0;
        $count = 0;
        foreach ($this->spots as $spot) {
            if ($lastRow != $spot->getRow()) {
                $spacesFound = 0;
                $lastRow = $spot->getRow();
            }
            if ($spot->ifFit($vehicle)) {
                $spacesFound++;
            } else {
                $spacesFound = 0;
            }
            if ($spacesFound == $spotsNeeded) {
                return $count - ($spotsNeeded - 1);
            }
            $count++;
        }

        return false;
    }

    /**
     * @param $spotNumber
     * @param Vehicle $vehicle
     * @return bool
     */
    private function parkAtSpot($spotNumber, Vehicle $vehicle)
    {
        for ($i = $spotNumber; $i < $spotNumber + $vehicle->getSpotsNeeded(); $i++) {
            $this->spots[$i]->park($vehicle);
        }
        $this->availableSpots -= $vehicle->getSpotsNeeded();
        return true;
    }
}