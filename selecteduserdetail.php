<?php
include 'config.php';

if (isset($_POST['submit'])) {
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where id=$from";
    $query = mysqli_query($conn, $sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from users where id=$to";
    $query = mysqli_query($conn, $sql);
    $sql2 = mysqli_fetch_array($query);

    // constraint to check input of negative value by user... showing an alert box.
    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  
        echo '</script>';
    }

    // constraint to check insufficient balance... showing an alert box.
    else if ($amount > $sql1['balance']) {
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck !! Insufficient Balance")';  
        echo '</script>';
    }

    // constraint to check zero values... showing an alert box.
    else if ($amount == 0) {
        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {
        // deducting amount from sender's account
        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$from";
        mysqli_query($conn, $sql);
        // adding amount to reciever's account
        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE users set balance=$newbalance where id=$to";
        mysqli_query($conn, $sql);

        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo "<script> alert('Transaction Successful !!');
                window.location='transactionhistory.php';
                </script>";
        }

        $newbalance = 0;
        $amount = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money TSF Bank</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
    <!--navbar-->
    <?php
    include 'navbar.php';
    ?>

    <div class="container">
        <h2 class="text-center pt-4">Transaction</h2>
        <?php
        include 'config.php';
        $sid = $_GET['id'];
        $sql = "SELECT * FROM  users where id=$sid";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "Error : " . $sql . "<br>" . mysqli_error($conn);
        }
        $rows = mysqli_fetch_assoc($result);
        ?>
        <form method="post" name="tcredit" class="tabletext"><br>
            <div>
                <table class="table table-striped table-condensed table-bordered table-dark">
                    <tr>
                        <th class="text-center">Id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Balance ₹</th>
                    </tr>
                    <tr>
                        <td class="text-center py-2"><?php echo $rows['id'] ?></td>
                        <td class="text-center py-2"><?php echo $rows['name'] ?></td>
                        <td class="text-center py-2"><?php echo $rows['email'] ?></td>
                        <td class="text-center py-2"><?php echo $rows['balance'] ?></td>
                    </tr>
                </table>
            </div>
            <br>
            <span class="badge badge-pill badge-warning" style="font-size: x-large;">Transfer To:</span>
            <br>
            <br>

            <!--choose account-->
            <select name="to" class="form-control" required>
                <option value="" disabled selected>Choose</option>
                <?php
                include 'config.php';
                $sid = $_GET['id'];
                $sql = "SELECT * FROM users where id!=$sid";
                $result = mysqli_query($conn, $sql);
                if (!$result) {
                    echo "Error " . $sql . "<br>" . mysqli_error($conn);
                }
                while ($rows = mysqli_fetch_assoc($result)) {
                ?>
                    <option class="table" value="<?php echo $rows['id']; ?>">

                        <?php echo $rows['name']; ?> (Balance ₹:
                        <?php echo $rows['balance']; ?> )

                    </option>
                <?php
                }
                ?>
                <div>
            </select>
            <br>
            <br>
            <!--enter amount-->
            <span class="badge badge-pill badge-warning" style="font-size: x-large;">Amount:</span>
            <br>
            <br>
            <input type="number" class="form-control" name="amount" placeholder="Enter Amount you want to Transfer" required>
            <br><br>
            <div class="text-center">
                <button class="btn mt-3 btn-primary" name="submit" type="submit" id="myBtn">Transfer Amount</button>
            </div>
        </form>
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>