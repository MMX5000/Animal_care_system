<?php
    require 'connection.php';

    function insert_client($fname,$lname,$address,$city,$zip,$state,$home_number,$cell_number,$work_number,$email,$username,$password){
        
        $conn = $GLOBALS["conn"];
        $intzip = (int)$zip;
        $query = "INSERT INTO  client (`FirstName`, `LastName`, `Address`, `City`, `State`, `Zip`, `HomePhone`, `CellPhone`, `WorkPhone`, `Email`, `Username`, `Password`) VALUES ( '$fname', '$lname', '$address', '$city', '$state', $intzip, '$home_number', '$cell_number', '$work_number', '$email', '$username', '$password')";
        
        if(mysqli_query($conn, $query)){
            echo"<p>Insert Success</p>";
        }
        else{
            echo "Error:" . mysqli_error($conn);
        }
    }
?>