<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $parking_requested = false;
    $vote_min = 0;

    if(isset($_GET['parking']) && $_GET['parking'] == "on") {
        $parking_requested = true;
    };

    if(isset($_GET['vote']) && $_GET['vote'] > 0 & $_GET['vote'] < 6) {
        $vote_min = $_GET['vote'];
    };
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="d-flex flex-column" style="min-height: 100vh;" >
    <header class="py-2 px-4" >
        <form action="" method="GET">
            <input type="checkbox" name="parking" id="parking" >
            <label for="parking">Parcheggio Disponibile</label>
            <select name="vote" >
                <option value="" disabled selected>Voto Minimo</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <button type="submit" >Cerca</button>
        </form>
    </header>
    <main class="flex-grow-1" >
        <div class="container-fluid p-5">
            <h1 class="text-center mb-3">Hotels</h1>
            <div class="row">
                <?php 
                
                    foreach ($hotels as $hotel) { 
                        if($parking_requested) {
                            if($hotel['parking'] != true) continue;
                        }
                        if($vote_min) {
                            if($hotel['vote'] < $vote_min) continue;
                        }
                ?>
                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                <h5 class="card-title"><?= $hotel['name']; ?></h5>
                                <p class="card-text"><?= $hotel['description']; ?></p>
                                <p class="card-text">
                                    <strong>Parcheggio:</strong> <?= $hotel['parking'] ? 'Disponibile' : 'Non disponibile'; ?>
                                </p>
                                <p class="card-text">
                                    <strong>Voto:</strong> <?= $hotel['vote']; ?>
                                </p>
                                <p class="card-text">
                                    <strong>Distanza dal centro:</strong> <?= $hotel['distance_to_center']; ?> km
                                </p>
                            </div>
                        </div>
                    </div>
                <?php 
                        };
                ?>
            </div>
        </div>
    </main>
    <footer>
        <p class="text-center text-secondary" >@by&#58; Francesco Vita</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>