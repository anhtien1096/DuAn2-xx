<?php


if ( !function_exists( 'makeTimeAgo' ) )
{
    function makeTimeAgo($time)
    {
        \Carbon\Carbon::setLocale(config('app.locale'));
        return \Carbon\Carbon::createFromTimestamp(strtotime($time))->diffForHumans();
    }
}