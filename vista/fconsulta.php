<!DOCTYPE html>
<html>
<head>
    <!---Icono Pestaña--->
    <link rel="shortcut icon" href=""> 
    
    <!---Bootstrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet" integrity="sha384-
      GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

      <!---Poper Bootstrap-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-
      alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
      </script>

      <!-- CSS --->
      <link rel="stylesheet" type="text/css" href="../css/style.css"> 
</head>
<body>

      <!---Menu Navegacion nav--->
<ul class="nav bg-success">
  
  <li class="nav-item">
    <a class="nav-link text-white" href="../index.php">Inicio</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="faprendiz.php">Inscripcion</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-white" href="fconsulta.php">Consulta</a>
  </li>   
</ul>

<br>
<center>
    <br>
    <div id="container">
        <h2>Consulta De Aprendiz</h2>
        <form action="" method="post">
            <table>
                <tr>
                <td><label>Señor Usuario Dijite Su Numero De Documento Para Consulta</label><br>
                <input type="text" name="consulta_documento" class="form-control"
                style="width: 100%;"></td>
                </tr><br>
                <tr>
                <td colspan="2"><br><center><input type="submit" name="btn_consulta" value="Consultar" class="btn btn-success"></center></td>
                </tr>
                <tr>
                <td colspan="2"></td>    
            </table>

		<table id="tablaUsuarios" class="table-striped table-bordered" style="width: 78%">
			<thead class="text-center">
			<th>No Documento</th>
			<th>Nombre Aprendiz</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Edad</th>
			<th>Id Programa</th>
			</thead>
			</center>
<?php 
include_once "../modelo/conexioncrud.php";
if(isset($_POST['btn_consulta']))
{
    $Documento = $_POST['consulta_documento'];
    $existe =0;

    if($Documento=="")
    {
      echo"<script> alert('Campo Obligatorio')
      location.href = '../vista/fconsulta.php';</script>";
    }
    else{
        $resultado = mysqli_query($conectar, "SELECT * FROM aprendiz WHERE documento = '$Documento'");

        while($consulta = mysqli_fetch_array($resultado))
        {
            echo"
            <center><table width=\"78%\border\"1\">
            <tr>
            <td><center><b>No Documento</b></center></td>
            <td><center><b>Nombre Aprendiz</b></center></td>
            <td><center><b>Apellidos</b></center></td>
            <td><center><b>Edad</b></center></td>
            <td><center><b>Id Programa</b></center></td>
            </tr>
            <tr>
            <td><center>".$consulta['Documento']."</center></td>
            <td><center>".$consulta['Nombre']."</center></td>
            <td><center>".$consulta['Apellidos']."</center></td>
            <td><center>".$consulta['Edad']."</center></td>
            <td><center>".$consulta['Id_programa']."</center></td>
            </tr>
            </table>
            </center>";

            $existe++;
        }
        if($existe==0){
            echo "<script> alert('Numero De Documento') 
            location.href = '../vista/fconsulta.php';</script>";
        }
      }
}

?>

        </form>
    </div>







</body>
</html>