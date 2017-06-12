<?php

	namespace X\App\Models;

	use \X\Sys\Model;

	class mEditprofile extends Model{
		public function __construct(){
			parent::__construct();
			
            }

            	

			public function ediUser($sentencia){
			
			$sql="UPDATE klopez_stp.users SET ".$sentencia; 
          	$this->query($sql);

          	$this->execute();

          	$result=$this->rowCount();

          	if($result==1)
				return $result;
			else
				$result = -1;

			return $result;
			}
}
