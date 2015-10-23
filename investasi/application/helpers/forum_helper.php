<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function toAscii($strg) {
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $strg);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", '-', $clean);
	return $clean;
}

function cutstring($text, $length) {
	if (strlen($text) >= $length) {
		$text = htmlentities(strip_tags($text));
		$text = substr($text, 0, $length)."...";
	}
	return $text;
}