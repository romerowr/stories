<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;


   class Registre extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Registre'));
   			$this->model=new \X\App\Models\mRegistre();
   			$this->view =new \X\App\Views\vRegistre($this->dataView,$this->dataTable);    
   		}


   		function home(){
          
                 
                    $this->view->__construct($this->dataView,$this->dataTable);
                    $this->view->show();
            
   		}
                
                
                function reg(){
                    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                    $passwd = filter_input(INPUT_POST, 'passwd');
                    $usrname = filter_input(INPUT_POST, 'usrname');
                    
                    $res = $this->model->reg($email, $passwd, $usrname);
                    
                    if($res==1){
                        $this->ajax(array('msg'=>'Correcto'));
                        header('Location:../login');
                    }
                    else{
                        $this->ajax(array('msg'=>'Incorrecto'));
                        header('Location:../registre');
                    }
                }

         
   }
