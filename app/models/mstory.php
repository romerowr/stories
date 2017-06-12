<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mStory extends Model{
		public function __construct(){
			parent::__construct();
			
            }
            

            public function getStory($user, $story){
			$sql="SELECT * FROM stories WHERE idstories = ".$story. " AND users = ".$user;
			
              
			$this->query($sql);

			$res=$this->execute();

			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
			}

				

			public function lastPath($usuario){
				$sql="SELECT path FROM stories WHERE users= ".$usuario." ORDER BY path DESC LIMIT 1 ";
				var_dump($sql);
				$this->query($sql);
	                        
				$this->execute();

	            $result=$this->single();
	                  var_dump($result);   
				if($result){
	                return $result;							
				}else 
	            {
	                return 0001;          
	           	}
			}

			

			public function valStory($value, $usuario, $historia){

			$sql="call sp_new_user($usuario, $historia, $value)";

			$this->query($sql);

			$this->execute();

			$res = $this->rowCount();

			if($res == 0){
				$result=$res;
							
			}else {$result=null;}
			return $result;
			}
 			
 			
	}
