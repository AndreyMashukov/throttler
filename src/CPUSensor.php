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

		$cores  = 1;
		$result = shell_exec("nproc");
		if ($result > 0)
		    {
			$cores = (int) $result;
		    }

		$log = log10($current / $cores);

		if ($log > 0)
		    {
			$sleep = round($log * 60);
			return $sleep;
		    }
		else
		    {
			return 0;
		    }

	    } //end calculate()


    } //end class

?>