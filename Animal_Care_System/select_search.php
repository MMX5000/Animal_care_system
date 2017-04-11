<<<<<<< HEAD
=======
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>My Pets</title>
        <link rel ="stylesheet" type="text/css" href="menu_nav.css"> </link>
        <link rel ="stylesheet" type ="text/css" href="user_home.css"> </link>
        <script src ="jquery-3.1.1.js"> </script>
        <script src="menu_nav.js"> </script>
        <style>
             html,body
            { 
                margin:0;
                height:100%;
            }
            .bg{
                height:100%;
                background-size:cover;
                background-position:center;
                background-repeat: no-repeat;
            }
        </style>
    </head>

>>>>>>> refs/remotes/origin/master
<?php
include 'connection.php';
session_start();
require_once 'is_employee.php';
if(!$conn){    
    die("Could not connect to database.");
}

function search($fname,$lname,$email,$username,$user_id,$animal_id){

    // Load connection information
    $conn = $GLOBALS['conn'];
    // If first and last name are provided
    if($fname !== "" && $lname !== ""){
        // If email is NOT provided
        if ($email == ""){
            // Create a query based on first and last name only
            $query ="SELECT ClientId, FirstName, LastName, Address, City, State, Zip, HomePhone, CellPhone, WorkPhone, Email FROM client WHERE FirstName = '$fname' and LastName = '$lname'";
            // Print out results
            printUserResult(mysqli_query($conn,$query));
        }
        // If email is provided
        else{
            // Create a query based on first and last name AND email
            $query ="SELECT ClientId, FirstName, LastName, Address, City, State, Zip, HomePhone, CellPhone, WorkPhone, Email FROM client WHERE FirstName = '$fname' and LastName = '$lname' and Email = '$email'";
            // Print out results
            printUserResult(mysqli_query($conn,$query));
        }
    }
    // If only email is provided
    else if($email !== ""){
        // Create a query based on email only
        $query ="SELECT ClientId, FirstName, LastName, Address, City, State, Zip, HomePhone, CellPhone, WorkPhone, Email FROM client WHERE Email = '$email'";
        // Print out results
        printUserResult(mysqli_query($conn,$query));
    }
    // If only the user name is provided
    else if($username !== ""){
        // Create a query based on username only
        $query ="SELECT ClientId, FirstName, LastName, Address, City, State, Zip, HomePhone, CellPhone, WorkPhone, Email FROM client WHERE Username = '$username'";
        // Print out results
        printUserResult(mysqli_query($conn,$query));
    }
    // If only the client id is provided
    else if($user_id !== ""){
        // Create a query based on the client id only
        $query ="SELECT ClientId, FirstName, LastName, Address, City, State, Zip, HomePhone, CellPhone, WorkPhone, Email FROM client WHERE ClientId = '$user_id'";
        // Print out results
        printUserResult(mysqli_query($conn,$query));    
    }
    // If only the pet id is provided
    else if($animal_id != ""){
        $_SESSION["petId"] = $animal_id;
        header("Location: ./view_all_visit.php");
    }
}

function printUserResult($result){
<<<<<<< HEAD
    if(mysqli_num_rows($result) > 0){            
        echo "<table class = 'multi_user_table'><tr><th>User Id</th><th>First Name</th><th>Last Name</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Home Phone Number</th><th>Cell Phone Number</th><th>Work Phone Number</th><th>Email</th></tr>";

=======
    if(mysqli_num_rows($result) > 0){
        require_once 'sidebar.php';
        echo "<body class = 'bg'> <div><table class = 'multi_user_table'><tr><th>User Id</th><th>First Name</th><th>Last Name</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Home Phone Number</th><th>Cell Phone Number</th><th>Work Phone Number</th><th>Email</th></tr>";
>>>>>>> refs/remotes/origin/master
        while($row = mysqli_fetch_row($result)){

            echo "<td><a href=\"view_client_pets_session_set.php?id=$row[0]\">$row[0]</td>";
            for($i=1; $i < 11; $i++){
                echo "<td>$row[$i]</td>";
            }
            echo "</tr>";
        }
        echo "</table></div></body></html>";
    }
    else{
        header("Location:search_user.php");
    }
}

?>