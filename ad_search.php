<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Search Result</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/w3css.css" rel="stylesheet">
    </head>
    <body>
        <?php
        //$hint = '';
        include './db.php';
        include './function.php';
        if (isset($_SESSION['user_level']) && !empty($_SESSION['user_level'])) {
            if ($_SESSION['user_level'] == 1) {
                ?>
                <div class="container-fluid" >
                    <?php // echo $hint; ?>
                    <div class="w3-topnav w3-green">
                       <!-- <img width="175" height="45" src="images/logo1.jpg"   alt="logo" style="margin-top:-7px;">-->
                        <a href="index.php">Home</a>
                        <a href="admin.php">Admin Panel</a>
                        <a href="ad_adminedit.php">Back</a>
                        <a href="logout.php" style="font-weight: bolder" class="btn btn-default btn-sm">Log Out</a>
                    </div>

                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"><h1>Search Result</h1><h4></h4></div>
                        <div class="col-md-4"></div>
                    </div><hr>
                    <!--...........................................................................-->
                    <center><h1></h1></center>
                    <table class="table table-hover">
                        <tr class="table success">
                            <td>ID</td>
                            <td>TITLE</td>
                            <td>USERNAME</td>
                            <td>Email</td>
                            <td>NIC/PASSPORT</td>
                            <td>COUNTRY</td>
                        </tr>

                        <?php
                        $text = $_POST['txtsearch'];
                        if ($text == "") {
                            echo "<div class='bg-danger'>Please Insert Data!!!</div>" . "<br>";
                            echo "<a href='ad_adminedit.php' class='btn btn-default'><b>Go Back</b></a>";
                        }
                        ?>
                        <?php
                        $cat = $_POST['catsearch'];
                        $search = $_POST['txtsearch'];
                        ?>
                        <?php
                        if ($cat == "User Name") {
                            $id = mysql_query("SELECT * FROM users WHERE username='$search'");
                            ?>
                            <?php
                            while ($di = mysql_fetch_array($id)) {
                                ?>

                                <tr>
                                    <td><?php echo $di[0]; ?></td>
                                    <td><?php echo $di[1]; ?></td>
                                    <td><?php echo $di[2]; ?></td>
                                    <td><?php echo $di[4]; ?></td>
                                    <td><?php echo $di[5]; ?></td>
                                    <td><?php echo $di[6]; ?></td>
                                    <td><?php // echo $di[6];    ?></td>
                                    <?php echo "<td><a href=\"ad_searchedit.php?id=$di[0]\" class='btn btn-default'>Update Info</a></td>"; //get ?>
                                </tr>
                                <?php
                            }
                        } else if ($cat == "NIC") {
                            $na = mysql_query("SELECT * FROM users WHERE nic like '" . $search . "%'");
                            ?>
                            <?php
                            while ($an = mysql_fetch_array($na)) {
                                ?>
                                <tr>
                                    <td><?php echo $an[0]; ?></td>
                                    <td><?php echo $an[1]; ?></td>
                                    <td><?php echo $an[2]; ?></td>
                                    <td><?php echo $an[4]; ?></td>
                                    <td><?php echo $an[5]; ?></td>
                                    <td><?php echo $an[6]; ?></td>
                                    <td><?php // echo $di[6];    ?></td>
                                    <?php echo "<td><a href=\"ad_searchedit.php?id=$an[0]\" class='btn btn-default'>Update Info</a></td>"; //get ?>
                                </tr>
                                <?php
                            }
                            ?>
                            <?php
                        } else if ($cat == "Email") {
                            $add = mysql_query("SELECT * FROM users WHERE email like '" . $search . "%'");
                            ?>
                            <?php
                            while ($dda = mysql_fetch_array($add)) {
                                ?>
                                <tr>
                                    <td><?php echo $dda[0]; ?></td>
                                    <td><?php echo $dda[1]; ?></td>
                                    <td><?php echo $dda[2]; ?></td>
                                    <td><?php echo $dda[4]; ?></td>
                                    <td><?php echo $dda[5]; ?></td>
                                    <td><?php echo $dda[6]; ?></td>
                                    <td><?php // echo $dda[3];    ?></td>
                                    <?php echo "<td><a href=\"ad_searchedit.php?id=$dda[0]\" class='btn btn-default'>Update Info</a></td>"; //get ?>
                                </tr>
                                <?php
                            }
                        } else if ($cat == "Admin=1 or user=2") {
                            $add = mysql_query("SELECT * FROM users WHERE user_level like '" . $search . "%'");
                            ?>
                            <?php
                            while ($dda = mysql_fetch_array($add)) {
                                ?>
                                <tr>
                                    <td><?php echo $dda[0]; ?></td>
                                    <td><?php echo $dda[1]; ?></td>
                                    <td><?php echo $dda[2]; ?></td>
                                    <td><?php echo $dda[4]; ?></td>
                                    <td><?php echo $dda[5]; ?></td>
                                    <td><?php echo $dda[6]; ?></td>
                                    <td><?php // echo $dda[3];    ?></td>
                                    <?php echo "<td><a href=\"ad_searchedit.php?id=$dda[0]\" class='btn btn-default'>Update Info</a></td>"; //get ?>
                                </tr>
                                <?php
                            }
                        } else if ($cat == "Active=1 or Deactivated=2") {
                            $add = mysql_query("SELECT * FROM users WHERE status like '" . $search . "%'");
                            ?>
                            <?php
                            while ($dda = mysql_fetch_array($add)) {
                                ?>
                                <tr>
                                    <td><?php echo $dda[0]; ?></td>
                                    <td><?php echo $dda[1]; ?></td>
                                    <td><?php echo $dda[2]; ?></td>
                                    <td><?php echo $dda[4]; ?></td>
                                    <td><?php echo $dda[5]; ?></td>
                                    <td><?php echo $dda[6]; ?></td>
                                    <td><?php // echo $dda[3];    ?></td>
                                    <?php echo "<td><a href=\"ad_searchedit.php?id=$dda[0]\" class='btn btn-default'>Update Info</a></td>"; //get ?>
                                </tr>
                                <?php
                            }
                        }
                        ?>

                    </table>






                    <!--...........................................................................-->
                    <?php
                } else if ($_SESSION['user_level'] == 2) {
                    header('location:404.php');
                }
            } else {
                header('location:404.php');
            }
            ?>
        </div>
    </body>
</html>