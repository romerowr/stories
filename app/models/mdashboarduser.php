<?php

	namespace X\App\Models;

	use \X\Sys\Model;
	use X\Sys\Session;

	class mDashboarduser extends Model{
		public function __construct(){
			parent::__construct();
			
            }

             

            public function getStoryUser(){
			$iduser =  Session::get('users')['idusers'];
			

			$sql="SELECT * FROM stories WHERE users = :idusers";
			
			$this->query($sql);
			$this->bind(":idusers",$iduser);

			$res=$this->execute();
			
			
			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
			}

			
 
	}
