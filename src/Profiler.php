<?php

namespace RootYQ\Profiler;

interface Profiler
{
    /**
     * @return mixed
     */
    public function turnOn();

    /**
     * @return mixed
     */
    public function turnDown();
}