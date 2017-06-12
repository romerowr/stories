<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mEdituser extends Model{
		public function __construct(){
			parent::__construct();
			
            }

            public function getUsers(){
			$sql="SELECT * FROM users";
			$this->query($sql);

			$res=$this->execute();

			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
			}

			

			public function delUser($num){
			
			$sql="DELETE FROM `users` WHERE idusers =".$num.";";
          	
          	$this->query($sql);

          	$this->execute();

          	$result=$this->rowCount();
          	
          	if($result == 1)
				return $result;
			else
				$result = -1;

			return $result;
			}

				

			public function ediUser($sentencia){
			
			$sql="UPDATE storypub.users SET idusers=".$sentencia;
          	
          	$this->query($sql);

          	$this->execute();

          	$result=$this->rowCount();
          	
          	if($result == 1)
				return $result;
			else
				$result = -1;

			return $result;
			}
}
