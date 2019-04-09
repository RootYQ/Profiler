<?php
/**
 * Created by PhpStorm.
 * User: wenqi
 * Date: 2019/4/8
 * Time: 11:16
 */

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