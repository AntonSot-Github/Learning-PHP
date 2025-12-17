<?php

    $days = [
        1 => 'Monday',
        2 => 'Tuesday', 
        3 => 'Wednesday',
        4 => 'Thirthday',
        5 => 'Friday',
        6 => 'Saturday',
        7 => 'Sunday'
    ];

    $curDate = date('d.m.Y');

    function getFullDate($days, $curDate) 
    {
        return "<span class='dayFormat'>" . $days[date('N')] . "</span>" . " - " . $curDate;
    }


