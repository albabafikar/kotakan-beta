<?php

$string = "R & D";

if(strpos(strtolower($string), 'r & d') !== false) {
	echo 'Owned';
} else {
	echo 'Not Owned';
}