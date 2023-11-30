<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <div>
        <!-- header -->
        <header>
            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">Library</a>
                    </div>
                    <ul class="nav navbar-nav">
                    <li><a href="../index.html">Home</a></li>
                    <li><a v-if = "status == 1 && type == 0" href="../add_book.html">Add Book</a></li>
                    <li><a v-if = "status == 1 && type == 1" href="">Borrowed Books</a></li>
                    <li><a href="../Login.html" v-if = "status == 0">Login</a></li>
                    <li><a href="logout.php" v-if = "status == 1">Logout</a></li>
                    </ul>
                    <form class="navbar-form navbar-left" action="search.php">
                    <div class="form-group">
                        <input type="text" class="form-control" name = "book_title" placeholder="Search For Book">
                    </div>
                    <button type="submit" class="btn" style="margin-left: 4px;">Search</button>
                    </form>
                </div>
                </nav>
        </header>
    <div class="container">
        <h1>SEARCH </h1>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET") 
            {
                $book_title = $_GET["book_title"];

                $conn= new mysqli("localhost:3307", "root", "", "library");

                $sql = "SELECT * FROM Book WHERE title LIKE '%$book_title%'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) 
                {
                    while($row = $result->fetch_assoc()) 
                    {
                        echo "id: " . $row["id"]. " - Name: " . $row["title"]. " " . $row["img_url"] . "<br>";
                        ?>
                            <div class="row">
                                <div class="col-sm-4 rounded-lg bg-success">
                                    <div> 
                                        <img class="img-fluid" width="200" src=<?php $row["img_url"];?> style="text-align: center;">
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <h2><?php $row["title"] ?></h2>
                                    <p class="light-text"><?php $row["description"] ?></p>
                                </div>
                            </div>
                        <?php
                    }
                } 
                else 
                {
                    echo "<h2>No results </h2>";
                }
            }
        
        ?>
    </div>
</div>
  <script src="js/bootstrap.js"></script>
  <script src="js/bank.js"></script>

</body>
<html>


