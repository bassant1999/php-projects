<!-- Navbar Section Starts Here -->
<nav class="navbar navbar-expand-lg fs-4 nav-style">
    <a class="navbar-brand" href="index.php">
        Posting
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">About us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Contact us</a>
        </li>
        <?php
            if(!isset($_SESSION["login"]) or $_SESSION["login"] == 0) {
               ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Log in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
               <?php
            }
            elseif($_SESSION["login"] == 1)
            {
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Log out</a>
                </li>
               <?php
            }
        ?>
        </ul>
    </div>
</nav>
<!-- Navbar Section ends Here -->

