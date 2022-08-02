<?php
require_once dirname(__FILE__) . '/Cars.php';
$c1 = new Cars('Toyota', '彼');
echo $c1->rideOnCar();

$c2 = new Cars();
echo $c2->rideOnCar();
echo $c2->drive();
