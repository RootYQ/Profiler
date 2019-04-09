<?php

namespace RootYQ\Profiler;


class Run
{
    private $id;

    private $data = [];

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        $this->id = uniqid();

        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function __toString()
    {
        return serialize($this->data);
    }
}