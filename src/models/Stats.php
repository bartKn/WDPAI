<?php

class Stats
{
    private $events;
    private $eventsDistance;
    private $eventsPosition;
    private $dailyRuns;
    private $dailyRunsDistance;


    public function __construct($events, $eventsDistance, $eventsPosition, $dailyRuns, $dailyRunsDistance)
    {
        $this->events = $events;
        $this->eventsDistance = $eventsDistance;
        $this->eventsPosition = $eventsPosition;
        $this->dailyRuns = $dailyRuns;
        $this->dailyRunsDistance = $dailyRunsDistance;
    }

    public function jsonSerialize(): array
    {
        return [
            'events' => $this->events,
            'eventsDistance' => $this->eventsDistance,
            'eventsPosition' => $this->eventsPosition,
            'dailyRuns' => $this->dailyRuns,
            'dailyRunsDistance' => $this->dailyRunsDistance
        ];
    }

    public function getEvents(): int
    {
        return $this->events;
    }

    public function setEvents(int $events)
    {
        $this->events = $events;
    }

    public function getEventsDistance(): int
    {
        return $this->eventsDistance;
    }

    public function setEventsDistance(int $eventsDistance)
    {
        $this->eventsDistance = $eventsDistance;
    }

    public function getEventsPosition(): float
    {
        return $this->eventsPosition;
    }

    public function setEventsPosition(float $eventsPosition)
    {
        $this->eventsPosition = $eventsPosition;
    }

    public function getDailyRuns(): int
    {
        return $this->dailyRuns;
    }

    public function setDailyRuns(int $dailyRuns)
    {
        $this->dailyRuns = $dailyRuns;
    }

    public function getDailyRunsDistance(): int
    {
        return $this->dailyRunsDistance;
    }

    public function setDailyRunsDistance(int $dailyRunsDistance)
    {
        $this->dailyRunsDistance = $dailyRunsDistance;
    }
}