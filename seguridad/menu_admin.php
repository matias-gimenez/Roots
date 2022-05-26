<script>
$(document).ready(function(){

	$("#opc_usuarios").click(function(evento){
		evento.preventDefault();
		$('#id_container').load("usuarios/div_usuarios.php");
	});

	// 1
	$("#opc_codificadores").click(function(evento){
		evento.preventDefault();
		$('#id_container').load("codificadores/div_codificadores.php");
	});
	
	// 2
	$("#opc_materiales").click(function(evento){
		evento.preventDefault();
		$('#id_container').load("materiales/div_materiales.php");
	});

	// 3
	$("#opc_articulos").click(function(evento){
		evento.preventDefault();
		$('#id_container').load("articulos/div_articulos.php");
	});

	$("#opc_salir").click(function(evento){
		evento.preventDefault();
	 	window.open('./index.php','_self');
	});

	$("#id_inicio").click(function(evento){
		evento.preventDefault();
		$('#id_container').empty();
	});


	// Para que vuelva a cerrarse el menu luego de seleccionar una opcion en celulares
	$(document).on('click','.navbar-collapse.in',function(e) {
	    if( $(e.target).is('a') && ( $(e.target).attr('class') != 'dropdown-toggle' ))  {
	        $(this).collapse('hide');
	    }
	});

});

</script>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">

	<div class="container-fluid">

		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<a class="navbar-brand" href="" target="_blank"><img src="image/aaa.png" class="logomenu"  ></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Admin. Datos<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#" id="opc_codificadores">Codificadores</a></li>
						<li class="divider"></li>
						<li><a href="#" id="opc_materiales">Materiales</a></li>
						<li class="divider"></li>
						<li><a href="#" id="opc_articulos">Articulos</a></li>					
					</ul>
				</li>

				<li><a href="#" id="opc_usuarios">Usuarios</a></li>

				<li><a href="#" id="opc_salir">Salir</a></li>

			</ul>

			<!-- <form class="navbar-form navbar-right"> -->
			<form role="form" name="" id="" class="navbar-form navbar-right form-inline">
				<div id="div_nomusuario" class="font-blanco-1"></div>
			</form>

		</div><!-- /.navbar-collapse -->

	</div><!-- /.container-fluid -->
</nav>

<br><br><br><br><br>
