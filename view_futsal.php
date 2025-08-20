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

            
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow">
                    <img src="image/bhak.jpg" class="card-img-top" alt="Futsal Ground">
                    <div class="card-body">
                        <h5 class="card-title">Bhaktapur Futsal</h5>
                        <p class="card-text">Price ₹200</p>
                        <a href="https://www.google.com/maps?q=MC96+P25, Araniko Highway, Suryabinayak 44800"
                            target="_blank" class="btn btn-primary btn-sm">
                            <i class="bi bi-geo-alt-fill"></i> View on Map
                        </a>
                       
                    </div>
                </div>
            </div>

        
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow">
                    <img src="image/ground1.jpg" class="card-img-top" alt="Futsal Ground">
                    <div class="card-body">
                        <h5 class="card-title">Buddhanagar Futsal</h5>
                        <p class="card-text">Price ₹300</p>
                        <a href="https://www.google.com/maps?Kathmandu 44600" target="_blank" class="btn btn-primary btn-sm">
                            <i class="bi bi-geo-alt-fill"></i> View on Map
                        </a>
                       
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow">
                    <img src="image/maiti.jpg" class="card-img-top" alt="Futsal Ground">
                    <div class="card-body">
                        <h5 class="card-title">Maitidevi futsal</h5>
                        <p class="card-text">Price ₹200</p>
                        <a href="https://www.google.com/maps?P83P+9PH Maitidevi futsal, Kathmandu 44600"
                            target="_blank" class="btn btn-primary btn-sm">
                            <i class="bi bi-geo-alt-fill"></i> View on Map
                        </a>
                       
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow">
                    <img src="image/ooo.jpg" class="card-img-top" alt="Futsal Ground">
                    <div class="card-body">
                        <h5 class="card-title">Hattiban Futsal Headquarter</h5>
                        <p class="card-text">Price ₹200</p>
                        <a href="https://www.google.com/maps?Loha Chowk, Near Nakhipot Microstation Park, Nakhipot Line, Lalitpur 44700"
                            target="_blank" class="btn btn-primary btn-sm">
                            <i class="bi bi-geo-alt-fill"></i> View on Map
                        </a>
                       
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow">
                    <img src="image/hamro.webp" class="card-img-top" alt="Futsal Ground">
                    <div class="card-body">
                        <h5 class="card-title">Euro Futsal</h5>
                        <p class="card-text">Price ₹200</p>
                        <a href="https://www.google.com/maps?Hariyo pool, Kathmandu 44600"
                            target="_blank" class="btn btn-primary btn-sm">
                            <i class="bi bi-geo-alt-fill"></i> View on Map
                        </a>
                       
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow">
                    <img src="image/shank.webp" class="card-img-top" alt="Futsal Ground">
                    <div class="card-body">
                        <h5 class="card-title">Shankhamul Futsal</h5>
                        <p class="card-text">Price ₹200</p>
                        <a href="https://www.google.com/maps?Kathmandu 44600"
                            target="_blank" class="btn btn-primary btn-sm">
                            <i class="bi bi-geo-alt-fill"></i> View on Map
                        </a>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php require "footer.php"; ?>



</body>

</html>