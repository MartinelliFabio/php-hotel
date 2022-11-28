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
 
    if(isset($_GET['parking']) && !empty($_GET['parking'])) {
        $temp = [];

        foreach($hotels as $hotel) {
            $park = $hotel['parking'] ? 'si' : 'no';
            if($park == $_GET['parking']) {
                $temp[] = $hotel; 
            }
        }
        $hotels = $temp;
    }
    if(isset($_GET['vote']) && !empty($_GET['vote'])) {
        $vote = $_GET['vote'];
        $hotels = array_filter($hotels, fn($value) => $value['vote'] >= $vote);
    }   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Hotels</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5 display-1 fw-bold">Hotels</h1>
        <h5 class="text-center mt-3 mb-5">Trova il tuo hotel</h5>
        <div class="my-5">
            <form action="index.php" method="GET">
                <div class="d-flex">
                    <div class="me-5">
                        <label for="parking">Vuoi il parcheggio?</label>
                        <select name="parking" class="form-select" id="parking">
                            <option value="">Scegli</option>
                            <option value="si">Parcheggio</option>
                            <option value="no">No Parcheggio</option>
                        </select>
                    </div>
                    <div>
                        <label for="vote">Seleziona un voto da 1 a 5</label>
                        <select name="vote" class="form-select" id="vote">
                            <option value="">Scegli</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Invia</button>
            </form>
        </div>
      <div class='d-flex flex-wrap justify-content-between'>
        <h3 class="mt-4">Hotel Disponibili</h3>
        <table class='table text-capitalize'>
            <thead>
                <tr>
                    <th scope='col'>name</th>
                    <th scope='col'>description</th>
                    <th scope='col'>parking</th>
                    <th scope='col'>vote</th>
                    <th scope='col'>distance of center</th>
                </tr>
            </thead>
            <?php foreach($hotels as $hotel) { 
                $park=$hotel['parking']? 'si':'no';
            ?>
            <tr>
                <td><?php echo $hotel['name']; ?></td>
                <td><?php echo $hotel['description']; ?></td>
                <td><?php echo $park; ?></td>
                <td><?php echo $hotel['vote']; ?></td>
                <td><?php echo $hotel['distance_to_center']; ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
      </div>
    </div>
</body>
</html>