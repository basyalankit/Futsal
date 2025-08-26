<?php
require "conn.php";
// $date=@$_GET['booking_date'];
$time= explode('-',@$_GET['time_slot']??'23-00');

$start=$time[0];
$end = $time[1];

$size = @$_GET['sideA_size'] ??0;
            $start_time = (new DateTime("$start:00"))->format("H:i:s");
            $end_time = (new DateTime("$end:00"))->format("H:i:s");
$sql = "SELECT * FROM futsals WHERE open_at <= CAST('$start_time' AS TIME) AND close_at >= CAST('$end_time' AS TIME) AND num_players >= $size" ;
$result = $conn->query($sql);
if ($result === false) {
    // Query failed
    echo "Error: " . $conn->error;
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
        .card {
            max-width: 250px;
            /* keep all cards same width */
            margin: auto;
            text-align: left;
        }

        .card-img-top {
            width: 100%;
            height: 180px;
            /* fix height (you can change to 200px, 220px etc.) */
            object-fit: cover;
            /* crop & keep proportion */
            border-radius: 6px;
            /* optional */
        }
    </style>

</head>

<body>
    <?php require "nav.php"; ?>
    <div class="container">
        <div class="row">

            <?php while ($row = $result->fetch_assoc()): ?>

                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card border-0 shadow">
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image'])  ?>" class="card-img-top" alt="Futsal Ground">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name'] ?></h5>
                            <p class="card-text">Price Rs <?php echo $row['price'] ?></p>
                            <div class="d-flex justify-content-between">
                                <a href="<?php echo $row['map_url'] ?>"
                                    target="_blank" class="btn btn-primary btn-sm">
                                    <i class="bi bi-geo-alt-fill"></i> View on Map
                                </a>
                                <a href="view_futsal.php?ground=Bhaktapur Futsal" class="btn btn-success btn-sm">
                                    <i class="bi bi-calendar-check-fill"></i> Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; ?>

            <!-- <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow">
                    <img src="image/ground1.jpg" class="card-img-top" alt="Futsal Ground">
                    <div class="card-body">
                        <h5 class="card-title">Buddhanagar Futsal</h5>
                        <p class="card-text">Price Rs 300</p>
                        <div class="d-flex justify-content-between">
                            <a href="https://www.google.com/maps?Kathmandu 44600" target="_blank" class="btn btn-primary btn-sm">
                                <i class="bi bi-geo-alt-fill"></i> View on Map
                            </a>
                            <a href="view_futsal.php?ground=Bhaktapur Futsal" class="btn btn-success btn-sm">
                                <i class="bi bi-calendar-check-fill"></i> Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow">
                    <img src="image/maiti.jpg" class="card-img-top" alt="Futsal Ground">
                    <div class="card-body">
                        <h5 class="card-title">Maitidevi futsal</h5>
                        <p class="card-text">Price Rs 200</p>
                        <div class="d-flex justify-content-between">
                            <a href="https://www.google.com/maps?P83P+9PH Maitidevi futsal, Kathmandu 44600"
                                target="_blank" class="btn btn-primary btn-sm">
                                <i class="bi bi-geo-alt-fill"></i> View on Map
                            </a>
                            <a href="view_futsal.php?ground=Bhaktapur Futsal" class="btn btn-success btn-sm">
                                <i class="bi bi-calendar-check-fill"></i> Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow">
                    <img src="image/ooo.jpg" class="card-img-top" alt="Futsal Ground">
                    <div class="card-body">
                        <h5 class="card-title">Hattiban Futsal Headquarter</h5>
                        <p class="card-text">Price Rs 200</p>
                        <div class="d-flex justify-content-between">
                            <a href="https://www.google.com/maps?Loha Chowk, Near Nakhipot Microstation Park, Nakhipot Line, Lalitpur 44700"
                                target="_blank" class="btn btn-primary btn-sm">
                                <i class="bi bi-geo-alt-fill"></i> View on Map
                            </a>
                            <a href="view_futsal.php?ground=Bhaktapur Futsal" class="btn btn-success btn-sm">
                                <i class="bi bi-calendar-check-fill"></i> Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow">
                    <img src="image/hamro.webp" class="card-img-top" alt="Futsal Ground">
                    <div class="card-body">
                        <h5 class="card-title">Euro Futsal</h5>
                        <p class="card-text">Price Rs 200</p>
                        <div class="d-flex justify-content-between">
                            <a href="https://www.google.com/maps?Hariyo pool, Kathmandu 44600"
                                target="_blank" class="btn btn-primary btn-sm">
                                <i class="bi bi-geo-alt-fill"></i> View on Map
                            </a>
                            <a href="view_futsal.php?ground=Bhaktapur Futsal" class="btn btn-success btn-sm">
                                <i class="bi bi-calendar-check-fill"></i> Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow">
                    <img src="image/shank.webp" class="card-img-top" alt="Futsal Ground">
                    <div class="card-body">
                        <h5 class="card-title">Shankhamul Futsal</h5>
                        <p class="card-text">Price RS 200</p>
                        <div class="d-flex justify-content-between">
                            <a href="https://www.google.com/maps?Kathmandu 44600" target="_blank" class="btn btn-primary btn-sm">
                                <i class="bi bi-geo-alt-fill"></i> View on Map
                            </a>
                            <a href="view_futsal.php?ground=Bhaktapur Futsal" class="btn btn-success btn-sm">
                                <i class="bi bi-calendar-check-fill"></i> Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> -->



            <?php require "footer.php"; ?>



</body>

</html>