<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- link to stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Home page</title>

</head>

<body>
  <?php 
    include('partials/menu.php');
    ?>
    <div>
      <form  action="add_post.php" method="post">
          <div>
            <div class="form-floating">
              <textarea class="form-control" placeholder="Write A Post" id="floatingTextarea2" style="height: 100px" name="text"></textarea>
              <label for="floatingTextarea2">Write A Post</label>
            </div>
          </div>
          <input class ="submit" type="submit" value="Post">
      </form>
    </div>
    <?php
    include('classes/Db.php'); 
    // Create connection
    $db= new Db("localhost", "root", "", "trial");
    $conn = $db->connect();
    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $user_id = $row["user"];
        $text = $row["text"];
        $sql1 = "SELECT name FROM users WHERE id='$user_id'";
        $result1 = $conn->query($sql1);
        $row = $result1->fetch_assoc();
        $user_name = $row['name'];
    ?>
    <h2><?php echo $text; ?> </h2>
    <p><?php echo $user_id; ?> </p>
    <p><?php echo $user_name; ?> </p>
    <?php
      }
    } else {
      echo "0 results";
    }

    // footer
    include('partials/footer.php');
    ?>


<?php
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("webdictionary.txt"));
fclose($myfile);
?>

  <script src="js/bootstrap.js"></script>
  <script src="js/bank.js"></script>

</body>
<html>