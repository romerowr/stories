<?php

	namespace X\App\Models;

	use \X\Sys\Model;
	use X\Sys\Session;
	class mProfile extends Model{
		public function __construct(){
			parent::__construct();
			
            }

            	

            public function getUser(){
			$sql="SELECT * FROM users WHERE idusers = ".Session::get('users')['idusers'];
			
			$this->query($sql);

			$res=$this->execute();

			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
			}

			
}
