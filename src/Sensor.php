<?php

namespace LoadBalance\Sensors;

abstract class Sensor
    {

	/**
	 * Calculate pause to sleep machine
	 *
	 * @retutn int Seconds to sleep
	 */

	abstract public static function calculate():int;

    } //end class

?>
