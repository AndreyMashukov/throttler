<?php

namespace Tests;

use \LoadBalance\Throttler;
use \LoadBalance\Sensors\CPUSensor;
use \PHPUnit\Framework\TestCase;
use \SimpleXMLElement;

 /**
  * @runTestsInSeparateProcesses
  */

class ThrottlerTest extends TestCase
    {

	/**
	 * Should allow make processes always with default sensor
	 *
	 * @return void
	 */

	public function testShouldAllowMakeProcessesAlwaysWithDefaultSensor()
	    {
		$throttler = new Throttler();
		$time      = time();
		$throttler->run();
		$secondtime = time();
		$this->assertEquals($time, $secondtime);
	    } //end testShouldAllowMakeProcessesAlwaysWithDefaultSensor()


	/**
	 * Should allow make process as decide the CPU sensor
	 *
	 * @return void
	 */

	public function testShouldAllowMakeProcessAsDecideTheCpuSensor()
	    {
		$load    = sys_getloadavg();
		$current = $load[0];

		if ($current <= 15)
		    {
			$expected = 0;
		    }
		else if ($current > 15 && $current <= 30)
		    {
			$expected = 5;
		    }
		else if ($current > 30 && $current <= 50)
		    {
			$expected = 10;
		    }
		else
		    {
			$expected = 60;
		    } //end if

		$throttler = new Throttler(new CPUSensor());
		$time      = time();
		$exp       = $time + $expected;
		$throttler->run();
		$secondtime = time();
		$this->assertEquals($exp, $secondtime);
	    } //end ShouldAllowMakeProcessAsDecideTheCpuSensor()


    } //end class

?>
