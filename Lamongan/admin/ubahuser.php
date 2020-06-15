<?php
session_start();

if( !isset($_SESSION["login"]) ) {
  header("Location: ../login.php");
  exit;
}

require '../functions.php';

$id = $_GET["id"];
$user = query("SELECT * FROM users WHERE id_user = $id")[0];

if( isset($_POST["ubah"]) ) {

    if( ubahuser($_POST) > 0 ) {
      echo "
        <script>
            alert('user berhasil diubah!');
            document.location.href = 'datauser.php';
        </script>
      "; 
    } else {
      echo "
        <script>
            alert('user gagal diubah!');
            document.location.href = 'ubahuser.php';
        </script>
      "; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Dasbor Admin - Ubah User
  </title>
  <!-- Favicon -->
  <link href="assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="assets/css/argon-dashboard.css?v=1.1.0" rel="stylesheet" />
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="index.php">
      <div><h2 class="text-primary">DASBOR ADMIN</h2></div>
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="./assets/img/theme/user.png">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./profile.php" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="../logout.php" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="index.php">
                <div>CREATIVO ADVERTISING</div>
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class=" nav-link" href=" ./index.php">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="./profile.php">
              <i class="ni ni-single-02 text-yellow"></i> Admin profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./datauser.php">
              <i class="ni ni-circle-08 text-blue"></i> Data User
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " href="../logout.php">
              <i class="ni ni-user-run"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="ubahuser.php">Ubah User</a>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="assets/img/theme/user.png">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?php echo  $_SESSION["username"]; ?></span>
                </div>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
              <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
              </div>
              <a href="./profile.php" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>My profile</span>
              </a>
              <div class="dropdown-divider"></div>
              <a href="../logout.php" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Logout</span>
              </a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total User</h5>
                      <span class="h2 font-weight-bold mb-0">
                      <?php
                            $jml_user = mysqli_query($conn, "SELECT * FROM  users");
                            $count=mysqli_num_rows($jml_user);
                            echo $count;
                        ?>
                      </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
          <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Ubah User</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form method="post">
                <input type="hidden" name="id" value="<?= $user["id_user"]; ?>">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="username" name="username">Username</label>
                        <input type="text" id="username" class="form-control form-control-alternative" name="username" placeholder="Username" required value="<?= $user["username"]; ?>">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="email" name="email">Email</label>
                        <input type="text" id="email" class="form-control form-control-alternative" name="email" placeholder="E-Mail" required value="<?= $user["email"]; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="jeniskelamin" name="jeniskelamin">Jenis Kelamin</label>
                        <select name="jeniskelamin" class="form-control">
                          <option>--- Pilih Kategori ---</option>
                          <?php $sql = mysqli_query($conn, "SELECT * FROM jeniskelamin ORDER BY id_jk ASC"); ?>
                          <?php if(mysqli_num_rows($sql) != 0) : ?>
                            <?php while($row = mysqli_fetch_assoc($sql)) : ?>
                                <?php if($row["id_jk"] == $user["jenisKelamin"]) : ?>
                                    <option value="<?= $row["id_jk"]; ?>" selected><?= $row["id_jk"]; ?>. <?= $row["ket_jk"]; ?></option>
                                  <?php else : ?>
                                    <option value="<?= $row["id_jk"]; ?>"><?= $row["id_jk"]; ?>. <?= $row["ket_jk"]; ?></option>
                                <?php endif; ?>
                            <?php endwhile; ?>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="notelp" name="notelp">No Telp</label>
                        <input type="text" id="notelp" class="form-control form-control-alternative" name="notelp" placeholder="081xx" required value="<?= $user["noTelp"]; ?>">
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                      <label class="form-control-label" for="jeniskelamin" name="jeniskelamin">Tipe User</label>
                        <select name="usertype" class="form-control">
                          <option>--- Pilih Kategori ---</option>
                          <?php $sql = mysqli_query($conn, "SELECT * FROM usertype ORDER BY id_usertype ASC"); ?>
                          <?php if(mysqli_num_rows($sql) != 0) : ?>
                            <?php while($row = mysqli_fetch_assoc($sql)) : ?>
                                <?php if($row["id_usertype"] == $user["usertype"]) : ?>
                                    <option value="<?= $row["id_usertype"]; ?>" selected><?= $row["id_usertype"]; ?>. <?= $row["ket_usertype"]; ?></option>
                                  <?php else : ?>
                                    <option value="<?= $row["id_usertype"]; ?>"><?= $row["id_usertype"]; ?>. <?= $row["ket_usertype"]; ?></option>
                                <?php endif; ?>
                            <?php endwhile; ?>
                          <?php endif; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer py-4">
                  <div class="col-12 text-right">
                    <button class="btn btn-bg btn-primary" type="submit" name="ubah">Ubah User</button>
                    <a href="datauser.php" class="btn btn-bg btn-primary">Kembali</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2020 <a href="../index.php" class="font-weight-bold ml-1" target="_blank">DISPARBUD LAMONGAN</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core   -->
  <script src="assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="assets/js/argon-dashboard.min.js?v=1.1.0"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>