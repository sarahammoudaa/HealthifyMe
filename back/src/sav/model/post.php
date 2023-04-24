<?php
	class post {
		private $id=null;
		private $title=null;
		private $content=null;
		private $topicID=null;
		private $userID=null;


		
		
		private $password=null;
		function __construct($id,$title, $content, $topicID, $userID	){
			$this->id=$id;
			$this->title=$title;
			$this->content=$content;
			$this->topicID=$topicID;
			$this->userID=$userID;

			
		}
		function getid(){
			return $this->id;
		}
		function gettitle(){
			return $this->title;
		}
		
		function getcontent(){
			return $this->content;
		}

		function gettopicID(){
			return $this->topicID;
		}
		function getuserID(){
			return $this->userID;
		}
		

		function setid(string $id){
			$this->id=$id;
		}

		function settitle(string $title){
			$this->title=$title;
		}
		function setcontent(string $content){
			$this->content=$content;
		}
        function settopicID(string $topicID){
			$this->topicID=$topicID;
		}
		function setuserID(string $userID){
			$this->userID=$userID;
		}
		
		
	}
    ?>