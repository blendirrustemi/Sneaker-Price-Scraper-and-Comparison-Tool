<?php
session_start();
require_once '../../bootstrap.php';
global $userService;
global $sneakerService;
global $shoppingCartService;

// Retrieve form data
$id = $_GET["id"];
$model = $_GET["model"];
$image = $_GET["image"];
$price = $_GET["price"];
$incoming = "./" . $_GET["incoming"];
$resultSizes = $sneakerService->getSpecificSneaker($id);

if (isset($_POST["submit"])) {
    $user_id = $_SESSION["user"]["user_id"];
    $sneaker_id = $_POST["sneaker_id"];
    $quantity = $_POST["quantity"];
    $size = $_POST["option"];

    // convert all to integer
    $user_id = (int)$user_id;
    $sneaker_id = (int)$sneaker_id;
    $quantity = (int)$quantity;
    $cart = $shoppingCartService->addShoppingCartItem($user_id, $sneaker_id, $quantity, $size);

    if (!$cart) {
        header("Location: ./shoppingCart.php");
    } else {
        echo "Error!";
    }


} else {
//    if ($_SERVER["REQUEST_METHOD"] == "GET") {
//        // Retrieve form data
//        $id = $_GET["id"];
//        $model = $_GET["model"];
//        $image = $_GET["image"];
//        $price = $_GET["price"];
//        $incoming = "./" . $_GET["incoming"];
//
//        $resultSizes = $sneakerService->getSpecificSneaker($id);
//
//    }else{
//        header("Location: ./explore.php");
//    }
}

// Check if form is submitted


$resultCheck = $userService->getUserByEmail($_SESSION['email']);

if ($resultCheck) {
    $toastMsg = '<p id="toastText" class="text-danger">Please select size to add to cart!</p>';
    $addToCartButton = '<button type="submit" name="submit" class="btn btn-success" >Add To Cart!</button>';
}else{
    $toastMsg = '<p id="toastText" class="text-danger">You need to log in to add to cart!</p>';
    $addToCartButton = '<button type="button" class="btn btn-success" id="alertToastBtn">Add To Cart!</button>';
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./media/icon.png">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title><?php echo $model; ?></title>
</head>

<body>
<?php
$path = './';
require $path . 'scripts/inc/navNSearch.php';
?>
<div class="modal fade" id="chartModal" tabindex="-1" role="dialog" aria-labelledby="chartModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="chartModalLabel">Size Chart</h3>
                <button class='closeBtn' type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class='closeIcon'>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table>
                    <thead>
                    <tr>
                        <th>US Size</th>
                        <th>EU Size</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>6</td>
                        <td>39</td>
                    </tr>
                    <tr>
                        <td>6.5</td>
                        <td>39.5</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>40</td>
                    </tr>
                    <tr>
                        <td>7.5</td>
                        <td>40.5</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>41</td>
                    </tr>
                    <tr>
                        <td>8.5</td>
                        <td>41.5</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>42</td>
                    </tr>
                    <tr>
                        <td>9.5</td>
                        <td>42.5</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>43</td>
                    </tr>
                    <tr>
                        <td>10.5</td>
                        <td>43.5</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>44</td>
                    </tr>
                    <tr>
                        <td>11.5</td>
                        <td>44.5</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>45</td>
                    </tr>
                    <tr>
                        <td>12.5</td>
                        <td>45.5</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>46</td>
                    </tr>
                    <tr>
                        <td>13.5</td>
                        <td>46.5</td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>47</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="alertToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <strong class="me-auto text-danger">Alert</strong>
            <button type="button" class="btn-close text-danger" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <?php echo $toastMsg; ?>
        </div>
    </div>
</div>
<div class="sneakerMain">
    <div class="sneakerChild">
        <div class="forSneakerImg">
            <?php
            echo '<img class="sneakerImg" src="'. $image .'">';
            ?>
        </div>
        <form method="POST" action="" onsubmit="checkSize(event)" id="addToCartForm">
            <div class="sneakerSide">
                <?php
                echo '
                        <h1><b>'. $model .'</b></h1>
                        <p>Only The Best For Someone Like You!</p>
                        <div>
                            <h4>Choose Your Size:</h4>
                            <p class="sizeWarning">All sizes are   (<button type="button" class="sizeChartToggler" data-toggle="modal" data-target="#chartModal">
                            Size Chart
                          </button>)</p>
                            <div class="sizeChooser">';
                if(count($resultSizes) == 0){
                    echo '<p>There are no sizes available at the moment!</p>';
                }else{
                    for ($i = 0; $i < count($resultSizes); $i++) {
                        $size = substr($resultSizes[$i]['name'],3);
                        $labelClass = $i % 2 == 0 ? 'redBgLabel' : '';
                        echo '
                                <input type="radio" name="option" id="option'. $i .'" value="'. $size .'" onclick="getSize()">
                                <label for="option'. $i .'" class="'. $labelClass .'">'. $size .'</label>
                                ';
                    }
                }
                echo '
                            </div>
                        </div>
                        <input type="number" name="quantity" value="1" min="1" max="10">
                        <h5 class="pt-5">Sneaker Price: $'. $price .'</h5>
                        
                        <div class="pt-4">
                            '. $addToCartButton .'
                            <a class="btn btn-danger" href="'. $incoming .'">Take Me Back!</a>
                        </div>
                        <input type="hidden" name="sneaker_id" value="'. $id .'">
                        <input type="hidden" id="size" name="size" value="">
                    ';
                ?>
            </div>
        </form>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
<script src="./scripts/js/script.js"></script>
<script src="./scripts/js/functions.js"></script>
<script>
    const toastTrigger = document.getElementById('alertToastBtn')
    const toastAlert = document.getElementById('alertToast')

    if (toastTrigger) {
        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastAlert)
        toastTrigger.addEventListener('click', () => {
            toastBootstrap.show()
        })
    }
</script>
</body>

</html>
