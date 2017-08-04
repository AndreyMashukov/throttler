<?php

namespace LoadBalance;

use \LoadBalance\Sensors\Sensor;

class Throttler
    {

	/**
	 * Used sensor
	 *
	 * @var Sensor
	 */
	private $_sensor;

	/**
	 * Prepare Throttle to work
	 *
	 * @param Sensor $sensor Sensor for processing pause
	 *
	 * @return void
	 */

	public function __construct(Sensor $sensor = null)
	    {
		if ($sensor !== null)
		    {
			$this->_sensor = $sensor;
		    }
		else
		    {
			$this->_sensor = \LoadBalance\Sensors\DefaultSensor::class;
		    } //end if

	    } //end __construct()


	/**
	 * Run, make pause
	 *
	 * @return void
	 */

	public function run()
	    {
		sleep($this->_sensor::calculate());
	    } //end run()


    } //end class


?>
