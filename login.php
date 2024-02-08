<?php
//------------------------------db connection---------------
$host = "localhost"; // Host name
$username = "root"; // Mysql username
$password = ""; // Mysql password
$db_name = "jsjs"; // Database name
$tbl_name = "registration"; // Table name

// Connect to server and select database.
$conn = new mysqli("$host", "$username", "$password", "$db_name");
if ($conn->connect_error) {
    die('database con failed!' . $connection->connect_error);
}

//--------------------------------assigning-----------------------------------
if (isset($_POST['submit'])) {
    $uname = $_POST["username"];
    $pword = $_POST["password"];

//---------------------------------query************************
    $result = mysqli_query($conn, "SELECT * FROM registration WHERE fname = '$uname' AND password1 = '$pword' ");
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $username = $row["fname"];
    $password = $row["password1"];
    $type = $row["status"];

    if ($uname == "" or $pword == "") {
        //$error = "Username or Password is invalid";
        header("Location: index.php");
        ?>
        <script>
            alert('Please Enter Valid Information!')
        </script>
        <?php
    } else {

        if ($uname == $username && $pword == $password) {
            if ($type == 1) {
                //$_SESSION['status'] = $type;     //session name
                header("Location: admin.php");
            } else if ($type == 0) {
                header("Location: booking.php");
            }
            //echo "login successful";
        } else {
            header("Location: index.php");
            ?>
            
            <script>
                alert('username or password not Valid!')
            </script>

            <?php
        }
    }
}//assign
?>