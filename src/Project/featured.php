<?php

require_once '../../bootstrap.php';
global $sneakerService;

$sneakers = $sneakerService->getAllSneakers();

if (!empty($sneakers)) {
    $_SESSION["sneakers"] = $sneakers;
    shuffle($_SESSION["sneakers"]);
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/icon.png">
    <link rel="stylesheet" href="css/main.css">
    <title>Featured Sneakers</title>
</head>
<body>
<?php
  $path = './';
  require $path . 'scripts/inc/navNSearch.php';
  ?>
    <div class="featuredMain">
        <h1 class="title">Featured</h1>
        <p class="subtitle">Hot Shoes Right Now</p>
        <div class="featuredChild">
        <?php
            if (count($_SESSION["sneakers"]) == 0) {
                echo "<h3>There are currently no sneakers!</h3>";

            } else {
                $randomSneakers = array_slice($_SESSION["sneakers"], 0, 3);
                for ($i = 0; $i < count($randomSneakers); $i++) {
                    echo '
                    <section class="card">
                    <div class="product-image">
                      <img src="' . $randomSneakers[$i]["image"] . '" alt="' . $randomSneakers[$i]["model"] . '" draggable="false" />
                    </div>
                    <div class="product-info">
                      <h2>' . $randomSneakers[$i]["model"] . '</h2>
                      <br>
                      <br>
                      <div class="price">$' . $randomSneakers[$i]["price"] . '</div>
                    </div>
                    <div class="cardBtn">
                      <form method="GET" action="sneaker.php">
                        <input type="hidden" name="id" value="' . $randomSneakers[$i]["sneaker_id"] . '">
                        <input type="hidden" name="model" value="' . $randomSneakers[$i]["model"] . '">
                        <input type="hidden" name="image" value="' . $randomSneakers[$i]["image"] . '">
                        <input type="hidden" name="price" value="' . $randomSneakers[$i]["price"] . '">
                        <input type="hidden" name="incoming" value="featured.php">
                        <button class="buy-btn" type="submit" name="details">Details</button>
                      </form>
                      <button class="fav">
                        <svg class="svg" id="i-star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                          <path d="M16 2 L20 12 30 12 22 19 25 30 16 23 7 30 10 19 2 12 12 12 Z" />
                        </svg>
                      </button>
                    </div>
                  </section>';
                }
            }
            ?>
        </div>
    </div>
    <script src="scripts/js/script.js"></script>
</body>

</html>