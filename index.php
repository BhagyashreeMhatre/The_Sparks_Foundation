<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic Banking System TSF Bank </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/indexpage.css">
    <script src="https://kit.fontawesome.com/d30ff5ad29.js" crossorigin="anonymous"></script>

</head>

<body>
    <!--navbar connection-->
    <?php
    include 'navbar.php';
    ?>
    <!--Hero section -->
    <main>
        <div class="content">
            <div class="sub-content">
                <h1 style="font-size:4rem; color: rgb(53, 103, 240);">Welcome to our TSF Bank</h1>
                <p>Now Banking is at Your fingertips</p>
                <a href="aboutus.php" class="btn-1">About us</a>
            </div>
            <img class="bgimg" src="img/main2.jpg" alt="main-background">
        </div>
    </main>
    <img src="img/wave.png" class="wave-img" alt="">
    <!--main section -->
    <section class="pt-3 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img class="img-fluid p-4" src="img/custo.jpg" alt="" width="400px">
                    <button class="bttn"><a href="transfermoney.php">View Customers</a></button>
                </div>

                <div class="col-md-4 text-center">
                    <img class="img-fluid p-4" src="img/moneytransfer.jpg" alt="" width="300px">
                    <button class="bttn"><a href="transfermoney.php">Transfer Money</a></button>
                </div>

                <div class="col-md-4 text-center">
                    <img class="img-fluid p-4" src="img/history.jpg" alt="" width="310px">
                    <button class="bttn"><a href="transactionhistory.php">Transaction History</a></button>
                </div>
            </div>
            <hr>
        </div>
    </section>
    <!--footer Start-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-5">
                    <div class="mb-5 social">
                        <i style="color:white" class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
                        <i style="color:white" class="fab fa-github fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
                        <i style="color:white" class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
                        <i style="color:white" class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">Created By BHAGYASHREE MHATRE</a> | <span class="far fa-copyright"></span> 2021 All rights reserved.</div>
    </footer>
    <!--footer end-->
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>