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
         <div class="container" style="margin-top:2%;">
            <div
                style="width:98%; background-color:rgba(0,0,0,.5); padding:5px 5px 5px 5px; border-radius:30px; box-shadow: 2px 2px 10px gray;">
                <h1 style=" color:white;">Transfer Money</h1>
            </div>
            <br><br>
            <div class="" style=" backdrop-filter: blur(5px);  border-radius:5px;  ">
                <form action="transfer.php" method="post">
                            <input type="number" class="formin form-control" name="accno1" id=""
                                    placeholder="Your ID no.">
                            <input type="number" class="formin form-control" name="accno2" id=""
                                    placeholder="Reciever's ID no.">
                           <input type="text" class="formin form-control" name="amount" id="" 
                                    placeholder="Amount to Transfer">
                       
                    <br><input class="btn mybtn btn-outline-light" type="submit" value="Transfer"><br><br>
                </form>
            </div>
        </div>

        <?php
        $conn = mysqli_connect("localhost","root","");//Create a connection to MySQL server
   
 
    mysqli_select_db($conn, "bank");//Select the Database created
if(!$conn){
	die("Connection not established: ".mysqli_connect_error());
}else{

if($_SERVER['REQUEST_METHOD']== 'POST'){

    
    $sender = $_POST['accno1'];
    $amount = $_POST['amount'];
    $reciever = $_POST['accno2'];
   
    
    $checkblcquery = "SELECT balance FROM clients where id='$sender'";
    $checkblc = mysqli_query($conn, $checkblcquery);
   // print_r( mysqli_fetch_array($checkblc)['balance']); 
    if(mysqli_fetch_array($checkblc)['balance'] >= $amount){
        $sql1 = "UPDATE clients SET balance= balance-$amount WHERE id='$sender'";
        $sql2 = "UPDATE clients SET balance= balance+$amount WHERE id='$reciever'";
        $result1 = mysqli_query($conn, $sql1);
        $result2 = mysqli_query($conn, $sql2);
        if($result1 && $result2){
            echo '<div class="alert alert-success align-items-center text-center" style="width:50%;" role="alert">
            <div>   
            <h2><i class="fas fa-check-circle"></i>
              Amount Transfered Successfully!</h2></div>
            </div>
          </div>';

          $sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `status`) VALUES ('$sender', '$reciever', '$amount', 'succeed')";
          $sqltransact = mysqli_query($conn, $sqltran);
        }else{
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
            <div>
            <i class="fas fa-times-circle"></i>
            Oops! Something went wrong!
            </div>
          </div>';
          $sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `status`) VALUES ('$sender', '$reciever', '$amount', 'failed')";
          $sqltransact = mysqli_query($conn, $sqltran);
    }
}else{
    echo '<div class="alert alert-danger align-items-center text-center" style="width:50%;" role="alert">
        <div>   
        <h2><i class="fas fa-times-circle"></i>
        Not Sufficient Balance in Account!</h2></div>
        </div>
      </div>
      ';
      $sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`, `status`) VALUES ('$sender', '$reciever', '$amount', 'failed')";
      $sqltransact = mysqli_query($conn, $sqltran);
}
}
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