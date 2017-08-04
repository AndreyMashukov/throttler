<?php

namespace LoadBalance\Sensors;

class DefaultSensor extends Sensor
    {

	/**
	 * Calculate pause to sleep machine
	 *
	 * @retutn int Seconds to sleep
	 */

	public static function calculate():int
	    {
		return 0;
	    } //end calculate()


    } //end class

?>