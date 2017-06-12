<?php

	namespace X\App\Models;

	use \X\Sys\Model;
	use X\Sys\Session;

	class mLogin extends Model{
		public function __construct(){
			parent::__construct();
			
		}
                
               
                public function valemail($em){
                    
			$sql="SELECT * FROM users WHERE email=:email"; 
			$this->query($sql);
                        $this->bind(":email", $em);
                         
                        $this->execute();
                        $result=$this->rowCount();
                        
			if($result){
                            return $result;							
			}else 
                        {
                            return -1;
                            
                        }
		}
                
                
                 public function login($em, $pass){

					$sql="SELECT * FROM users WHERE email=:email && password=:password";
		                 
					$this->query($sql);
		                        $this->bind(":email", $em);
		                        $this->bind(":password", $pass);
		                         
					$res=$this->execute();
		                        $result=$this->rowCount();
		                        
		                        $user=$this->single();
		                        
					if($result==1){
								
		                        return $user;							
					}else 
		                        {
		                            return -1;
		                            
		                        }
				 }

				 public function id($em){

					$sql="SELECT idusers FROM users WHERE email=:email";
		                 
					$this->query($sql);
		            $this->bind(":email", $em);
		                         
					$res=$this->execute();
		            $result=$this->single();
		                        
					if($result!=false){
		                return $result['idusers'];							
					}else 
		            {
		                return -1;        
		         	}
				 }
	}