<?php
	
	include "firstclass.php";

	//creating an instance of the class prooduct

	$product = new Product();

	$product2 = new Product();

	$product3 = new Product();


	//echo $product->title. " -- ". $product->price;

	echo "<hr/>";

	//$product-> = "measuring time"

		$product->setTitle("nine lives");

	$title = $product->getTitle();
	$title2 = $product2->getTitle();
	$title3 = $product3->getTitle();
	echo '<h2>'.$title.'</h2>';

	echo '<hr/>';


	$type = $product->getType();
	$type2 = $product2->getType();
	$type3 = $product3->getType();
	echo $type;


	$price = $product->getPrice();
	$price2 = $product2->getPrice();
	$price3 = $product3->getPrice();


	


	/*echp 'this is how to get the type and price';*/
	echo  'the price of'.$title.'with'.$type.'is'.$price.',';


	echo '<br>';

	echo  'the price of'.$title2.'with'.$type2.'is'.$price2.',';

	echo '<br>'.$title3;

	echo '<hr/>';

	echo  'the price of'.$title3.'with'.$type3.'is'.$price3.','
	;

	