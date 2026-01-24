<?php
date_default_timezone_set("Asia/Manila");

/* INTERNATIONAL FLIGHTS DATA */
$flightsInternational = [
    [
        "img" => "img/tokyo.jpg",
        "from" => "MNL",
        "to" => "TKO",
        "fromCity" => "Manila, Philippines",
        "toCity" => "Tokyo, Japan",
        "flightNo" => "PR 2831",
        "airline" => "Philippine Airlines (PAL)",
        "originTZ" => "Asia/Manila",
        "destTZ" => "Asia/Tokyo",
        "departure" => "2026-01-22 10:00:00",
        "duration" => 240
    ],
    [
        "img" => "img/hanoi.jpg",
        "from" => "MNL",
        "to" => "HAN",
        "fromCity" => "Manila, Philippines",
        "toCity" => "Hanoi, Vietnam",
        "flightNo" => "PR 1927",
        "airline" => "Cathay Pacific (CATHAY)",
        "originTZ" => "Asia/Manila",
        "destTZ" => "Asia/Bangkok",
        "departure" => "2026-01-22 11:30:00",
        "duration" => 210
    ],
    [
        "img" => "img/amsterdam.jpg",
        "from" => "MNL",
        "to" => "AMS",
        "fromCity" => "Manila, Philippines",
        "toCity" => "Amsterdam, Netherlands",
        "flightNo" => "PR 2106",
        "airline" => "Etihad Airways (ETH)",
        "originTZ" => "Asia/Manila",
        "destTZ" => "Europe/Amsterdam",
        "departure" => "2026-01-22 08:00:00",
        "duration" => 1020
    ],
    [ 
        "img" => "img/geneva.jpeg",
        "from" => "MNL",
        "to" => "GVA",
        "fromCity" => "Manila, Philippines",
        "toCity" => "Geneva, Switzerland",
        "flightNo" => "PR 1962",
        "airline" => "Emirates (EK)",
        "originTZ" => "Asia/Manila",
        "destTZ" => "Europe/Zurich",
        "departure" => "2026-01-22 08:00:00",
        "duration" => 1300
    ],
    [
        "img" => "img/milan.jpg",
        "from" => "MNL",
        "to" => "MXP",
        "fromCity" => "Manila, Philippines",
        "toCity" => "Milan, Italy",
        "flightNo" => "PR 1968",
        "airline" => "Qantas Airlines (QF)",
        "originTZ" => "Asia/Manila",
        "destTZ" => "Europe/Rome",
        "departure" => "2026-01-22 08:00:00",
        "duration" => 1030
    ]
];

/* DOMESTIC FLIGHTS DATA */
$flightsDomestic = [
    [
        "img" => "img/siargao.jpg",
        "from" => "MNL",
        "to" => "IAO",
        "fromCity" => "Manila, Philippines",
        "toCity" => "Siargao, Philippines",
        "flightNo" => "DF 2387",
        "airline" => "Cebu Pacific (CEB)",
        "originTZ" => "Asia/Manila",
        "destTZ" => "Asia/Manila",
        "departure" => "2026-01-22 08:00:00",
        "duration" => 120
    ],
    [
        "img" => "img/cebu.jpg",
        "from" => "MNL",
        "to" => "CEB",
        "fromCity" => "Manila, Philippines",
        "toCity" => "Cebu, Philippines",
        "flightNo" => "DF 2388",
        "airline" => "Cebu Pacific (CEB)",
        "originTZ" => "Asia/Manila",
        "destTZ" => "Asia/Manila",
        "departure" => "2026-01-22 09:00:00",
        "duration" => 80
    ],
    [
        "img" => "img/palawan.jpg",
        "from" => "MNL",
        "to" => "PLW",
        "fromCity" => "Manila, Philippines",
        "toCity" => "Palawan, Philippines",
        "flightNo" => "DF 2389",
        "airline" => "Jetstar(JST)",
        "originTZ" => "Asia/Manila",
        "destTZ" => "Asia/Manila",
        "departure" => "2026-01-22 10:00:00",
        "duration" => 90
    ],
    [
        "img" => "img/bohol.jpg",
        "from" => "MNL",
        "to" => "BOH",
        "fromCity" => "Manila, Philippines",
        "toCity" => "Bohol, Philippines",
        "flightNo" => "DF 2390",
        "airline" => "Philippine Airlines (PAL)",
        "originTZ" => "Asia/Manila",
        "destTZ" => "Asia/Manila",
        "departure" => "2026-01-22 10:00:00",
        "duration" => 80
    ],
    [
        "img" => "img/boracay.jpg",
        "from" => "MNL",
        "to" => "BOR",
        "fromCity" => "Manila, Philippines",
        "toCity" => "Boracay, Philippines",
        "flightNo" => "DF 2391",
        "airline" => "Philippine Airlines (PAL)",
        "originTZ" => "Asia/Manila",
        "destTZ" => "Asia/Manila",
        "departure" => "2026-01-22 10:00:00",
        "duration" => 85
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Schedule</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'header.php'; ?> <!-- Flight Schedule System + date/time -->

<header class="header-section">
    <h1>International Departures</h1>
</header>

<main>
    <div class="card-grid">
        <?php foreach ($flightsInternational as $flight): 
            $dep = new DateTime($flight["departure"], new DateTimeZone($flight["originTZ"]));
            $arr = clone $dep;
            $arr->add(new DateInterval("PT{$flight['duration']}M"));
            $arr->setTimezone(new DateTimeZone($flight["destTZ"]));
            $diff = $dep->diff($arr);
        ?>
        <div class="flight-card">
            <img src="<?= $flight['img'] ?>" alt="<?= $flight['toCity'] ?>">
            <div class="card-section">
                <h2><?= $flight['from'] ?> → <?= $flight['to'] ?></h2>
                <p>
                    From <?= $flight['fromCity'] ?> to <?= $flight['toCity'] ?><br>
                    <strong>Flight No. <?= $flight['flightNo'] ?></strong><br>
                    <?= $flight['airline'] ?><br><br>

                    <strong>Departure:</strong> <?= $dep->format('M d, Y h:i A') ?> (<?= $flight['originTZ'] ?>)<br>
                    <strong>Arrival:</strong> <?= $arr->format('M d, Y h:i A') ?> (<?= $flight['destTZ'] ?>)<br>
                    <strong>Duration:</strong> <?= ($diff->d*24 + $diff->h) ?>h <?= $diff->i ?>m
                </p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <header class="header-section">
        <h1>Domestic Departures</h1>
    </header>

    <div class="card-grid">
        <?php foreach ($flightsDomestic as $flight): 
            $dep = new DateTime($flight["departure"], new DateTimeZone($flight["originTZ"]));
            $arr = clone $dep;
            $arr->add(new DateInterval("PT{$flight['duration']}M"));
            $arr->setTimezone(new DateTimeZone($flight["destTZ"]));
            $diff = $dep->diff($arr);
        ?>
        <div class="flight-card">
            <img src="<?= $flight['img'] ?>" alt="<?= $flight['toCity'] ?>">
            <div class="card-section">
                <h2><?= $flight['from'] ?> → <?= $flight['to'] ?></h2>
                <p>
                    From <?= $flight['fromCity'] ?> to <?= $flight['toCity'] ?><br>
                    <strong>Flight No. <?= $flight['flightNo'] ?></strong><br>
                    <?= $flight['airline'] ?><br><br>

                    <strong>Departure:</strong> <?= $dep->format('M d, Y h:i A') ?> (<?= $flight['originTZ'] ?>)<br>
                    <strong>Arrival:</strong> <?= $arr->format('M d, Y h:i A') ?> (<?= $flight['destTZ'] ?>)<br>
                    <strong>Duration:</strong> <?= ($diff->d*24 + $diff->h) ?>h <?= $diff->i ?>m
                </p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>

<?php include 'footer.php'; ?>

</body>
</html>