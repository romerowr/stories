<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mDashboard extends Model{
		public function __construct(){
			parent::__construct();
			
            }

 				

            public function getStory(){
			$sql="SELECT * FROM stories";
			$this->query($sql);

			$res=$this->execute();

			if($res){
				$result=$this->resultset();
							
			}else {$result=null;}
			return $result;
			}

			
 
	}
