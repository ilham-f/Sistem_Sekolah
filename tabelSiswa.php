<?php

require_once 'siswa.php';
$data = new siswa;

// Update barang
if(isset($_POST['update'])){
  // id_barang, id_jenis, nama_barang, stok_barang, berat_barang, harga_jual, gambar_barang
  $id_barang = $_POST['id_barang'];
  $id_jenis = $_POST['id_jenis'];
  $nama_barang = $_POST['nama_barang'];
  $stok_barang = $_POST['stok_barang'];
  $berat_barang = $_POST['berat_barang'];
  $harga_jual = $_POST['harga_jual'];
  $gambar_barang = $_FILES['gambar_barang'];

  if ($gambar_barang['error'] == 4) {
      $data->updateBarang($id_barang, $id_jenis, $nama_barang, $stok_barang, $berat_barang, $harga_jual);
  } else {
      $gambar = $data->upload($gambar_barang);
      $data->update($id_barang, $id_jenis, $nama_barang, $stok_barang, $berat_barang, $harga_jual, $gambar);
  }
  
  
  header("Location: tabel-barang.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TK Indah Cantik</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">TK Indah Cantik</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#Siswa-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-table"></i><span>Siswa</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="Siswa-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tabelSiswa.php">
              <i class="bi bi-circle"></i><span>Data Siswa</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Nilai Harian Siswa</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Nilai Bulanan Siswa</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Raport Siswa</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Siswa Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#pembayaran-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-table"></i><span>Pembayaran</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pembayaran-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tabelPembayaran.php">
              <i class="bi bi-circle"></i><span>Pembayaran SPP Siswa</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-circle"></i><span>Jenis Pembayaran</span>
            </a>
          </li>
        </ul>
      </li><!-- End Pembayaran Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

        <table class="table table-hover">
            <thead class="thead-dark">
                <!-- noinduk_siswa, NIK_walmur, nama_siswa, jenis_kelamin, tgllahir, tgl_masuk, tgl_lulus, alamat, anakke -->
                <tr>
                    <th scope="col">No Induk</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Tgl Lahir</th>
                    <th scope="col">Alamat</th>
                    <th scope="col" class="text-center">AKSI</th>
                </tr>          

            </thead>

            <tbody>
                            
                <?php //var_dump($data->show()) ?>
                <?php foreach ($data->show() as $value)
                    if ($value['jenis_kelamin'] == 0) {
                        echo
                        '<tr>
                            <th scope="row">'.$value['noinduk_siswa'].'</th>
                            <td>'.$value['nama_siswa'].'</td>
                            <td>Laki-laki</td>
                            <td>'.$value['tgllahir'].'</td>
                            <td>'.$value['alamat'].'</td>
                            <td class="d-flex justify-content-center">
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#info'.$value['noinduk_siswa'].'">
                                  <i class="bi bi-info-square"></i>                                
                                </button>
                                <button type="button" class="btn btn-warning ms-2 me-2" data-bs-toggle="modal" data-bs-target="#update'.$value['noinduk_siswa'].'">
                                  <i class="bi bi-pencil-square"></i>
                                </button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete'.$value['noinduk_siswa'].'">
                                  <i class="bi bi-trash"></i>                              
                                </button>
                            </td>
                        </tr>';
                    } else if($value['jenis_kelamin'] == 1){
                        echo 
                        '<tr>
                            <th scope="row">'.$value['noinduk_siswa'].'</th>
                            <td>'.$value['nama_siswa'].'</td>
                            <td>Perempuan</td>
                            <td>'.$value['tgllahir'].'</td>
                            <td>'.$value['alamat'].'</td>
                            <td class="d-flex justify-content-center">
                              <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#info'.$value['noinduk_siswa'].'">
                                <i class="bi bi-info-square"></i>                                
                              </button>
                              <button type="button" class="btn btn-warning ms-2 me-2" data-bs-toggle="modal" data-bs-target="#update'.$value['noinduk_siswa'].'">
                                <i class="bi bi-pencil-square"></i>
                              </button>
                              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete'.$value['noinduk_siswa'].'">
                                <i class="bi bi-trash"></i>                              
                              </button>
                            </td>
                        </tr>';
                    }
                ?>

            </tbody>
        </table>           
    </section>

  </main><!-- End #main -->

  <!-- Modal Info -->
  <?php foreach ($data->show() as $value){
        echo '
            <div class="modal fade bd-example-modal-lg" id="info'.$value['noinduk_siswa'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Detail</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-4">
                              <div class="col-6 mb-3 mt-3">
                                  <label for="NIK_walmur" class="form-label">NIK Wali</label>
                                  <input type="text" name="NIK_walmur" value="'.$value['NIK_walmur'].'" class="form-control" readonly>
                              </div>                            
                              <div class="col-6 mb-3 mt-3">
                                  <label for="anakke" class="form-label">Anak Ke-</label>
                                  <input type="number" name="anakke" value="'.$value['anakke'].'" class="form-control" readonly>
                              </div>
                            </div>
                            <div class="row g-4">
                              <div class="col-6 mb-3 mt-3">
                                  <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                                  <input type="text" name="tgl_masuk" value="'.$value['tgl_masuk'].'" class="form-control" readonly>
                              </div>
                              <div class="col-6 mb-3 mt-3">
                                  <label for="tgl_lulus" class="form-label">Tanggal Lulus</label>
                                  <input type="text" name="tgl_lulus" value="'.$value['tgl_lulus'].'" class="form-control" readonly>
                              </div>
                            </div>
                                
                        </div>
                    </div>
                </div>
            </div>';
    }?>

    <!-- Modal Update -->
    <?php foreach ($data->show() as $value){
          echo '
              <div class="modal fade bd-example-modal-lg" id="update'.$value['noinduk_siswa'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Detail</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="post">
                              <div class="row g-4">
                                <div class="col-6 mb-3 mt-3">
                                    <label for="NIK_walmur" class="form-label">NIK Wali</label>
                                    <input type="text" name="NIK_walmur" value="'.$value['NIK_walmur'].'" class="form-control" readonly>
                                </div>                            
                                <div class="col-6 mb-3 mt-3">
                                    <label for="anakke" class="form-label">Anak Ke-</label>
                                    <input type="number" name="anakke" value="'.$value['anakke'].'" class="form-control" readonly>
                                </div>
                              </div>
                              <div class="row g-4">
                                <div class="col-6 mb-3 mt-3">
                                    <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                                    <input type="text" name="tgl_masuk" value="'.$value['tgl_masuk'].'" class="form-control" readonly>
                                </div>
                                <div class="col-6 mb-3 mt-3">
                                    <label for="tgl_lulus" class="form-label">Tanggal Lulus</label>
                                    <input type="text" name="tgl_lulus" value="'.$value['tgl_lulus'].'" class="form-control" readonly>
                                </div>

                                <div class="submit mt-4">
                                    <button type="submit" name="update" class="btn btn-primary">
                                        Simpan
                                    </button>
                                </div>
                              </div>
                            </form>
                          </div>
                      </div>
                  </div>
              </div>';
      }?>

    

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>