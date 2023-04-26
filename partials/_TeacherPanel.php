<!doctype html>
        <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="./res/logo4.png">
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <!-- Custom css -->
            <link rel="stylesheet" href="./styles/indexPage.css">
            <title>Reflect Forum</title>
          </head>
        <body>
        <br><center>
        <h2>Teacher Details <br><br> </h2></center>
        <div class="row m-3">
                <?php 
                include './_dbconnect.php';
                $sql = "SELECT * FROM `teachers`";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $name = $row['fullname'];
                    $email = $row['email'];
                    $dept = $row['branch'];
                    $contact = $row['phoneno'];
                    echo '<div class="card" style="width: 20rem; m-3; background-color:#EBF2FF">
                    <div class="card-body">
                      <h5 class="card-title">'.$name.'</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary">'.$email.' <br> '.$dept.'<br></h6>
                      <p class="card-text">'.$contact.'</p>
                    </div>
                  </div>';
                }
                ?>
        </div>
        </center>
      </body>
      </html>
