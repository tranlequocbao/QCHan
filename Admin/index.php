<?php
session_start();
$uri = explode('/', $_SERVER['REQUEST_URI']);
$home_folder = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $uri[1] . '/';

?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8" />

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../Admin/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Quản lý Tài Khoản
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="../Admin/assets/css/icon.css" />
  <link rel="stylesheet" href="../Admin/assets/css/font-awesome.css">

  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />

 
  <link href="assets/css/bootstrap-datepicker.min.css" rel="stylesheet" />
  <link href="assets/css/headerTable.css" rel="stylesheet" />

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
</head>

<body class="">

  <div class="wrapper ">
    <!-- The Modal -->
    <div class="col-md-12">
      <div class="modal" id="myModal">

        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Modal Heading</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="content">
              <div class="container-fluid">
                <div class="row">

                  <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title">Sửa Tài Khoản</h4>
                      <p class="card-category">Hoàn thiện tại khoản của bạn</p>
                    </div>
                    <div class="card-body">
                      <form>
                        <div class="row justify-content-center">
                          <!-- <div class="col-md-3"> -->
                          <div class="form-group w-50 p-3">
                            <label class="bmd-label-floating"></label>
                            <input type="text" class="form-control" id="IDuserUp">
                          </div>
                          <!-- </div> -->
                        </div>
                        <div class="row justify-content-center">
                          <!-- <div class="col-md-5 pull-center"> -->
                          <div class="form-group w-50 p-3">
                            <label class="bmd-label-floating"></label>
                            <input type="text" class="form-control" id="FullnameUp">
                          </div>
                          <!-- </div> -->
                        </div>
                        <div class="row justify-content-center">
                          <!-- <div class="col-md-5 pull-center"> -->
                          <div class="btn-group w-50 p-3">

                            <a class="btn btn-group btn" id="btn_deptUp" href="#"></a>

                            <div class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                            </div>

                            <div class="dropdown-menu" id="IDdept">
                              <a class="dropdown-item" href="#">Admin</a>
                              <a class="dropdown-item" href="#">QC</a>
                              <a class="dropdown-item" href="#">Repair</a>
                            </div>
                          </div>
                          <!-- </div> -->
                        </div>
                        <div class="row justify-content-center">
                          <!-- <div class="col-md-5 pull-center"> -->
                          <div class="btn-group w-50 p-3">

                            <a class="btn btn-group btn" id="btn_typeUp" href="#">Trạm</a>

                            <div class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                            </div>

                            <div class="dropdown-menu" id="IDtype">
                              <a class="dropdown-item" href="#">All</a>
                              <a class="dropdown-item" href="#">Trạm 1</a>
                              <a class="dropdown-item" href="#">Trạm 2</a>
                              <a class="dropdown-item" href="#">Trạm 3</a>
                              <a class="dropdown-item" href="#">Trạm 4</a>
                            </div>
                          </div>
                          <!-- </div> -->
                        </div>
                        <div class="row justify-content-center">
                          <!-- <div class="col-md-5 pull-center"> -->
                          <div class="btn-group w-50 p-3">

                            <a class="btn btn-group btn" id="btn_shopUp" href="#">Xưởng</a>

                            <div class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                            </div>

                            <div class="dropdown-menu" id="IDshop">
                              <a class="dropdown-item" href="#">All</a>
                              <a class="dropdown-item" href="#">Body</a>

                              <a class="dropdown-item" href="#">TCF</a>
                            </div>
                          </div>
                          <!-- </div> -->
                        </div>
                        <div class="row justify-content-center">
                          <!-- <div class="col-md-5 pull-center"> -->
                          <div class="btn-group w-50 p-3">

                            <a class="btn btn-group btn" id="btn_PositionUp" href="#">Vị trí</a>

                            <div class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                            </div>

                            <div class="dropdown-menu" id="Position">
                              <a class="dropdown-item" href="#">All</a>
                              <a class="dropdown-item" href="#">LH</a>

                              <a class="dropdown-item" href="#">RH</a>
                            </div>
                          </div>
                          <!-- </div> -->
                        </div>
                        <div class="row justify-content-center">
                          <!-- <div class="col-md-5 pull-center"> -->
                          <div class="btn-group w-50 p-3">

                            <a class="btn btn-group btn" id="btn_StationUp" href="#">Vị trí</a>

                            <div class="btn btn-success dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                            </div>

                            <div class="dropdown-menu" id="Station">
                              <a class="dropdown-item" href="#">Có</a>
                              <a class="dropdown-item" href="#">Không</a>

                            </div>
                          </div>
                          <!-- </div> -->
                        </div>



                        <button type="submit" class="btn btn-primary pull-right" id="Update">LƯU</button>
                        <div class="clearfix"></div>
                      </form>
                    </div>
                  </div>


                </div>
              </div>

            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../Admin/assets/img/sidebar-1.jpg">

      <div class="logo"><a href="" class="simple-text logo-normal">
          DASHBOARD
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item areaAdmin " page="ListError">
            <a class="nav-link " href="#" >
              <i class="material-icons">dashboard</i>
              <p>List Error</p>
            </a>
          </li>
          <li class="nav-item  areaAdmin active" page="user" >
            <a class="nav-link " href="#" >
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <!-- <li class="nav-item areaAdmin"">
            <a class="nav-link  href="./tables.html">
              <i class="material-icons">content_paste</i>
              <p>Error Report</p>
            </a>
          </li> -->
          <!-- <li class="nav-item ">
            <a class="nav-link" href="./typography.html">
              <i class="material-icons">library_books</i>
              <p>Typography</p>
            </a>
          </li> -->
          <li class="nav-item areaAdmin_">
            <a class="nav-link" href="#" id="export">
              <i class="material-icons">bubble_chart</i>
              <p>Export</p>
            </a>
            <!-- </li>
          <li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">location_ons</i>
              <p>Maps</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./rtl.html">
              <i class="material-icons">language</i>
              <p>RTL Support</p>
            </a>
          </li> -->
          <li class="nav-item ">
            <a class="nav-link" href="<?= $home_folder . 'login/logout.php' ?>">
              <i class="material-icons logout">Logout</i>
              <p>Log Out</p>
            </a>
          </li>

        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand tittle" href="javascript:;">User Profile</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <!-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div> -->
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= $home_folder . 'login/logout.php' ?>">Log out</a>
                </div>
              </li>
            </ul>

          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">

          <main></main>
      </div>
    </div>
  </div>
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- <script src="../assets/js/alertify.min.js"></script> -->
  <!--  Plugin for Sweet Alert -->
  <script src="assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="./assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="./assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="./assets/js/plugins/bootstrap-selectpicker.js"></script>

  <script src="./assets/js/core/bootstrap-datepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="./assets/js/plugins/jquery.dataTables.min.js"></script>

  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="./assets/js/plugins/jasny-bootstrap.min.js"></script>
 <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
 <script src="./assets/js/plugins/jquery-jvectormap.js"></script>
   <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="./assets/js/plugins/nouislider.min.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="./assets/js/plugins/arrive.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <script src="./assets/js/admin.js"></script>
  <script src="./assets/js/control.js"></script>
  <script src="../page/assets/js/error.js"></script>
    <script>
      var error = err_option;
    </script>

  <script>
    $(document).ready(function() {
      admin.loadPage('ListError'); 
      $('#export').on('click',function(){
       
       window.open("<?=$home_folder.'export'?>", '_blank');
     })
    });
  </script>

</body>

</html>