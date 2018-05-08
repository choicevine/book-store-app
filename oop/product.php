<?php
	
	class Product{
		private $title = "waiting for an angel";
		private $type = "Book";
		private $price = 5000;

		public function __construct(){
			
		}

		public function setTitle($title){
			$this->title = $title;

		}

			// this is the method and it is the interface where these(title,price, ) property can be accessed
		public function getTitle(){
			return $this->title;
		}

		public function getType(){
			return $this->type;
		}
		public function getPrice(){
			return $this->price;
		}

	}