<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;
   use X\Sys\Session;
    
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


    class Addstory extends Controller{
   		
        public function __construct($params){
            parent::__construct($params);
            
            $this->addData(array('page'=>'Addstory'));
            $this->model=new \X\App\Models\mAddstory();
            $this->view =new \X\App\Views\vAddstory($this->dataView,$this->dataTable);    
   	}


   	function home(){
    
            $this->view->__construct($this->dataView,$this->dataTable);
            $this->view->show();
            
   	}

      function add(){
        $titulo = $_POST['titulo'];
        $texto = $_POST['texto'];
        $usuario = Session::get('users')['idusers'];

        $rol = Session::get('users')['roles'];
        
        $result = $this->model->addStoryBD($usuario, $titulo, $texto); 
        $this->model->addStoryFile($usuario, $titulo, $texto); 

          if($result==1){
            
            if ($rol == 1) {
                header('Location:/stp/dashboard');
              }else{
                header('Location:/stp/dashboarduser');
              }
                  
          }else {
            if ($rol == 1) {
                header('Location:/stp/dashboard');
              }else{
                header('Location:/stp/dashboarduser');
              }
          }
      }

   }
