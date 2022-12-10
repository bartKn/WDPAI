<?php

class DailyRun
{
    private $creatorId;
    private $startPoint;
    private $time;
    private $distance;
    private $pace;

    public function __construct($creatorId, $startPoint, $time, $distance, $pace)
    {
        $this->creatorId = $creatorId;
        $this->startPoint = $startPoint;
        $this->time = $time;
        $this->distance = $distance;
        $this->pace = $pace;
    }

    public function getCreatorId(): int
    {
        return $this->creatorId;
    }

    public function setCreatorId(int $creatorId)
    {
        $this->creatorId = $creatorId;
    }

    public function getStartPoint(): string
    {
        return $this->startPoint;
    }

    public function setStartPoint(string $startPoint)
    {
        $this->startPoint = $startPoint;
    }

    public function getTime(): string
    {
        return $this->time;
    }

    public function setTime(string $time)
    {
        $this->time = $time;
    }

    public function getDistance(): string
    {
        return $this->distance;
    }

    public function setDistance(string $distance)
    {
        $this->distance = $distance;
    }

    public function getPace(): string
    {
        return $this->pace;
    }

    public function setPace(string $pace)
    {
        $this->pace = $pace;
    }




}