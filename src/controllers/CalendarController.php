<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/EventRepository.php';

class CalendarController extends AppController
{

    private $eventRepository;

    public function __construct()
    {
        parent::__construct();
        $this->eventRepository = new EventRepository();
    }


    public function calendar()
    {
        if ($this->isPost()) {
            $year = $_POST['year'];
            $month = $_POST['month'];
            $this->today($year .'/' .$month .'/01');
        } else {
            $this->today(date('Y/m').'/01');
        }

    }

    public function today($date)
    {
        $datetime = DateTime::createFromFormat('Y/m/d', date($date));
        $firstDay = $datetime->format('l');

        $offset = ['Monday'=>0,
                    'Tuesday'=>1,
                    'Wednesday'=>2,
                    'Thursday'=>3,
                    'Friday'=>4,
                    'Saturday'=>5,
                    'Sunday'=>6];
        $otherMonthDays = $offset[$firstDay];

        $events = $this->eventRepository->getEventsInMonth(substr($date, 0,-3));
        $days = array();

        for ($i = 0; $i < $otherMonthDays; $i++)
        {
            $days[] = ['class' => "class=\"day other-month-day\""];
        }

        $month = intval(date('m', strtotime($date)));
        $year = intval(date('y', strtotime($date)));

        $monthLen = $this->days_in_month($month, $year);


        for ($i = 1; $i <= $monthLen; $i++)
        {
            if ($events[$i]) {
                $days[] = ['class' => "class=\"day event-day\"", 'dayNumber' => $i, 'events' => $events[$i]];
            } else {
                $days[] = ['class' => "class=\"day\"", 'dayNumber' => $i];
            }
        }

        $this->render('calendar', ['days' => $days, 'date' => date('F o', strtotime($date))]);
    }

    private function days_in_month($month, $year): int
    {
        // calculate number of days in a month
        return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
    }
}