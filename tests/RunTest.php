<?php

class RunTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \RootYQ\Profiler\Run
     */
    private $run;

    protected function setUp()
    {
        $this->run = new \RootYQ\Profiler\Run(['function1' => [], 'function2' => []]);
    }

    public function testGetId()
    {
        $id = $this->run->getId();

        $this->assertNotNull($id);
    }

    public function testTreatAsString()
    {
        $result = (string)$this->run;

        $this->assertTrue(is_string($result));
    }
}
