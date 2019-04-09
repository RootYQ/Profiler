<?php
namespace RootYQ\Profiler\Storage;


use RootYQ\Profiler\Run;

class FileStorage implements Storage
{

    private $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * @param Run $run
     * @return bool
     */
    public function save($run)
    {
        if (!is_dir($this->path)) {
            mkdir($this->path, 0755, true);
        }

        $file_name = rtrim($this->path, '/') . '/' . $run->getId();

        $file = fopen($file_name, 'w');
        fwrite($file, $run);

        return fclose($file);
    }

    /**
     * @return array
     */
    public function listAll()
    {
        return [];
    }

    /**
     * @return \RootYQ\Profiler\Run | null
     */
    public function findById()
    {
        return null;
    }
}