<!DOCTYPE html>
<html>
<head>
	<title>medicine plants</title>
  <link rel="stylesheet" href="post.css">
	<link rel="stylesheet"  href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/main.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1,user-scaleable=no">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
	</script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body background="bg.jpg">
	<nav class="navbar navbar-default navbar-fixed-top" id="navbar">
	<div class="container">
		<a href="/my/index.php" class="navbar-brand" id="text"> medicine plants</a>
		<ul class="nav navbar-nav">
<!--Drop Down Menu-->
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="text">Menu <span class="caret"></span></a>
	<ul class="dropdown-menu" role="menu">
		<li><a href="index.php">Home</a></li> 
		<li><a href="about.php">About Us</a></li>
		<li><a href="medicine.php">Medicine</a></li>
		<li><a href="sell.php">Sell Your Prouducts</a></li>

	</ul>
</li>
		</ul>
	</div>
</nav>
<br>
<br>
<!--images-->

	<div id="image-1"></div>
	<div id="image-2"></div>
</div>
<div class="postadd">
  <h1> Sell Your Prouducts </h1>
  <form action="mail_handlesell.php" method="post" name="from" class="form-box">
    		<p>Full Name</p>
    		<input type="text" name="fname" placeholder="Enter Full Name">
    		<p>Product Name</p>
    		<input type="text" name="pname" placeholder="Ex yakinaran">
    		<p>Product Price of 1kg</p>
    		<input type="text" name="price" placeholder="Rs 100.00 ">
    		<p>NIC Number</p>
    		<input type="text" name="Nicno" placeholder="NIC">
            <p>District</p>
            <div class="dis">
            <select name="district">
              <option value="Ampara">Ampara</option>
              <option value="Anuradhapura">Anuradhapura</option>
              <option value="Badulla">Badulla</option>
              <option value="Batticaloa">Batticaloa</option>
              <option value="Colombo">Colombo</option>
              <option value="Galle">Galle</option>
              <option value="Gampaha">Gampaha</option>
              <option value="Hambantota">Hambantota</option>
              <option value="Jaffna">Jaffna</option>
              <option value="Kalutara">Kalutara</option>
              <option value="Kandy">Kandy</option>
              <option value="Kegalle">Kegalle</option>
              <option value="Kilinochchi">Kilinochchi</option>
              <option value="Kurunegala">Kurunegala</option>
              <option value="Mannar">Mannar</option>
              <option value="Matale">Matale</option>
              <option value="Matara">Matara</option>
              <option value="Monaragala">Monaragala</option>
              <option value="Mullaitivu">Mullaitivu</option>
              <option value="Nuwara Eliya">Nuwara Eliya</option>
              <option value="Polonnaruwa">Polonnaruwa</option>
              <option value="Puttalam">Puttalam</option>
              <option value="Ratnapura">Ratnapura</option>
              <option value="Trincomalee">Trincomalee</option>
              <option value="Vavuniya">Vavuniya</option>
            </select>
        </div>
            <br>
            <br>
            <p>City</p>
            <input type="text" name="city" placeholder="City">
    		<p>Home Address</p>
    	    <input type="text" name="Address" placeholder="Address">
    		<p>Phone Number</p>
    		<input type="tel" name="pnumber" placeholder="07XXXXXXXX">
    		<p>Email</p>
    		<input type="email" name="email" placeholder="Enter Email">
    		<input type="submit" name="submit"  value="Post Advertisement">
       </form>
     </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<footer class="text-center" id="footer">Powered By: COT Rathnapura [Final Project- 2022]</footer>
<!-- <details model -->

</body>
</html>
