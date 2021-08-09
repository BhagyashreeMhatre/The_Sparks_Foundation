<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money TSF Bank</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/d30ff5ad29.js" crossorigin="anonymous"></script>
    <style type="text/css">
        button {
            border: none;
            background: #d9d9d9;
        }
        button:hover {
            background-color: #777E8B;
            transform: scale(1.1);
            color: white;
        }
    </style>
</head>

<body>
    <?php
    include 'config.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    ?>
    <!--Navbar connection-->
    <?php include 'navbar.php';
    ?>
    
    <div class="container">
        <h2 class="text-center pt-4">Transfer Money</h2>
        <br>
        <div class="row">
            <div class="col">
                <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered ">
                        <thead>
                            <tr class="bg-primary">
                                <th scope="col" class="text-center py-2">Id</th>
                                <th scope="col" class="text-center py-2">Name</th>
                                <th scope="col" class="text-center py-2">E-Mail</th>
                                <th scope="col" class="text-center py-2">Balance ₹</th>
                                <th scope="col" class="text-center py-2">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr class="table-primary">
                                    <td class="text-center py-2"><?php echo $rows['id'] ?></td>
                                    <td class="text-center py-2"><?php echo $rows['name'] ?></td>
                                    <td class="text-center py-2"><?php echo $rows['email'] ?></td>
                                    <td class="text-center py-2"><?php echo $rows['balance'] ?></td>
                                    <td class="text-center"><a href="selecteduserdetail.php?id= <?php echo $rows['id']; ?>"> <button type="button" class="btn btn-primary">Show Details / Transact</button></a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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