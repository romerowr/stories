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
                          <li><a href="/stp/edituser">Editar Usuarios</a></li>
		      <li><a href="/stp/profile">Perfil</a></li>
		    </ul>
		    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/stp/login/logout">Salir</a></li>
		    </ul>
		  </div>
		</nav>

		
		<section style="width: 70%; margin: auto; display: flex; flex-direction: column; justify-content: center;">

			
			<h2><?= $this->dataTable[0]['titulo'] ?></h2>
			
			<textarea cols="10" style="height: 500px;"><?= $this->dataTable[0]['sinopsis'] ?></textarea>
			<form method="POST" action="/stp/story/valorar">
			<lable>Valoracion media: </label><input type="text" value="<?= $this->dataTable[0]['medium_values'] ?>" DISABLED>
			<label>   Tu valoración:  </label><input type="number" name="valoracion" id="valoracion">
			<input type="submit" name="enviar" value="Valorar">
			<input type="number" name="historia" id="historia" value="<?= $this->dataTable[0]['idstories'] ?>" style="visibility:hidden">
			</form>
			<div class="msg"></div>
        </section>


<?php 
	include 'footer_common.php';
?>