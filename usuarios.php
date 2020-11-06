<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] != "OK") {
    header('location: index.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<?php
include('header.php');
require_once('conexion.php');



$sql = "select * from usuarios";
$result =  $conn->query($sql);
$usuarios = array();
while ($fila =  $result->fetch_array()) {
  $usuarios[] = $fila;
}
?>


<body class="">
  <div class="wrapper ">
    <?php
    include('sidebar.php');
    ?>
    <div class="main-panel">
      <?php
      include('nav.php');
      ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">+ Añadir Usuario</button>
              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">REGISTRO DE ROLES</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="usuarios/insertar_usuario.php">
                        <div class="form-group">
                          <label for="usuario">USUARIO</label>
                          <input type="text" class="form-control" name="usuario" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="correo">CORREO</label>
                          <input type="email" class="form-control" name="correo" aria-describedby="emailHelp" >
                        </div>
                        <div class="form-group">
                          <label for="pass">CONTRASEÑA</label>
                          <input type="password" class="form-control" name="pass" aria-describedby="emailHelp" >
                        </div>                     
                        <input class="btn btn-primary" type="submit" value="GUARDAR">
                      </form>
                    </div>
                  </div>
                </div>
              </div>



              <!-- modal editar -->
              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="exampleModal1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR DE USUARIO</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="usuarios/actualizar_usuario.php">
                      
                          <input type="hidden" class="form-control" name="id" id="id" >
                       
                     
                        <div class="form-group">
                          <label for="usuario">USUARIO</label>
                          <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="correo">CORREO</label>
                          <input type="email" class="form-control" name="correo" id="correo" aria-describedby="emailHelp" >
                        </div>
                        <div class="form-group mt-5">
                          <label for="pass">CONTRASEÑA SE ENCUENTRA ENCRYPTADA</label>
                          <input type="text" class="form-control" name="pass" id="pass" aria-describedby="emailHelp" required>
                          <small id="emailHelp" class="form-text text-danger text-muted">La contraseña se encuentra encriptada vuelva a introducrir la misma contraseña de antes o actualice su contraseña</small>
                        </div>
                        <input class="btn btn-primary" type="submit" value="GUARDAR">
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header card-header-info">
                  <h4 class="card-title text-dark">REGISTRO DE USUARIOS</h4>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-info">
                      <th>ID</th>
                      <th>USUARIO</th>
                      <th>PASSWORD</th>
                      <th>CORREO</th>
                      <th>EDITAR</th>
                      <th>ELIMINAR</th>
                    </thead>
                    <tbody>
                      <?php foreach ($usuarios as $item) :
                        $datosrol = $item['id'] . "||" . $item['usuario']. "||" . $item['correo']. "||" . $item['clave'];
                      ?>

                        <tr>
                          <td><?= $item['id'] ?></td>
                          <td><?= $item['usuario'] ?></td>
                          <td><?= $item['clave'] ?></td>
                          <td><?= $item['correo'] ?></td>
                          <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1" onclick="modal_rol('<?php echo $datosrol ?>')"> <i class="fa fa-edit"></i> Editar</button></td>
                          <?php
                          echo "<td><a class='btn btn-danger' href='usuarios/eliminar_usuario.php?id=" . $item["id"] . "'>eliminar</a></td>";
                          ?>


                        </tr>
                      <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      include('footer.php');
      ?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="assets/js/plugins/arrive.min.js"></script>

  <!-- Chartist JS -->
  <script src="assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="assets/demo/demo.js"></script>
  <script src="usuarios/insertar.js"></script>
</body>

</html>