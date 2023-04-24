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
    <link rel="stylesheet" href="./css/main.css">
    <title>Explore Sneakers</title>
</head>
<body>
<?php
  $path = './';
  require $path . 'scripts/inc/navNSearch.php';
  ?>
    <div class="exploreMain">
        <h1 class="title">Explore</h1>
        <p class="subtitle">Find What Suits You Best</p>
        <div class="exploreChild">
        <?php
            if (count($_SESSION["sneakers"]) == 0) {
                echo "<h3>There are currently no sneakers!</h3>";

            } else {
                for ($i = 0; $i < count($_SESSION["sneakers"]); $i++) {
                    echo '
                    <figure class="exploreCard"><img src="' . $_SESSION["sneakers"][$i]["image"] . '" alt="' . $_SESSION["sneakers"][$i]["model"] . '"/>
                        <div class="add-to-cart">
                        <form method="GET" action="sneaker.php">
                            <input type="hidden" name="id" value="' . $_SESSION["sneakers"][$i]["sneaker_id"] . '">
                            <input type="hidden" name="model" value="' . $_SESSION["sneakers"][$i]["model"] . '">
                            <input type="hidden" name="image" value="' . $_SESSION["sneakers"][$i]["image"] . '">
                            <input type="hidden" name="price" value="' . $_SESSION["sneakers"][$i]["price"] . '">
                            <input type="hidden" name="incoming" value="explore.php">
                            <input class="exploreSubmit" type="submit" name="submit" value="Click To See Details"></input>
                        </form>
                        </div>
                        <figcaption>
                        <h3>' . $_SESSION["sneakers"][$i]["model"] . '</h3>
                        <div class="price">
                        $' . $_SESSION["sneakers"][$i]["price"] . '
                        </div>
                        </figcaption>
                    </figure>';
                }
            }
            ?>
        </div>
    </div>
    <script src="scripts/js/script.js"></script>
</body>

</html>