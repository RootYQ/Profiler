<?php

class XhProfilerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \RootYQ\Profiler\XhProfiler
     */
    private $profiler;

    public function setUp()
    {
        if (extension_loaded('xhprof')) {
            $this->markTestSkipped('xhprof extension is not installed');
        }
        $this->profiler = new \RootYQ\Profiler\XhProfiler();
    }


    public function testTurnOn()
    {
        $this->profiler->turnOn();
    }


    public function testTurnDown()
    {
        $result = $this->profiler->turnDown();
        $this->assertNotNull($result);
    }

}