<?php
namespace ParkingLot;

/**
 * Class ParkingSpot
 */
class ParkingSpot
{
    private $vehicle;
    private $spotSize;
    private $row;

    /**
     * ParkingSpot constructor.
     * @param $spotSize
     * @param null $row
     */
    public function __construct($spotSize, $row = null)
    {
        $this->spotSize = $spotSize;
        $this->row = $row;
    }

    /**
     * @return bool
     */
    public function isSpotTaken()
    {
        return $this->vehicle == null;
    }

    /**
     * @param Vehicle $vehicle
     * @return bool
     */
    public function ifFit(Vehicle $vehicle)
    {
        return $this->isSpotTaken() && $vehicle->canFitInSpot($this);
    }

    /**
     * @return mixed
     */
    public function getSpotSize()
    {
        return $this->spotSize;
    }

    /**
     * write method
     */
    public function write()
    {
        if ($this->vehicle == null)
        {
            if ($this->spotSize === "compact") {
                echo 'c';
            } else if ($this->spotSize === "large") {
                echo 'l';
            } else if ($this->spotSize === "motorcycle") {
                echo 'm';
            }
        } else {
            $this->vehicle->write();
        }
    }

    /**
     * @return null
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * @param Vehicle $vehicle
     * @return bool
     */
    public function park(Vehicle $vehicle)
    {
        if ($this->ifFit($vehicle) === false)
        {
            return false;
        }
        $this->vehicle = $vehicle;

        return true;
    }
}
