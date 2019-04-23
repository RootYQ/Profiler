<?php

namespace RootYQ\Profiler;

interface Profiler
{

    /**
     * check the environment
     *
     * @return bool
     */
    public function checkEnv();

    /**
     * @return mixed
     */
    public function turnOn();

    /**
     * @return mixed
     */
    public function turnDown();
}