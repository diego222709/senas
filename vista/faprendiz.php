<?php
include_once '../modelo/conexionuno.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT * FROM programa";
$resultado = $conexion->prepare($consulta);
$resultado-> execute();
$usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
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
<div class="container text-center">
  <div class="row">
    <div class="col-8">
    <!--Formulario----> 
        <div class="card" style="width: 48rem;">
    <div class="card-header">
      Registros de nuevos Aprendices
    </div>
        
      <form action="" method="post">
        <center>
        <label> # Documento</label>
        <input type="number" name="documento" class="form-control" style="width: 65%"  placeholder="Numero ID"><br>
        <label>Nombres *</label>
        <input type="text" name="nombre"  class="form-control" style="width: 65%" placeholder="Nombres"><br>
        <label>Apellidos *</label>
        <input type="text" name="apellidos"  class="form-control" style="width: 65%" placeholder="Apellidos"><br>
        <label>Edad *</label>
        <input type="number" name="edad"  class="form-control" style="width: 65%" placeholder="Edad "><br>
        <label>Id programa </label>
        <select name="programa"  class="form-control" style="width: 65%">
          <option>---- seleccione---</option>
              <?php
                  foreach($usuarios as $filtro){
              ?> 
          <option><?php echo $filtro['Id_programa']?>-----<?php echo $filtro['Nombre']?>----<?php echo $filtro['Ficha']?>
          </option>
          <?php
          }  
                ?>
        </select><br>
        <input type="submit" name="btn_guardar" class="btn btn-success" value="Guardar">
          <br>
          <br>
              </center>
          <!---controlador guardar - insertar datos-->
        
        <?php
          include("../modelo/conexioncrud.php");
          if(isset($_POST['btn_guardar']))
          {
            $Documento = $_POST['documento'];
            $Nombres = $_POST['nombre'];
            $Apellidos = $_POST['apellidos'];
            $Edad = $_POST['edad'];
            $Idprograma = $_POST['programa'];

            if($Documento=="" || $Nombres=="" || $Apellidos=="" || $Edad=="" || $Idprograma=="")
            {  
              echo"<script> alert('Todos los campos son obligatorios ')
              location.href = '../vista/faprendiz.php';</script>";
            }
          else{

            $query = mysqli_query($conectar, "INSERT INTO aprendiz (Documento, Nombre, Apellidos, Edad, 
            Id_programa)values('$Documento', '$Nombres', '$Apellidos', '$Edad', '$Idprograma')");
            if($query){
                echo "<script> alert('Registro Exitoso!!!')
                location.href = '../vista/faprendiz.php';</script>";
              }
          }
      }
          ?>
      </form>
    </div>
                  </div>
    <div class="col-4">
    <img src="../img/banner.png">
    <br>
		
    </div>
  </div>
</div>
	<br>
	<!-- Footer -->
<footer class="text-center text-lg-start bg-success text-white">
  <!-- Section: Social media -->
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    <!-- Left -->
    <div class="me-5 d-none d-lg-block">
      <span>Get connected with us on social networks:</span>
    </div>
    <!-- Left -->

    <!-- Right -->
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    <!-- Right -->
  </section>
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
          <h6 class="text-uppercase fw-bold mb-4">
            <i class="fas fa-gem me-3"></i>Company name
          </h6>
          <p>
            Here you can use rows and columns to organize your footer content. Lorem ipsum
            dolor sit amet, consectetur adipisicing elit.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Products
          </h6>
          <p>
            <a href="#!" class="text-reset">Angular</a>
          </p>
          <p>
            <a href="#!" class="text-reset">React</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Vue</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Laravel</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            Useful links
          </h6>
          <p>
            <a href="#!" class="text-reset">Pricing</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Settings</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Orders</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Help</a>
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            info@example.com
          </p>
          <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->

  <!-- Copyright -->
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    � 2021 Copyright:
    <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->








</body>
</html>
