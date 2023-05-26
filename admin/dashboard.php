<?php
session_start();
include "../database/connection.php";
if(empty($_SESSION['logged_in'])){
    header('Location: index.php');
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>

    <!-- Logo -->
    <link rel="icon" href="../image/logoatas.png" type="image/x-icon" />

    <!-- Bootrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />

    <!-- CSS -->
    <link rel="stylesheet" href="../css/admin.css" />
  </head>
  <body>
    <div class="row gx-0">
      <!-- Sidebar -->
      <div class="sidebar col-2 bg-primary sticky-top">
        <div
          class="image-box d-flex justify-content-center align-items-center p-4"
        >
          <img src="../image/logo2.png" alt="logo" />
        </div>

        <!-- menu -->
        <div class="menu-box">
          <ul class="p-3 d-flex flex-column lis">
            <li class="nav-item w-100 mb-2">
              <a
                class="menu nav-link p-2"
                aria-current="page"
                href="./"
                style="<?= (empty($_GET['page']) ? 'background-color: white; color: #0275d8' : '') ?>"
                ><i class="fa-solid fa-house me-3 ps-2"></i>Dashboard</a
              >
            </li>
            <li class="nav-item w-100 mb-2">
              <a
                class="menu nav-link p-2"
                aria-current="page"
                href="?page=addAdmin"
                style="<?= isset($_GET['page']) && $_GET['page'] == 'addAdmin' ? 'background-color: white; color: #0275d8' : '' ?>"
                ><i class="fa-solid fa-user-gear me-3 ps-2"></i>Admin</a
              >
            </li>
            <li class="nav-item dropdown w-100 mb-2">
              <a
                class="menu nav-link dropdown-toggle p-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                style="<?= isset($_GET['page']) && ($_GET['page'] == 'addProperty' || $_GET['page'] == 'showProperty') ? 'background-color: white; color: #0275d8' : '' ?>"
              >
                <i class="fa-solid fa-building-circle-check me-3 ps-2"></i
                >Property
              </a>
              <ul class="dropdown-menu w-100">
                <li>
                  <a class="dropdown-item" href="?page=addProperty"
                    >Insert Property</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="?page=showProperty"
                    >Show Property</a
                  >
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown w-100 mb-2">
              <a
                class="menu nav-link dropdown-toggle p-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                style="<?= isset($_GET['page']) && ($_GET['page'] == 'addSale' || $_GET['page'] == 'showSale') ? 'background-color: white; color: #0275d8' : '' ?>"
              >
                <i class="fa-solid fa-cart-shopping me-3 ps-2"></i>Sale
              </a>
              <ul class="dropdown-menu w-100">
                <li>
                  <a class="dropdown-item" href="?page=addSale">Insert sale</a>
                </li>
                <li>
                  <a class="dropdown-item" href="?page=showSale">Show sale</a>
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown w-100 mb-2">
              <a
                class="menu nav-link dropdown-toggle p-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                style="<?= isset($_GET['page']) && ($_GET['page'] == 'addAgent' || $_GET['page'] == 'showAgent') ? 'background-color: white; color: #0275d8' : '' ?>"
              >
                <i class="fa-solid fa-user me-3 ps-2"></i>Agent
              </a>
              <ul class="dropdown-menu w-100">
                <li>
                  <a class="dropdown-item" href="?page=addAgent">Insert agent</a>
                </li>
                <li>
                  <a class="dropdown-item" href="?page=showAgent">Show agent</a>
                </li>
              </ul>
            </li>
          </ul>
          <ul class="p-3">
            <li class="nav-item w-100 p-2">
              <a
                class="menu nav-link p-2"
                aria-current="page"
                href="dashboard.php?page=logout"
                ><i class="fa-solid fa-right-from-bracket me-3 ps-2"></i
                >Logout</a
              >
            </li>
          </ul>
        </div>
        <!-- Akhir menu -->
      </div>
      <!-- Akhir saidbar -->

      <!-- Content -->
      <div class="col-10 main p-0">
        <div class="container-content m-5">
          <?php
            if(isset($_GET['page'])){
              switch($_GET['page']){
                case 'addAdmin':
                  include 'addAdmin.php';
                  break;
                case 'addProperty':
                  include 'properti/addProperty.php';
                  break;
                case 'showProperty':
                  include 'properti/showProperty.php';
                  break;
                case 'addSale':
                  include 'penjualan/addSale.php';
                  break;
                case 'showSale':
                  include 'penjualan/showSale.php';
                  break;
                case 'addAgent':
                  include 'agen/addAgent.php';
                  break;
                case 'showAgent':
                  include 'agen/showAgent.php';
                  break;
                case 'logout':
                  session_destroy();
                  header('location: index.php');
                  break;
                default:
                  include 'main.php';
                  break;
              }
            }else{
              include 'main.php';
            }
          ?>
        </div>
      </div>
      <!-- Akhir content -->
    </div>

    <!-- Fontawsome -->
    <script
      src="https://kit.fontawesome.com/ee9e0f07f2.js"
      crossorigin="anonymous"
    ></script>

    <!-- Bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
      integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
      integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
