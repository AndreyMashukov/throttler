<?php

namespace LoadBalance\Sensors;

class CPUSensor extends Sensor
    {

	/**
	 * Calculate pause to sleep machine
	 *
	 * @retutn int Seconds to sleep
	 */

	public static function calculate():int
	    {
		$load    = sys_getloadavg();
		$current = $load[0];

		if ($current <= 15)
		    {
			$sleeptime = 0;
		    }
		else if ($current > 15 && $current <= 30)
		    {
			$sleeptime = 5;
		    }
		else if ($current > 30 && $current <= 50)
		    {
			$sleeptime = 10;
		    }
		else
		    {
			$sleeptime = 60;
		    } //end if

		return $sleeptime;
	    } //end calculate()


    } //end class

?>