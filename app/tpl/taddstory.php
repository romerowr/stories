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
		      <li ><a href="/stp/dashboarduser">Home</a></li>
		      
		          <li class="active"><a href="/stp/addstory">Añadir Historia</a></li>
		        
		      
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

		<h1>Añadir</h1>
			
			<form method="POST" action="/stp/addstory/add">
			<label>Titulo</label>
			<input type="text" name="titulo" id="titulo">
			<label>Historia</label>
			
			<textarea id="texto" name="texto"></textarea>

			<input type="submit" name="newstory" id="newstory" class="btn btn-primary">
			</form>
            <span class="msg"></span>
        </section>


<?php 
	include 'footer_common.php';
?>