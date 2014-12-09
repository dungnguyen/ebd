<?php
# some basic functions for use throughout the website
ini_set("display_errors",1);
error_reporting(E_ALL);
error_reporting(-1);
ini_set('display_errors', true);
# points for note
#  UK date format is dd/mm/yyyy
#
#

#temp working directory for development

define("SITEURL", "http://mark.local:88");


#convert to UK date time LONG

function uklongdate($var){
	$datetime = strtotime($var); 
	$mysqldate = date("dS F Y", $datetime); 
	return $mysqldate; 	 
}

 #convert to UK short date

function ukshortdate($var){
	$datetime = strtotime($var); 
	$mysqldate = date("d/m/Y", $datetime); 
	return $mysqldate; 	 
}

?>
