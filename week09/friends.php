<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Doki</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <!-- Font From Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Edu+VIC+WA+NT+Beginner:wght@400..700&display=swap" 
    rel="stylesheet">
</head>
<body>
   <?php include 'header.inc'; ?>
    
    <section id="main">
        <h1>Doki's Gang</h1>
         <div class="image-grid">
        <?php require_once("settings.php"); 

        $conn = mysqli_connect($host,$username,$password,$database);
        if(!$conn) {
          echo "<p> Database connection failed". mysqli_connect_error(). "</p>";
        }
        else{
            $sql= "SELECT name,description,picture FROM friends";
            $result = mysqli_query($conn , $sql);

            if($result && mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                  $name = htmlspecialchars($row['name']);
                  $desc = htmlspecialchars($row['description']);
                  $imgPath = htmlspecialchars($row['picture']);

                echo "<figure>";
                echo "<img src=\"$imgPath\" alt=\"$desc\">";
                echo "<figcaption> $name - $desc </figcaption>";
                echo "</figure>";

                }
            }else{
              echo "<p> No cat friends found in the database </p>";
            }
            mysqli_close($conn);
        }
        ?>
              
        </div>
    </section>
   <?php include 'footer.inc'; ?>
    
</body>
</html>