<?php

function timeedt_to_hour($time_edt) {
	$hour = ($time_edt/60)-8
	
	return $hour;
}