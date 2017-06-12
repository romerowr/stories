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
		      <li><a href="/stp/dashboard">Home</a></li>
		    
		          <li><a href="/stp/addstory">Añadir Historia</a></li>
		          <li><a href="/stp/editstory">Editar Historia</a></li>
                          <li><a href="/stp/edituser">Editar Usuarios</a></li>
		      <li class="active"><a href="/stp/profile">Perfil</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
		      <li><a href="/stp/login/logout">Salir</a></li>
		    </ul>
		  </div>
		</nav>
		
		<section>

		<h1>Perfil</h1>

				<p>Nombre de usuario: <?= $this->dataTable[0]['username'] ?></p>
				<p>Email: <?= $this->dataTable[0]['email'] ?></p>
				<p>Contraseña: <?= $this->dataTable[0]['password'] ?></p>
            	
            	<a href="<?= APP_W.'editprofile'?>" >Editar Perfil</a>
            	
            	<div id="map"></div>

        </section>

<?php 
	include 'footer_common.php';
?>