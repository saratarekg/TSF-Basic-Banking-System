<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />


    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>TSF Bank</title>

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Dosis:400,500|Poppins:400,700&amp;display=swap" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />

    <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
tr {background-color: #c83296;}

tr:hover {background-color: coral;}
th {
  background-color: #FA6432;
  color: white;
}
</style>
</head>

<body class="sub_page">
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <nav class="navbar navbar-expand-lg custom_nav-container ">
                            <a class="navbar-brand" href="index.php">
                                <span>
                                    TSF Bank
                                </span>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <div class="d-flex  flex-column flex-lg-row align-items-center">
                                    <ul class="navbar-nav  ">
                                        <li class="nav-item active">
                                            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="about.php">About </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="service.php">Services </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="contact.php">Contact</a>
                                        </li>

                                    </ul>
                                    <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
                                    </form>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- end header section -->
    </div>

    <!-- service section -->

    <section class="service_section">
    <?php
   $conn = mysqli_connect("localhost","root","");//Create a connection to MySQL server
   /* if (!$conn) {
     die("No connection");
    }
    else{
     echo "Connected!";
    }
    */
    $createDB = "CREATE DATABASE IF NOT EXISTS bank";
    $created= mysqli_query($conn, $createDB);
   /* if ($created) {
     echo "DB created";
    }
    else{
     echo "No DB created";
    }*/
    mysqli_select_db($conn, "bank");//Select the Database created


    //mysqli_query($conn, "DROP TABLE IF EXISTS clients");
    /*
    $createTable = "CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    balance INT(20)
    )";

    if (mysqli_query($conn, $createTable)) {
     echo "table created";
    }
    else{
     echo "No tb created" . mysqli_error($conn);
    }

    $insertValues = "INSERT INTO clients(firstname,lastname,email,balance)  VALUES
     ('Sara','Genina','sara.genina@student.guc.edu.eg',3048732),
     ('Ben','Stone','benstone@gmail.com',538475),
     ('Mick','Stone','mickstone@gmail.com',100),
     ('Aya','Mahmoud','ayamahmoud@yahoo.com',8496),
     ('Leyan','Tarek','leyantarek@hotmail.com',9),
     ('Nour','Lotfy','nour@gmail.com',74833102),
     ('Rose','Potter','rosie111@gmail.com',420637),
     ('Billy','Mark','billy_mark@hotmail.com',230478),
     ('Emily','Mark','emily_mark@gmail.com',41047),
     ('Jessica','Bahaa','prettyjessie@gmail.com',873)


     ";
     if (mysqli_query($conn, $insertValues)) {
     echo "line created";
    }
    else{
     echo "not line created" . mysqli_error($conn);
    }*/

    
    global $conn;
 $Sql = "SELECT * FROM clients";
    $result = mysqli_query($conn, $Sql);  
    if (mysqli_num_rows($result) > 0) {
     echo "<div class='table-responsive'><table border= '1'  id='myTable' >
             <thead><tr><th>id</th>
                          <th>FirstName</th>
                          <th>LastName</th>
                          <th>Email</th>
                          <th>Balance</th>
                          <th>Transfer Money</th>

                        </tr></thead><tbody>";
     while($row = mysqli_fetch_assoc($result)) {
         echo "<tr><td>" . $row['id']."</td>
                   <td>" . $row['firstname']."</td>
                   <td>" . $row['lastname']."</td>
                   <td>" . $row['email']."</td>
                   <td>" . $row['balance']."</td>
                    <td >
              <a href='transfer.php'>
             Send 
              </a>
              </td>
                   </tr>";        
     }
    
     echo "</tbody></table></div>";
     
} else {
     echo "you have no records";
}


    ?>
    </section>

    <div class="footer_bg">
        <!-- info section -->
        <section class="info_section layout_padding2-bottom">
            <div class="container">

            </div>
            <div class="container info_content">


            </div>




            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-center align-items-lg-baseline">
                <div class="social-box">
                    <a href="">
                        <img src="images/fb.png" alt="" />
                    </a>

                    <a href="">
                        <img src="images/twitter.png" alt="" />
                    </a>
                    <a href="">
                        <img src="images/linkedin1.png" alt="" />
                    </a>
                    <a href="">
                        <img src="images/instagram1.png" alt="" />
                    </a>
                </div>
                <div class="form_container mt-5">
                    <form action="">
                        <label for="subscribeMail">
                            Newsletter
                        </label>
                        <input type="email" placeholder="Enter Your email" id="subscribeMail" />
                        <button type="submit">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
    </div>

    </section>



    </div>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

    
</body>
</html>