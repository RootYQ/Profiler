<?php

use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;

class FileStorageTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \RootYQ\Profiler\Storage\FileStorage
     */
    private $storage;

    /**
     * @var vfsStreamDirectory
     */
    private $root;


    public function setUp()
    {
        $this->root = vfsStream::setup('temp');
        $path = vfsStream::url('temp');

        $this->storage = new \RootYQ\Profiler\Storage\FileStorage($path);
    }

    public function runDataProvider()
    {
        return ['function1' => [], 'function2' => []];
    }

    /**
     * @return PHPUnit_Framework_MockObject_MockObject
     */
    public function testMockRun()
    {
        $run = $this->getMockBuilder(\RootYQ\Profiler\Run::class)
            ->setConstructorArgs($this->runDataProvider())
            ->setMethods(['getId', '__toString'])
            ->getMock();

        return $run;
    }

    /**
     * @depends testMockRun
     * @param PHPUnit_Framework_MockObject_MockObject $run
     */
    public function testSave($run)
    {
        $run->expects($this->any())
            ->method('getId')
            ->willReturn(uniqid());

        $run->expects($this->any())
            ->method('__toString')
            ->will($this->returnValue(serialize($this->runDataProvider())));

        $this->assertNotNull($run->getId());

        $result = $this->storage->save($run);
        // if the file is created correctly
        $this->assertTrue($this->root->hasChild($run->getId()));
        // if the file content is wrote correctly
        $this->assertEquals($this->root->getChild($run->getId())->getContent(), serialize($this->runDataProvider()));

        $this->assertTrue($result);
    }

    public function tearDown()
    {
        unset($this->storage);
    }
}