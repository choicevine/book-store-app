<?php
	
	class Book extends Product{

		protected $pageCount;

		protected $pages;

		public function __construct($title, $price, $pageCount){

			$this->title = $title;
			$this->price = $price;
			$this->pageCount = $pageCount;
			$this->type = "Book";

		}

		public function setPageCount($val){

			return $this->pageCoount = $val;
		}

		public function getPageCount(){

			return $this->getpageCount;
		}

		public function display(){

			$type = $this->getType();
			$title = $this->getTitle();
			$price = $this->getPrice();
			$pages = $this->getPageCount();

			echo "<h2>".$type."</h2>"
			."<p>Title:$title</p>"
			."<p>Price $price</p>"
			."<p>Pages: $pages</p><hr/>"
		}



	}