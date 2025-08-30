<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fgdfg</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    <style>
        .swiper-slide {
            width: 500px;
            /* Same width for all slides */
            height: 550px;
            /* Same height for all slides */
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            /* Hide extra cropped parts */
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Fill the space */
            object-position: center;
            /* Keep center in view */
        }

        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }
    </style>


</head>

<body>

    <?php require "nav.php"; ?>


    <h2>Welcome, <?php echo $_SESSION['name']; ?> 👋</h2>
    <p>Your email: <?php echo $_SESSION['email']; ?></p>
    
     <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="login.php">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-circle fs-3 me-2"></i> User Login
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" shadow-none>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" shadow-none>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-dark shadow-none">LOGIN</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>



    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="image/qw.jpg" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="image/er.jpg" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="image/ty.JPG" class="w-100 d-block">
                </div>
                <div class="swiper-slide">
                    <img src="image/ooo.JPG" class="w-100 d-block">
                </div>
            </div>
        </div>
    </div>



    <div class="container availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check Futsal Availability</h5>
                <form method="GET" action="view_futsal.php" target="_blank">
                    <div class="row align-items-center">

                        <!-- Date -->
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" name="booking_date" class="form-control" required>
                        </div>

                        <!-- Time Slot -->
                        <div class="col-lg-3 mb-3">
                            <label class="form-label" style="font-weight: 500;">Select Time Slot</label>
                            <select class="form-control" name="time_slot" required>
                                <option value="">-- Select Time Slot --</option>
                                <option value="6-7">6:00 AM - 7:00 AM</option>
                                <option value="7-8">7:00 AM - 8:00 AM</option>
                                <option value="8-9">8:00 AM - 9:00 AM</option>
                                <option value="9-10">9:00 AM - 10:00 AM</option>
                                <option value="10-11">10:00 AM - 11:00 AM</option>
                                <option value="11-12">11:00 AM - 12:00 PM</option>
                                <option value="12-13">12:00 PM - 1:00 PM</option>
                                <option value="13-14">1:00 PM - 2:00 PM</option>
                                <option value="14-15">2:00 PM - 3:00 PM</option>
                                <option value="15-16">3:00 PM - 4:00 PM</option>
                                <option value="16-17">4:00 PM - 5:00 PM</option>
                                <option value="17-18">5:00 PM - 6:00 PM</option>
                                <option value="18-19">6:00 PM - 7:00 PM</option>
                                <option value="19-20">7:00 PM - 8:00 PM</option>
                                <option value="20-21">8:00 PM - 9:00 PM</option>
                            </select>
                        </div>

                        <!-- Team Size -->
                        <div class="col-lg-3 mb-3">
                            <label class="form-label">Select Team Size for Side A</label>
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sideA_size" id="sideA_5" value="5" required>
                                        <label class="form-check-label" for="sideA_5">
                                            5 Players
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="sideA_size" id="sideA_7" value="7">
                                        <label class="form-check-label" for="sideA_7">
                                            7 Players
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Save Button -->
                        <div class="col-lg-1">
                            <button type="submit" class="btn btn-primary mt-4">Save</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>



    <?php require "footer.php"; ?>



    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="post" action="register.php">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-lines-fill fs-3 me-2"></i>
                            User Registeration
                        </h5>
                        <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge bg-light text-dark mb-3 text-wrap lh-base">

                        </span>
                        <div class="container-fluid">
                            <div class="row">

                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" shadow-none>
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class=" form-control" shadow-none>
                                </div>
                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="number" name="phone" class=" form-control" shadow-none>
                                </div>
                              
                                <div class="col-md-12 p-0 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control shadow-none" name="address" rows="1"></textarea>
                                </div>

                                <div class="col-md-6 ps-0 mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" shadow-none>
                                </div>
                                <div class="col-md-6 p-0 mb-3">
                                    <label class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" shadow-none>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="text-center my-1">
                            <button type="submit" class="btn btn-dark shadow-none">REGISTER</button>
                        </div> -->
                </form>

            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            }
        });
    </script>
</body>

</html>