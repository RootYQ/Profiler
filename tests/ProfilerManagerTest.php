<?php
use RootYQ\Profiler\ProfilerManager;

class ProfilerManagerTest extends PHPUnit\Framework\TestCase
{
    public function testGetProfiler()
    {
        $profilerManager = new ProfilerManager();
        $profiler = $profilerManager->getProfiler('xhprof');

        $this->assertInstanceOf(\RootYQ\Profiler\Profiler::class, $profiler);
    }
}