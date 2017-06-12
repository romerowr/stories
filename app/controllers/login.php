<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;
   use X\Sys\Session;


   class Login extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Login'));
   			$this->model=new \X\App\Models\mLogin();
   			$this->view =new \X\App\Views\vLogin($this->dataView,$this->dataTable);    
   		}


   		function home(){
       
                    $this->view->__construct($this->dataView,$this->dataTable);
                    $this->view->show();
            
   		}
                
                function valemail(){
                    $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL); 
                    
                    $res = $this->model->valemail($email);

                    if($res==1){
                        $this->ajax(array('msg'=>'Este email existe'));
                    }
                    else{
                        $this->ajax(array('msg'=>'Este email no existe'));
                    }
                }
                
            

                function log(){
                    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                    $passwd = filter_input(INPUT_POST, 'passwd', FILTER_SANITIZE_STRING);
                    
                    $res = $this->model->login($email, $passwd); 
                    
                    if($res!=-1){
                        $this->ajax(array('msg'=>'Correcto'));
                        
                        session_start(); 
                        Session::set('users', $res); 
                        
                        if(Session::get('users')['roles']==1) 
                            header('Location:../dashboard');
                        else
                        header('Location:../dashboarduser');
                    }
                    else{
                        $this->ajax(array('msg'=>'NO es correcto'));
                        header('Location:../login');
                    }
                }

             

                function logout(){
                  
                    session_destroy();
                  header('Location:../');
                }
   }
