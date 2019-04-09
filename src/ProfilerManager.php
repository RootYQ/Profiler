<?php

namespace RootYQ\Profiler;


class ProfilerManager
{
    private $profiler = [
        'xhprof' => '\RootYQ\Profiler\XhProfiler'
    ];

    /**
     * @param $driver
     * @return mixed
     */
    public function getProfiler($driver)
    {
        if (!isset($this->profiler[$driver])) {
            throw new \InvalidArgumentException('can not find the corresponding driver');
        }

        return new $this->profiler[$driver]();
    }


}