<?php

namespace RootYQ\Profiler;


use RootYQ\Profiler\Storage\Storage;

class ProfilerManager
{
    /**
     * the set of profiler
     * @var array
     */
    private $profiler = [
        'xhprof' => '\RootYQ\Profiler\XhProfiler'
    ];

    /**
     * the set of storage
     * @var array
     */
    private $storage = [
        'file' => '\RootYQ\Profiler\Storage\FileStorage'
    ];

    /**
     * config
     * @var array
     */
    private $config = [];

    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * @return array
     */
    public function getProfilerConfig()
    {
        return $this->config['profiler'];
    }

    /**
     * @return array
     */
    public function getStorageConfig()
    {
        return $this->config['storage'];
    }
    /**
     * @return Profiler
     */
    public function getProfiler()
    {
        $config = $this->getProfilerConfig();

        $driver = $config['driver'];

        if (!isset($this->profiler[$driver])) {
            throw new \InvalidArgumentException('can not find the corresponding profiler');
        }

        return new $this->profiler[$driver]();
    }


    /**
     * @return Storage
     */
    public function getStorage()
    {
        $config = $this->getStorageConfig();

        $driver = $config['driver'];

        $path = $config[$driver]['path'];

        if (!isset($this->storage[$driver])) {
            throw new \InvalidArgumentException('can not find the corresponding storage');
        }

        return new $this->storage[$driver]($path);
    }


    /**
     * @param $data
     * @return boolean
     */
    public function saveProfileData($data)
    {
        $run = new Run($data);

        return $this->getStorage()->save($run);
    }
}