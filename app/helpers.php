<?php
// My common functions
function formatFrenchDate($date)
{
	setlocale (LC_TIME, 'fr_FR.utf8','fra');
    return strftime('%d %B %Y',strtotime($date));
}

function formatTime($timeHMS)
{
	$timeHM = substr($timeHMS, 0, 5);
    $formatedTime = str_replace(':','h',$timeHM);
    return $formatedTime;
}
?>