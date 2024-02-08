<?php
class db {
   
   function db_conn($get_sql) {
        $sql = $get_sql;
        $chack_login = "";
        $numberOfRows;
        include 'db_variables.php';
        $conn = new mysqli($server, $username, $password, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if ($conn->query($sql) == TRUE) {
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    function db_rowCount($get_sql) {
        $sql = $get_sql;
        include 'db_variables.php';
        
        $chack_login = "";
        $numberOfRows;

        $conn = new mysqli($server, $username, $password, $db_name);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if ($conn->query($sql) == TRUE) {
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
       if ($result =mysqli_query($conn, $sql)) {
           $rowcount = mysqli_num_rows($result);
        }
        return $rowcount;
        $conn->close();
    }

    function getData($get_sql) {
        $sql = $get_sql;

        include 'db_variables.php';
        $conn = new mysqli($server, $username, $password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if ($conn->query($sql) == TRUE) {
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $row;
        mysqli_close($con);
    }
    
    
    
      function getDataToArray($get_sql) {
        $sql = $get_sql;

        include 'db_variables.php';
        $conn = new mysqli($server, $username, $password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if ($conn->query($sql) == TRUE) {
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $result = mysqli_query($conn, $sql);
      
        return $result;
    
    }
    
     function showData($get_sql) {
        $sql = $get_sql;

        include 'db_variables.php';
        $conn = new mysqli($server, $username, $password, $db_name);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if ($conn->query($sql) == TRUE) {
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        return $row;
        mysqli_close($con);
    }
      
    function insertData($sqlquery){
        //$con1=  mysql_connect("localhost", "root", "") or die("error host");
        mysql_query($sqlquery) or die("mysql errorr");
    }
    
}