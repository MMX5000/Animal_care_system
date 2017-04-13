<?php


    //if session exist destory, else start a new one.
    if(isset($_SESSION)){
        session_destroy();
    }else{
        session_start();
    }

    require 'connection.php';

if($_SERVER["REQUEST_METHOD"]== "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $_SESSION['username'] = $username;
    $conn = $GLOBALS['conn'];
    $query = "SELECT * FROM client WHERE Username = '$username' and Password = '$password'";
    $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)){

                $_SESSION['firstname']=$row['FirstName'];
                $_SESSION['lastname'] = $row['LastName'] ;
                $_SESSION['email'] = $row['Email'];
                $_SESSION['id'] = $row['ClientId'];
                $_SESSION['employee'] = -1;
            }
           header("Location:user_home.php");

        }elseif(mysqli_num_rows($result) === 0){
            $employeeId = (int)$username;

            $employee_query = "SELECT * FROM employee WHERE EmployeeId = $employeeId and Password = '$password'";
            $employee_result = mysqli_query($conn, $employee_query);

            if(mysqli_num_rows($employee_result) > 0){
                while($row = mysqli_fetch_assoc($employee_result)){
                    $_SESSION['firstname'] = $row['FirstName'];
                    $_SESSION['employee'] = $row['Title'];
                }
                header("Location:employee_home.php");
            } else{
                header("Location:index.php");
            }
        }//end of else if


}//end of $_SERVER['REQUEST_METHOD'] == POST
?>