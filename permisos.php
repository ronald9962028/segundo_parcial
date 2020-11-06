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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">+ Asignar Roles</button>
              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Asignacion de Roles</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="permisos/insertar_permisos.php">
                        <div class="row">
                          <div class="col-6">
                            <label for="">SELECCIONE UN USUARIO</label>
                            <select name="usuario" id="" class="form-control">
                              <option value="">-- SELECCIONE --</option>
                              <?php
                              $sql = "select * from usuarios";
                              $result = mysqli_query($conn, $sql);
                              while ($mostrar = mysqli_fetch_array($result)) {
                              ?>
                                <option value="<?php echo $mostrar['id'] ?>"><?php echo $mostrar['usuario'] ?></option>
                              <?php } ?>
                            </select>
                          </div>


                          <div class="col-6">
                            <label for="">SELECCIONE UN ROL</label>

                            <select name="rol" id="" class="form-control">
                              <option value="">-- SELECCIONE --</option>
                              <?php
                              $sql1 = "select * from roles";
                              $result1 = mysqli_query($conn, $sql1);
                              while ($mostrar1 = mysqli_fetch_array($result1)) {
                              ?>
                                <option value="<?php echo $mostrar1['id'] ?>"><?php echo $mostrar1['descripcion'] ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>


                        <input class="btn btn-primary btn-block" type="submit" value="ASIGNAR">
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
                      <h5 class="modal-title" id="exampleModalLabel">ACTUALIZAR DE ROLES</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="roles/actualizar_rol.php">
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="id" id="id" aria-describedby="emailHelp" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group">
                          <label for="rol">REGISTRAR UN ROL</label>
                          <input type="text" class="form-control" name="roles" id="roles" aria-describedby="emailHelp" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                        <input class="btn btn-primary" type="submit" value="GUARDAR">
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header card-header-danger">
                  <h4 class="card-title">REGISTRO DE ROLES</h4>
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-danger">
                      <th>ID</th>
                      <th>USUARIO</th>
                      <th>ROL</th>
                      <th>EDITAR</th>
                      <th>ELIMINAR</th>
                    </thead>
                    <tbody>

                      <?php
                      $sql2 = "select p.id as id, u.usuario as usuario, r.descripcion as descripcion from usuarios u inner join permisos p on (u.id=p.id_usuario) inner join roles r on (p.id_rol=r.id) order by id desc";
                      $result2 = mysqli_query($conn, $sql2);
                      while ($mostrar2 = mysqli_fetch_array($result2)) {
                      ?>
                        <tr>
                          <td><?= $mostrar2['id'] ?></td>
                          <td><?= $mostrar2['usuario'] ?></td>
                          <td><?= $mostrar2['descripcion'] ?></td>
                          <td><button type="button" class="btn btn-success"> <i class="fa fa-edit"></i> Editar</button></td>
                          <!-- <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1" onclick="modal_rol('<?php echo $datosrol ?>')"> <i class="fa fa-edit"></i> Editar</button></td> -->
                          <?php
                          echo "<td><a class='btn btn-danger' href='permisos/eliminar_permisos.php?id=" . $mostrar2["id"] . "'>eliminar</a></td>";
                          ?>
                        </tr>
                      <?php } ?>

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
  <script src="roles/insertar.js"></script>
</body>

</html>