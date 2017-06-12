<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mAddstory extends Model{
		public function __construct(){
			parent::__construct();
			
            }


            public function addStoryBD($usuario, $titulo, $texto){
				
				$sql="call sp_new_story(:users, :sinopsis, :titulo);"; //Sentencia/proceso a llamar
				
				$this->query($sql); 

	                        $this->bind(":users", $usuario);
	                        $this->bind(":titulo", $titulo);
	                        $this->bind(":sinopsis", $texto);
	                        
				$this->execute(); 

	                        $result=$this->rowCount(); 
				if($result){
	                            return 1;							
				}else 
	                        {
	                            return -1;
	                            
	                        }
			}

			 	

			public function addStoryFile($usuario, $titulo, $texto){
				$file_name = self::lastPath($usuario);
 				$file = fopen("stories/".$file_name['path'].".txt", "a+"); 
                                
 				fwrite($file, $titulo.PHP_EOL); 
 				fwrite($file, $texto.PHP_EOL); 
 				fclose($file); 
			    
			}

			

			public function lastPath($usuario){
				$sql="SELECT path FROM stories WHERE users= ".$usuario." ORDER BY path DESC LIMIT 1 ";
				var_dump($sql);
				$this->query($sql);
	                        
				$this->execute();

	            $result=$this->single();
	                  
				if($result){
	                return $result;							
				}else 
	            {
	                return 0001;          
	           	}
			}
}
