<?php

class Availability{

	public static function display($availability){

		if($availability == 0) {

			echo "OUT OF STOCK";
		} elseif ($availability ==1) {
		    echo "IN STOCK";
		}
	}
	public static function displayClass($availability){

		if($availability == 0) {

			echo "OUTOFSTOCK";
		} elseif ($availability ==1) {
		    echo "INSTOCK";
		}
	}
}