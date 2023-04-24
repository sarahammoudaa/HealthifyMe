<?php
	class comment {
		private $id=null;
		private $time=null;
		private $content=null;
		private $userID=null;
		
		
		private $password=null;
		function __construct($id,$time, $content, $userID){
			$this->id=$id;
			$this->time=$time;
			$this->content=$content;
			
			$this->userID=$userID;
			
		}
		function getid(){
			return $this->id;
		}
		function gettime(){
			return $this->time;
		}
		
		function getcontent(){
			return $this->content;
		}



		function getuserID(){
			return $this->userID;
		}
		

		function setid(string $id){
			$this->id=$id;
		}

		function settime(string $time){
			$this->time=$time;
		}
		function setcontent(string $content){
			$this->content=$content;
		}
        function setuserID(string $userID){
			$this->userID=$userID;
		}
		
		
	}
    ?>