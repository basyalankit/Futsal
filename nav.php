<?php session_start(); ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .nav-logo {
            width: 60px;
            height: 60px;
            border-radius: 60%;
            object-fit: cover;
            border: 2px solid #fd0202ff;
            margin-right: 5px;
        }
    </style>
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
    <div class="container-fluid">


        <a class="navbar-brand d-flex align-items-center fw-bold fs-4 h-font" href="index.php">
            <img src="image/logo.JPG" alt="Logo" class="nav-logo me-2">
        </a>


        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="view_futsal.php">View Futsal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="facility.php">Facilities</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-2" href="Contact.php">Contact us</a>
                </li>
            </ul>

            <?php if (isset($_SESSION['user_id'])): ?>
                <form action="logout.php">
                    <button type="submit" class="btn btn-outline-dark shadow-none me-lg-3 me-2">
                        Logout
                    </button>
                </form>
            <?php else: ?>

                <div class="d-flex">
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Login
                    </button>
                    <button type="button" class="btn btn-outline-dark shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">
                        Register
                    </button>
                </div>
            <?php endif; ?>
        </div>


    </div>
</nav>