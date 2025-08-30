<?php
require "conn.php";

$time = explode('-', @$_GET['time_slot'] ?? '23-00');
$start = $time[0];
$end = $time[1];

$size = @$_GET['sideA_size'] ?? 0;
$start_time = (new DateTime("$start:00"))->format("H:i:s");
$end_time = (new DateTime("$end:00"))->format("H:i:s");

// Booking date (from user or today)
$booking_date = $_GET['booking_date'] ?? date("Y-m-d");

// Fetch only available futsals
$sql = "SELECT * FROM futsals f
        WHERE f.open_at <= CAST('$start_time' AS TIME)
          AND f.close_at >= CAST('$end_time' AS TIME)
          AND f.num_players >= $size
          AND f.id NOT IN (
              SELECT b.futsal_id FROM bookings b
              WHERE b.date = '$booking_date'
                AND (
                      (b.start_time <= '$start_time' AND b.end_time > '$start_time') OR
                      (b.start_time < '$end_time' AND b.end_time >= '$end_time') OR
                      ('$start_time' <= b.start_time AND '$end_time' >= b.end_time)
                    )
          )";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Futsals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <style>
        .card {
            max-width: 250px;
            margin: auto;
            text-align: left;
        }

        .card-img-top {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 6px;
        }
    </style>
</head>

<body>
    <?php require "nav.php"; ?>
    <div class="container">
        <div class="row">

            <?php if ($result === false): ?>
                <p class="text-danger">❌ SQL Error: <?php echo $conn->error; ?></p>

            <?php elseif ($result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="col-lg-4 col-md-6 my-3">
                        <div class="card border-0 shadow">
                            <img src="data:image/jpeg;base64,<?php echo base64_encode($row['image']) ?>" class="card-img-top" alt="Futsal Ground">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name'] ?></h5>
                                <p class="card-text">Price Rs <?php echo $row['price'] ?></p>
                                <div class="d-flex justify-content-between">
                                    <a href="<?php echo $row['map_url'] ?>" target="_blank" class="btn btn-primary btn-sm">
                                        <i class="bi bi-geo-alt-fill"></i> View on Map
                                    </a>
                                    <form method="POST" action="book.php">
                                        <input type="hidden" name="futsal_id" value="<?php echo $row['id']; ?>">
                                        <input type="hidden" name="date" value="<?php echo $booking_date; ?>">
                                        <input type="hidden" name="start_time" value="<?php echo $start_time; ?>">
                                        <input type="hidden" name="end_time" value="<?php echo $end_time; ?>">
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="bi bi-calendar-check-fill"></i> Book Now
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-danger">❌ No futsals available for this time slot.</p>
            <?php endif; ?>

        </div>
    </div>
    <?php require "footer.php"; ?>
</body>

</html>