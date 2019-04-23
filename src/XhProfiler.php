<?php
namespace RootYQ\Profiler;

use Exception;

class XhProfiler implements Profiler
{

    /**
     * XhProfiler constructor.
     * @throws Exception
     */
    public function __construct()
    {
        $this->checkEnv();
    }

    /**
     * check the environment
     *
     * @return bool
     * @throws Exception
     */
    public function checkEnv()
    {
        if (!extension_loaded('xhprof')) {
            throw new Exception('please ensure xhprof extension is installed');
        }

        return true;
    }
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