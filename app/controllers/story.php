<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;
   use X\Sys\Session;

   class Story extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Story'));
   			$this->model=new \X\App\Models\mStory();
   			$this->view =new \X\App\Views\vStory($this->dataView,$this->dataTable);    
   		}

      function home(){
          
                    $this->view->__construct($this->dataView,$this->dataTable);
                    $this->view->show();
            
      }

               
   		function get(){

              $user = $this->params['user'];

              $story = $this->params['idstory'];

              $historia=$this->model->getStory($user, $story);
              
              $this->addData($historia);

              $this->view->__construct($this->dataView,$this->dataTable);
              
              $this->view->show();
            
   		}

               

      function valorar(){

              $value = $_POST['valoracion'];
              $usuario = Session::get('users')['idusers'];
              $historia = $_POST['historia'];

              $rol = Session::get('users')['roles']; 
              $val=$this->model->valStory($value, $usuario, $historia); 
              
            if($val==0){
              
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
