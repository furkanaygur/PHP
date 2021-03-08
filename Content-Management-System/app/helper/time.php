<?php

function timeConvert($time)
{
    $time =  strtotime($time);
    $time_difference = time() - $time;
    $sec = $time_difference;
    $min = round($time_difference / 60);
    $hour = round($time_difference / 3600);
    $day = round($time_difference / 86400);
    $week = round($time_difference / 604800);
    $month = round($time_difference / 2419200);
    $year = round($time_difference / 29030400);
    if ($sec < 60) {
        if ($sec == 0) {
            return "now";
        } else {
            return $sec . ' seconds ago';
        }
    } else if ($min < 60) {
        return $min . ' minutes ago';
    } else if ($hour < 24) {
        return $hour . ' hours ago';
    } else if ($day < 7) {
        return $day . ' days ago';
    } else if ($week < 4) {
        return $week . ' weeks ago';
    } else if ($month < 12) {
        return $month . ' months ago';
    } else {
        return $year . ' years ago';
    }
}
