<?php
$parkingLot = new \ParkingLot\ParkingLot();
$motorcycle = new \ParkingLot\Motorcycle();
$parkingLot->parkVehicle($motorcycle);
$parkingLot->write();
$bus = new \ParkingLot\Bus();
$parkingLot->parkVehicle($bus);
$parkingLot->write();
$car = new \ParkingLot\Car();
$parkingLot->parkVehicle($car);
$parkingLot->write();
$car2 = new \ParkingLot\Car();
$parkingLot->parkVehicle($car2);
$parkingLot->write();
$car3 = new \ParkingLot\Car();
$parkingLot->parkVehicle($car3);
$parkingLot->write();
$car4 = new \ParkingLot\Car();
$parkingLot->parkVehicle($car4);
$parkingLot->write();
$car5 = new \ParkingLot\Car();
$parkingLot->parkVehicle($car5);
$parkingLot->write();
$motorcycle2 = new \ParkingLot\Motorcycle();
$parkingLot->parkVehicle($motorcycle2);
$parkingLot->write();
$motorcycle3 = new \ParkingLot\Motorcycle();
$parkingLot->parkVehicle($motorcycle3);
$parkingLot->write();
$motorcycle4 = new \ParkingLot\Motorcycle();
$parkingLot->parkVehicle($motorcycle4);
$parkingLot->write();