 
<?php error_reporting(0); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Herble plants  web site</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link href="bootstrap/css/style.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootstrap/css/w3css.css" rel="stylesheet">
        <script src="js/main.js" type="text/javascript"></script>
        <link rel="stylesheet" href="jqueryui/jquery-ui.min.css"/>
        <link rel="stylesheet" href="jqueryui/jquery-ui.theme.css"/>
        <link rel="stylesheet" href="jqueryui/jquery-ui.structure.min.css">
        <script type="text/javascript" src="jqueryui/external/jquery/jquery.js"></script>
        <script type="text/javascript" src="jqueryui/jquery-ui.min.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#accordion').accordion();
            });
        </script>
    </head>
    <body>
        <?php
        include './db.php';
        include './function.php';
        $hint = "";
        $word = "";
        $my_id = "";
//...................................login......................................
        if (isset($_POST['btnSubmit1'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            if (empty($username) or empty($password)) {
                $hint = "Empty Fields. Please input your Username,Password!";
            } else {
                $sql = "SELECT id,status,user_level,email FROM users WHERE username='$username' AND password='$password'";
                $conn = new db();
                $check_login = $conn->db_rowCount($sql);

                if ($check_login == 1) {
                    $hint = "you can login";
                    $getData1 = $conn->getData($sql);

                    //$emailsession= $getData1['email'];  //session email
                    $id = $getData1['id'];
                    $type = $getData1['status'];
                    $whoIS = $getData1['user_level'];
                    if ($type == '2') {
                        $hint = "Your Account is Deactivated";  //deactivated user
                    } else {
                        if ($whoIS == '1') {    //activated admin
                            $_SESSION['user_id'] = $id;
                            //$_SESSION['email'] = $emailsession; //session email
                            header('location:admin.php');   //redirect admin panel
                        }
                        if ($whoIS == '2') {    //activated user
                            $_SESSION['user_id'] = $id;
                            //$_SESSION['email'] = $emailsession; //session email
                            header('location:booking.php'); //redirect booking page
                        }
                    }
                } else {
                    $hint = "Invalid Username And/Or Password";
                }
            }
        } else {

        }
//.........................................registration form....................
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $email = ($_POST['email']);
            $nic = ($_POST['nic']);
            $country = ($_POST['country']);


//...............................image upload...................................
            $imgUpload = 0;
            if (getimagesize($_FILES['image']['tmp_name']) == FALSE) {
                $word = "Please select an Image";
            } else {
                $size = getimagesize($_FILES['image']['tmp_name']);
                $type = $size['mime'];
                $imgfp = fopen($_FILES['image']['tmp_name'], 'rb');
                $size = $size[3];
                $name = $_FILES['image']['name'];
                $maxsize = 99999999;

                if ($_FILES['image']['size'] < $maxsize) {
                    if ($type == "image/jpeg") {
                        $image = addslashes($_FILES['image']['tmp_name']);
                        $name = addslashes($_FILES['image']['name']);
                        $image = file_get_contents($image);
                        $image = base64_encode($image);     //encode data
                        $imgUpload = 1;
                    } else {
                        $word = "Use .JPEG file type";
                    }
                } else {
                    $word = "Cannot Upload! File Size is too large.";
                }
            }
//....................................captcha...................................
            if ($imgUpload == 1) {
                if ($_POST['captcha'] != $_SESSION['digit']) {  //check captcha
                    session_destroy();
                    $word = "CAPTCHA is empty or wrong !";
                } else {    //check empty values
                    if (empty($username) or empty($password) or empty($email) or empty($nic) or empty($country)) {
                        $hint = "error";
                        $word = "Empty Field/s";
                    } else {
//.....................................insert data..............................
                        $query = "select * from users";
                        $conn = new db();
                        $getData1 = $conn->getDataToArray($query);
                        $t = 0;
                        while ($row = mysqli_fetch_array($getData1)) {
                            $t++;
                        }
                        //echo $t;  //array index
                        if ($t < 1) {   //while <1 , admin. others going to else,,
                            $sql = "INSERT INTO users(salute,username,password,email,nic,country,user_level,status) VALUES('$title','$username','$password','$email','$nic','$country','1','1')";
                            $conn = new db();
                            $conn->db_conn($sql);
                            $sql2 = "INSERT INTO profile_pic(name,image,email,status) VALUES('$name','$image','$email','1')";
                            $conn->db_conn($sql2);
                            $word = "Successfuly resgistered";
                        } else {
                            $sql = "INSERT INTO users(salute,username,password,email,nic,country,user_level,status) VALUES('$title','$username','$password','$email','$nic','$country','2','1')";
                            $conn = new db();
                            $conn->db_conn($sql);
                            $sql2 = "INSERT INTO profile_pic(name,image,email,status) VALUES('$name','$image','$email','1')";
                            $conn->db_conn($sql2);
                            $word = "Successfuly resgistered";
                        }
                    }
                }
            } else {
                $word = "Invalid! Empty Fields.";
//-------------------div php----------------------------------------------------
//                $mydiv = '<div class="alert alert-info row" role="alert" style="margin-bottom: 10px; margin-left:1px;margin-right:1px;margin-top: 10px">';
//                echo $word;
//                $mydiv .= '</div>';
            }
        } else {

        }
        ?>
        <div class="container-fluid" style="background-color: #18ecd1" >
            <?php
            //----------------div using php--------------
            //echo $mydiv;
            echo $word;
            echo $hint;
            ?>
            <!--top navigation...........................................................-->
            <div class="w3-topnav w3-green">
			 <!--  <img id="sampleimage" src="logo.jpg" alt="Picture here" height="120px"; width="175px"/>-->
                <img width="175" height="120" src="images/logo.jpg"   alt="logo" style="margin-top:-6px;">
                <a href="index.php">Home</a>
                <a href="about.php">About Us</a>
                <a href="medicine.php">Buy medicine plant</a>
                <a href="sell.php">Sell Your Prouducts </a>
                <a href="#contact_form">Contact</a>

            </div><br/>
            <!--login.....................................................-->
                       <div class="row" style="margin-top: px">
                           <div class="col-xs-12 col-md-1"></div>
                            <div class="col-xs-12 col-md-6">
                                <h2 style="color: #10b213"><b> Medicine plants</b></h2>
                                <p>A medicinal plant is any plant which, in one or more of its organs, contains substances that can be 
								used for therapeutic purposes or which are precursors for the synthesis of useful drugs.
Medicinal plants are regarded as rich resources of traditional medicines and from these plants many of the modern medicines are produced
This study has highlighted the importance of medicinal plants to of people, and the can also be purchased.
This web site has been created so that anyone who need it can get following medicinal plants online.
Anymore can check this carefully and order the necessary medicinal plants
But,
First customer have to register on this web site and order the medicine plants.
</p>
                            </div>
<!--                            ....................login...................-->
                            <div class="col-xs-6 col-md-4" id="login_index">
                                <h5>Login Here & Order Now!</h5>
                                <form  method="post">
                                    <input id="name" name="username" placeholder="username" type="text" class="form-control"><br>
                                    <input id="password" name="password" placeholder="**********" type="password" class="form-control">
                                    <br/>
                                    <input name="btnSubmit1" id="btnSubmit1" type="submit" value=" Login " class="btn btn-success btn-sm">
                                    <input type="reset" value="Clear" class="btn btn-success btn-sm">
                                    <a href="#Index_register_form" class="btn btn-success btn-sm">Register</a><br/>
                            <?php echo "If you are a New user, <a href='#Index_register_form'><b>Register</b></a> here Now!";     ?>
                                </form>
                            </div>
                            <div class="col-xs-12 col-md-1"></div>
                            </div>
                          </form>
                        <!--slider.................................................height="471px" width="1000px..................-->
		
<img width="1315px" height="500px" src="images/170.png"   alt="logo" style="margin right:-50%;">
            <!--JQUIERY................................................................. -->

            <!--.........................................................................-->
            <div class="row" id="Index_register_form">
                <!--Registration form........................................................-->
                <div class="col-md-6">
                    <h3 class="alert alert-success">Register</h3>
                    <form method="post" enctype=multipart/form-data>
                        <table>
                            <tr>
                                <td>Salutation</td>
                                <td>:</td>
                                <td>
                                    <select name="title" id="title" class="form-control input-sm" >
                                        <option value="Mr">Mr</option>
                                        <option value="Mrs">Mrs</option>
                                        <option value="Miss">Miss</option>
                                        <option value="Ms">Ms</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>User Name*</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" id="username" name="username" placeholder="User Name"></td>
                            </tr>
                            <tr>
                                <td>Password*</td>
                                <td>:</td>
                                <td><input type="password" class="form-control" id="password" name="password" placeholder="Password"></td>
                            </tr>
                            <tr>
                                <td>Email*</td>
                                <td>:</td>
                                <td><input type="email" class="form-control" id="email" name="email" placeholder="Email"></td>
                            </tr>
                            <tr>
                                <td>NIC/Passport*</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" id="nic" name="nic" placeholder="970523685V" onblur="isExcisting()"></td>
                            </tr>
                            <tr>
                                <td>Image*</td>
                                <td>:</td>
                                <td><input type="file" id="image" name="image" ></td>
                            </tr>
                            <tr>
                                <td></td><td></td>
                                <td><p>Upload Your Picture</p></td>
                            </tr>
                            <tr>
                                <td>Country*</td>
                                <td>:</td>
                                <td><input type="text" class="form-control" id="country" name="country" placeholder="country"></td>
                            </tr>
                            <tr>
                                <td>Check Point</td>
                                <td>:</td>
                                <td><p><img src="captcha.php" width="120" height="30" alt="CAPTCHA"></p></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td></td>
                                <td><p><input type="text" size="6" maxlength="5" name="captcha" value=""><br>
                                        <small>copy the digits from the image into this box</small></p></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><button type="submit" class="btn btn-default" name="submit">Register</button></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </form>
                    <div class="alert alert-info row" role="alert" style="margin-bottom: 10px; margin-left:1px;margin-right:1px;margin-top: 10px" id="contact_form">
                        <?php echo $word; ?>
                    </div>
                </div>
                <!--contact info.............................................................-->
                <div class="col-md-6">
                    <h3 class="alert alert-success">Contact Us</h3>
                    <address>
                        <strong>ICT Technology</strong><br>
                        <span class="glyphicon glyphicon-user"></span><br/>


                        COT 2022<br>
                       COT Rathnapura,
                        <br/> Rathnapura.<br>
                        <span class="glyphicon glyphicon-phone-alt"></span><br/>
                        <abbr title="Telephone">P:</abbr> 0778787654
                    </address>
                    <address>
                        <strong><span class="glyphicon glyphicon-envelope"></span></strong><br>
                        <a href="mailto:dilharakanchana@gmail.com">dilharakanchana@gmail.com</a>
                    </address>
                    <a href="https://www.facebook.com/name.name?epa=SEARCH_BOX" target="_blank">
                        <span><img src="images/fb.jpg" width="20px" height="20px" /></span></a>Contact hear!<br/>
                </div>
            </div>
                      <!--footer-->
            <div class="row">
                <div class="col-md-6 col-md-offset-3">                </div>
                <footer class="w3-container w3-teal w3-text-white-opacity">
                    <h5>Medicine plantes</h5>
                    <p>Powered By: COT Rathnapura [Final Project-COT_2022]</p>
                </footer>
            </div>
        </div>
    </body>
</html>
