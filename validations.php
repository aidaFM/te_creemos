<?php

function empty_fields($variable){
	foreach ($variable as $key => $value) {
		if(!isset($key)||$value == ''){
			return false;
		}
	}
	return true;
}