<?php
namespace RootYQ\Profiler\Storage;

interface Storage
{
    /**
     * @param $run
     * @return bool
     */
    public function save($run);

    /**
     * @return array
     */
    public function listAll();

    /**
     * @return \RootYQ\Profiler\Run | null
     */
    public function findById();
}