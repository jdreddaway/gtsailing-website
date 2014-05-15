<?php

function arg_int($name, $def, $source) {
	if (isset($source[$name]) && is_number($source[$name])) {
		return $source[$name];
	}
	return $def;
}

function arg_str($name, $def, $source) {
	if (isset($source[$name])) {
		return $source[$name];
	}
	return $def;
}

?>
