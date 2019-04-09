<?php
use RootYQ\Profiler\ProfilerManager;

class ProfilerManagerTest extends PHPUnit\Framework\TestCase
{
    /**
     * @var ProfilerManager
     */
    private $profilerManager;

    protected function setUp()
    {
        \org\bovigo\vfs\vfsStream::setup('root');

        $this->profilerManager = new ProfilerManager([
            'profiler' => [
                'driver' => 'xhprof'
            ],
            'storage' => [
                'driver' => 'file',
                'file' => [
                    'path' => \org\bovigo\vfs\vfsStream::url('root')
                ]
            ],
        ]);
    }

    public function testGetProfiler()
    {

        $profiler = $this->profilerManager->getProfiler();

        $this->assertInstanceOf(\RootYQ\Profiler\Profiler::class, $profiler);
    }

    public function testGetStorage()
    {
        $storage = $this->profilerManager->getStorage();

        $this->assertInstanceOf(\RootYQ\Profiler\Storage\Storage::class, $storage);
    }

    public function testSaveProfileData()
    {
        $data = ['function1' => [], 'function2' => []];

        $result = $this->profilerManager->saveProfileData($data);

        $this->assertTrue($result);
    }
}