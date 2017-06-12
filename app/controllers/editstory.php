<?php

   namespace X\App\Controllers;

   use X\Sys\Controller;


   class Editstory extends Controller{
   		

   		public function __construct($params){
   			parent::__construct($params);
            $this->addData(array(
               'page'=>'Editstory'));
   			$this->model=new \X\App\Models\mEditstory();
   			$this->view =new \X\App\Views\vEditstory($this->dataView,$this->dataTable);    
   		}


   		function home(){
              
              $lista=$this->model->getStory();

              
              $this->addData($lista);
 

              $this->view->__construct($this->dataView,$this->dataTable);
              
              $this->view->show();
            
   		}

      

      function eliminar(){
        $id = $_POST['eliminar'];
        
        $result = $this->model->delStory($id); 
        
          if($result==1){
            $this->ajax(array('msg'=>'Correcto'));
            header('Location:/stp/editstory');
                  
          }else {
            $this->ajax(array('msg'=>'no'));
            header('Location:/stp/editstory');
          }
      }

      

      function editar(){
        $sentencia = $_POST['idstories'];
        
        
        $result = $this->model->ediStory($sentencia); 
        
          if($result==1){
            $this->ajax(array('msg'=>'Se ha actualizado'));
                  
          }else {$this->ajax(array('msg'=>'No se ha podido actualizar'));
          
          ;}
      }


   }
