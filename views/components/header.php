<?php
include '../middleware/getAuth.php';
include '../helpers/endpoint.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SRS Electrical</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">


    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>

<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <!-- <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->





    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-15 ">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>
            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
            <div class="navbar-nav align-items-center ms-auto">

                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <span class="d-none d-lg-inline-flex fs-5 fw-bold">
                            <?php
                            echo $username
                            ?>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                        <a href="#" class="dropdown-item">My Profile</a>
                        <a href="#" class="dropdown-item">Settings</a>
                        <a href="../controller/logout.php" class="dropdown-item">Log Out</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3 mt-3">
                    <h3 class="text-primary">SRS Electrical</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">

                    <div class="ms-3">
                        <h6 class="mb-0 fs-5 fw-bold"><?php echo $username ?> / <span class="fw-light fs-6" ><?php echo $userrole ?></span>
                        </h6>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link <?php if ($last_part_without_extension === 'dashboard') {
                                                                            echo 'active';
                                                                        }  ?> "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

                    <?php if ( $userrole === 'Admin' || $userrole === 'Boss') { ?>

                        <a href="category.php" class="nav-item nav-link <?php if ($last_part_without_extension === 'category') {
                                                                            echo 'active';
                                                                        }  ?>"><i class="fa fa-th me-2"></i>Category</a>
                    <?php } ?>

                    <?php if ( $userrole === 'Admin' || $userrole  === 'tester' || $userrole === 'Boss') { ?>

                        <a href="product.php" class="nav-item nav-link <?php if ($last_part_without_extension === 'product') {
                                                                            echo 'active';
                                                                        }  ?>"><i class="fa-brands fa-product-hunt me-2"></i>Product</a>
                    <?php } ?>

                    <?php if ($userrole === 'Admin' || $userrole === 'Boss') { ?>

                        <a href="user.php" class="nav-item nav-link <?php if ($last_part_without_extension === 'user') {
                                                                        echo 'active';
                                                                    }  ?>"><i class="fa-solid fa-users me-2"></i>Users</a>
                    <?php } ?>


                    <?php if ($userrole === 'tester' || $userrole === 'Boss') { ?>
                        <a href="test.php" class="nav-item nav-link <?php if ($last_part_without_extension === 'test') {
                                                                        echo 'active';
                                                                    }  ?>"><i class="fa-solid fa-clipboard-list me-2"></i>Tests</a>
                    <?php } ?>

                    <?php if ($userrole === 'tester' ||  $userrole === 'Admin' || $userrole === 'Boss') { ?>

                        <a href="assignedtest.php" class="nav-item nav-link <?php if ($last_part_without_extension === 'assignedtest') {
                                                                                echo 'active';
                                                                            }  ?>"><i class="fa-solid fa-clipboard me-2"></i>Assigned Test</a>

                    <?php } ?>
                    <?php if ($userrole  === 'tester' || $userrole === 'Admin' || $userrole === 'Boss') { ?>
                        <a href="testing.php" class="nav-item nav-link <?php if ($last_part_without_extension === 'testing') {
                                                                            echo 'active';
                                                                        }  ?>"><i class="fa fa-table me-2"></i>Testing</a>
                    <?php } ?>


                    <?php if ($userrole  === 'tester' || $userrole === 'Admin' || $userrole === 'Boss') { ?>
                        <a href="failedproducts.php" class="nav-item nav-link <?php if ($last_part_without_extension === 'failedproducts') {
                                                                                    echo 'active';
                                                                                }  ?>"><i class="fa-solid fa-circle-xmark  me-2"></i>Failed Test</a>
                    <?php } ?>

                    <?php if ($userrole  === 'tester' || $userrole === 'Admin' || $userrole === 'Boss') { ?>
                        <a href="passtest.php" class="nav-item nav-link <?php if ($last_part_without_extension === 'passtest') {
                                                                            echo 'active';
                                                                        }  ?>"><i class="fa-solid fa-circle-check me-2"></i>Passed Test</a>
                    <?php } ?>
                   



                </div>
            </nav>
        </div>
        <!-- Sidebar End -->