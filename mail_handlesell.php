 <?php
 if(isset($_POST['submit'])){
   $fname=$_POST['fname'];
   $pname=$_POST['pname'];
   $price=$_POST['price'];
   $Nicno=$_POST['Nicno'];
   $district=$_POST['district'];
   $city=$_POST['city'];
   $Address=$_POST['Address'];
   $pnumber=$_POST['pnumber'];
   $email=$_POST['email'];

   $to='sankaamazon@gmail.com';
   $subject='sell';
   $message="Name : ".$fname."\n"."phone Number : ".$pname."\n"."price : ".$price."\n"."NIC : ".$Nicno."/n"."District : ".$district."/n"."city :".$city."/n"."Address :".$Address."/n"."Phone number :".$pnumber."/n"."email :".$email;
   $headers="From : ".$email;

   if(mail($to, $subject,$message)){
     echo "<h1>Posting Successfully! Thank you"." ".$fname.", We will contact you shortly!</h1>";
   }
 else {
   echo "Somthin went Wrong!";
 }

 }
 ?>
