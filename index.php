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



    <?php include './partials/_header.php' ?>
    <?php include './partials/_dbconnect.php' ?>
    <?php
    if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success !</strong> Registration Successful, Login next time.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    } else if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false" && isset($_GET['error'])) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error !</strong> ' . $_GET['error'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
    ?>
   
<div id="carouselExampleControls" class="carousel slide my-2 mb-2 mx-3 "  data-bs-ride="carousel" >
  
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="https://source.unsplash.com/1600x400/?coding, codeing" class="d-block w-100" alt="..." style="border-radius: 5%;">
    </div>
    <div class="carousel-item">
    <img src="https://source.unsplash.com/1600x400/?discussion, helping" class="d-block w-100" alt="..." style="border-radius: 5%;">
    </div>
    <div class="carousel-item">
    <img src="https://source.unsplash.com/1600x400/?discussion, code" class="d-block w-100" alt="..." style="border-radius: 5%;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> 

    <div class="container m-5">

        <div class="row align-items-center">
            <div class="col">
                <h1 class="display-5">Welcome to the online discussion forum for <span class=" font-monospace fw-bold placeholder-glow" style="color:#1a2436 ">
                        Techies & Coders 
                    </span>
                </h1>

            </div>
            <div class="col">
                <img src="https://img.freepik.com/free-vector/group-therapy-concept_23-2148653857.jpg?w=2000" class="img-fluid" width="1400px" alt="" style="border-radius: 10%; margin-left: 80px;">
            </div>
        </div>
    </div>


        <div class="row my-2 row-cols-1 row-cols-md-4 g-4 mx-4 align-items-center justify-content-center rounded  " style="border-radius: 5px; background-color: #25334d;" >
      
          
              <!--Fetching data from the categories  -->
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            $limit = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $limit + 1;
                if ($limit > 8)
                    break;
                $catID = $row['category_id'];
                $catTitle = $row['category_title'];
                $catDesc = $row['category_description'];
                $catImg = $row['imgurl'];

                echo '
                <div class="col">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded my-4 h-100" style="width: 18rem; height:auto;">
                        <img src=' . $catImg . ' class="card-img-top img-thumbnail" style="height:250px; width:auto;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">' . $catTitle . '</h5>
                            <p class="card-text">' . substr($catDesc, 0, 45) . '...</p>  
                        </div>
                        <div class="card-footer">
                             <a href="threadslist.php?catid=' . $catID . '" class="btn btn-primary rounded-pill " style="width:100%">Click Here</a>
                        </div>
                    </div>
            </div>';
            }
            ?>
           
        </div>

    </div>
    </div>


    <?php include './partials/_footer.php' ?>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>