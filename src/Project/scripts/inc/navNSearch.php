<?php
require_once '../../bootstrap.php';
global $userService;
global $sneakerService;

//$_SESSION['user_id'] = 3;
$user_id = $_SESSION['user_id'];

//$_SESSION['is_logged'] = 1;

if ($user_id) {
    $user_role = $userService->getUserRole($user_id);
    $_SESSION['role'] = $user_role['role_name'];
}

if (isset($_POST['search_sneaker'])){
    $search_sneaker = $_POST['search_sneaker'];
    $sneakers = $sneakerService->searchSneakers($search_sneaker);
    $_SESSION["sneakers"] = $sneakers;
}


?>

<nav>
    <div class="menu-btn">
        <div class="line line--1"></div>
        <div class="line line--2"></div>
        <div class="line line--3"></div>
    </div>
    <div class="nav-links">
        <a href="home.php" class="link">Home</a>
        <a href="featured.php" class="link">Featured</a>
        <a href="explore.php" class="link">Explore</a>
        <a href="about.php" class="link">About</a>
        <?php
        // This link is only shown to admin users
        if ($_SESSION['role'] === 'Admin') {
            echo '<a href="admin.php" class="link">Admin</a>';
        }

        if ($_SESSION['user_id']) {
            echo '<a href="shoppingCart.php" class="link">My Shopping Cart</a>';
            echo '<a href="profile.php" class="link">My Profile</a>';
            echo '<a href="logout.php" class="link">Logout</a>';
        } else {
            echo '<a href="login.php" class="link">Login</a>';
        }
        ?>
    </div>
</nav>
<form action="" method="POST">

<div id="searchContainer">
        <input type="text" name="search_sneaker" placeholder="Search For Sneakers">
        <div id="search"></div>
</div>
</form>
