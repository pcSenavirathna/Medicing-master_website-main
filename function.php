    <?php
session_start();
//$level_name=NULL;
function loggedin() {
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}

if (loggedin()) {
   
    $my_id = $_SESSION['user_id'];
    $query = "SELECT username,user_level,email,nic FROM users WHERE id='$my_id'";
    $conn = new db();
    $getData1 = $conn->getData($query);
    $username = $getData1['username'];
    $user_level = $getData1['user_level'];
    $_SESSION['user_level']=$user_level;
    $user_nic=$getData1['nic'];
    
    $user_email = $getData1['email'];
    //..............
    $query2 = "SELECT name FROM user_level WHERE id='$user_level'";
    $getData2 = $conn->getData($query2);
    $level_name = $getData2['name'];
    
    //....load image reference
    $query3 = "SELECT * FROM profile_pic WHERE email='$user_email'";
    $getData3 = $conn->getData($query3);
    
    $level_pic = $getData3['image'];
    
}


?>