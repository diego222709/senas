<?php
include_once 'modelo/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT * FROM aprendiz";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);


?>

<!Doctype html>
<html lang="es">
<head>
	
	
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

	
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
		
		<!-- Poper Bootstrap --> 
	    
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="https://kit.fontawesome.com/dcb1bbced2.css" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/dcb1bbced2.js" crossorigin="anonymous"></script>

	</head>
<body>
	<ul class="nav bg-success">

  <li class="nav-item">
    <a class="nav-link text-white" href="index.php">Inicio</a>
  </li>
		
  <li class="nav-item">
    <a class="nav-link text-white" href="vista/faprendiz.php">Inscripcion</a>
  </li>
 <li class="nav-item">
    <a class="nav-link text-white" href="vista/fconsulta.php">Consulta</a>
  </li>
 
</ul>
	<br>
	<div class="container">
	<h1 class="text-center">Listado de Aprendices Inscrito</h1>
	<br>
		<br>
	<table class="table table-striped">
   <thead>
    <tr>
	<th scope="col">#</th>
      <th scope="col">Documento</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Edad</th>
	   <th scope="col">Id Programa</th>
	  <th scope="col">Editar</th>
        <th scope="col">Eliminar</th>
		
		
    </tr>
  </thead>
		
  <tbody>
  <?php
			foreach($usuarios as $filtro){
			?>
			<tr>
			    <td><?php echo $filtro['Id_Aprendiz']?></td>
				<td><?php echo $filtro['Documento']?></td>
				<td><?php echo $filtro['Nombre']?></td>
				<td><?php echo $filtro['Apellidos']?></td>
				<td><?php echo $filtro['Edad']?></td>
				<td><?php echo $filtro['Id_programa']?></td>
		<td><button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#editar"><i class="fa-solid fa-file-pen"></button></td>
			
			
		<td><button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#eliminar"><i class="fa-solid fa-trash-can"></i></i></button></td>
		
				</tr>
				<?php
			}
				?>
  </tbody>
</table>
	
	</div>
<!--- Modal de editar --->
		<div class="modal fade" id="editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualización de Datos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="controlador/editar.php" method="post">
				<input type="hidden" name="id" id="update_id">
				    
					<div class="form-group">
					<label for="">Documento</label>
					<input type="text" name="documento" id="documento" class="form-control">
					</div>
					
					<div class="form-group">
					<label for="">Nombre</label>
					<input type="text" name="nombre" id="nombre" class="form-control">
					</div>
					
					<div class="form-group">
					<label for="">Apellidos</label>
					<input type="text" name="apellido" id="apellido" class="form-control">
					</div>
					
					<div class="form-group">
					<label for="">Edad</label>
					<input type="text" name="edad" id="edad" class="form-control">
					</div>
					
					<br>
					<div class="form-group">
					<label for="">id</label>
					<input type="text" name="programa" id="programa" class="form-control">
					</div>
					<br>
					<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Actualizar</button>
      </div>
					</form>
      </div>
    
    </div>
  </div>
</div>

<!--- Modal de editar --->
<div class="modal fade" id="eliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar Datos Seleccionados</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<h4>Quieres Eliminar Datos Seleccionados</h4>
		<form action="controlador/eliminar.php" method="post">
			<input type="text" name="id" id="delete_id">
      </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">No</button>
        <button type="submit" class="btn btn-danger">Eliminar</button>
	</div>
	</form>
    </div>
  </div>
</div>

<script>
$('.editbtn').on('click',function(){
	
	$tr=$(this).closest('tr');
	var datos=$tr.children("td").map(function(){
	 return $(this).text();
	});
	
	$('#update_id').val(datos[0]);
	$('#documento').val(datos[1]);
	$('#nombre').val(datos[2]);
	$('#apellido').val(datos[3]);
	$('#edad').val(datos[4]);
	$('#programa').val(datos[5]);
});

</script>
<script>
$('.deletebtn').on('click',function(){
	
	$tr=$(this).closest('tr');
	var datos=$tr.children("td").map(function(){
	 return $(this).text();
	});
	$('#delete_id').val(datos['0']);
});

</script>


	
	</body>
</html>