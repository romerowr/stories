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
		      <li ><a href="/stp/dashboard">Home</a></li>
		    
		          <li><a href="/stp/addstory">Añadir Historia</a></li>
		          <li><a href="/stp/editstory">Editar Historia</a></li>
                          <li class="active"><a href="/stp/edituser">Editar Usuarios</a></li>
		      <li><a href="/stp/profile">Perfil</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		      <li><a href="/stp/login/logout">Salir</a></li>
		    </ul>
		  </div>
		</nav>

		
		<section>

		<h1>Usuarios</h1>
			<table class="table table-hover">
			<thead><th>id_user</th><th>roles</th><th>email</th><th>password</th><th>username</th></thead>
              
              <form action="/stp/edituser/editar" method="POST">
              <?php for($i=0;$i<count($this->dataTable);$i++){ ?>
                
                <tr>
                <?php $cont=0; $cont2=0; $ids=['iduser', 'rol', 'email', 'password', 'username'];?>
                <?php foreach($this->dataTable[$i] as $key=>$value) :?>
                  	<?php if($cont==0){$id=$value;$cont++;} ?>
                  	
                        <td><input type="text" id="<?=$ids[$cont2];?>" name="<?=$ids[$cont2];?>" value="<?= $value; ?>"></input></td>
                  	<?php $cont2++ ?>
                  <?php endforeach; ?>
                  
                  <td>
                  <button type="button" class="btn edi-user btn-success" value="editar" id="<?= $id; ?>" name="editar" >Editar</button>
                  </td>
                  </form>
                  <form action="/stp/edituser/eliminar" method="POST">
                  <td>
                  	<button type="submit" class="btn btn-danger elm-user" value="<?= $id; ?>" id="<?= $id; ?>" name="eliminar">Eliminar</button>
                  </td>
                  </form>
                  </tr>
                <?php } ?>
            </table>

            <span class="msg"></span>
        </section>


<?php 
	include 'footer_common.php';
?>