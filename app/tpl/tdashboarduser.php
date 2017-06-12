<?php 
	include 'head_common.php';
?>
<?php
	use X\Sys\Session;
	if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

	 	

        <body>
        <nav class="navbar navbar-collapse navbar-inverse" style="background-color: brown;">
		  <div class="container-fluid">
		    <div class="navbar-header">
		      <a class="navbar-brand" href="/stp/dashboard"><?= Session::get('users')['username'] ?></a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li class="active"><a href="/stp/dashboard">Home</a></li>
		    
		          <li><a href="/stp/addstory">Añadir Historia</a></li>
		          <li><a href="/stp/editstory">Editar Historia</a></li>
                          <li><a href="/stp/edituser">Editar Usuarios</a></li>
		      <li><a href="/stp/profile">Perfil</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		      <li><a href="/stp/login/logout">Salir</a></li>
		    </ul>
		  </div>
		</nav>
		
		<section>

		<h1>Historias</h1>
			<table class="table table-hover">
                            <thead><th>id_story</th><th>username</th><th>path</th><th>tittle</th><th>sinopsis</th><th>medium_value</th></thead>
              <?php for($i=0;$i<count($this->dataTable);$i++){ ?>
                <tr onclick="location.href = '<?= APP_W.'story/get/user/'.$this->dataTable[$i]['users'].'/idstory/'.$this->dataTable[$i]['idstories'];?>'">
                <?php $cont=0; ?>
                <?php foreach($this->dataTable[$i] as $key=>$value) :?>
                  	<?php if($cont==0){$id=$value;$cont++;} ?>
                  	
                        <td><?= $value; ?></td>
                  
                  <?php endforeach; ?>
                  
                  </tr>
                <?php } ?>
                
            </table>

        </section>

<br /></div>

<?php 
	include 'footer_common.php';
?>