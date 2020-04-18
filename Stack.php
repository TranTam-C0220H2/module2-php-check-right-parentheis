<?php


class Stack
{
    protected $stack;
    protected $limit;
    public function __construct($limit)
    {
        $this->stack = [];
        $this->limit = $limit;
    }

    public function getStack(): array
    {
        return $this->stack;
    }

    public function isEmpty()
    {
        return empty($this->stack);
    }

    public function isFull()
    {
        return count($this->stack) == $this->limit;
    }
    public function push($data)
    {
        if (!$this->isFull()) {
            array_push($this->stack,$data);
        } else {
            throw new Exception('Array is full!');
        }
    }
    public function pop() {
        if (!$this->isEmpty()) {
        return array_pop($this->stack);
        } else {
            throw new Exception('Array is empty!');
        }
    }
}