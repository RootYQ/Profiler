<?php
namespace RootYQ\Profiler;


class XhProfiler implements Profiler
{
    /**
     * @return mixed
     */
    public function turnOn()
    {
        return xhprof_enable();
    }

    /**
     * @return mixed
     */
    public function turnDown()
    {
        return xhprof_disable();
    }
}