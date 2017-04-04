<?php
    require 'index_login.php';
    $firstname = $_SESSION['firstname'];
    require 'insert_client.php';
?>
<!DOCTYPE html>
<!--
    
Created By: Ryan Claude Fox
Date:3/8/17

-->

    <head>
        <title>New User</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel ="stylesheet" type="text/css" href="menu_nav.css"/>
        <link rel ="stylesheet" type="text/css" href="form_page.css"/>
         <script src ="jquery-3.1.1.js"> </script>
         <script src="new_user.js"> </script>
        <script src ="menu_nav.js"> </script>
        
                
        <style>
           html,body
            { 
               

                margin:0;
                max-width:1920px;
             
                max-height:1920px;
              
            }
            
            .bg{
                
                background-image: url(images/new_user_image.jpg);
                 max-height:100%;
                 max-width:100%;
                 background-size:cover;
                 background-position:center;
                 background-repeat: no-repeat;


            }
           
            
        </style>
    </head>
    <body class = "bg">
    <div class="title_header">
           <h1> <span onclick="open_nav()">&#9776</span>Animal Care System</h1>
        </div>
            
        <div id ="menu_nav" class ="menu_nav">
            <a href="javascript:void(0)" class="close_btn" onclick="close_nav()">&times;</a>
            <span>Hello <?php echo "$firstname";?>! </span>
            <a href="employee_home.php"> Home</a>
            <a href="schedulePage.php">Schedule</a>
            <a href="new_animal.php">Register Animal</a>
            <a href="new_user.php">Register User</a>
            <a href ="search_user.php">Search</a>
            <a href="logout.php">Logout</a>
        </div>
        <?php
            
            //all errors for fields
            $fname_err = $lname_err = $address_err = $city_err = $zip_err = $phone_err = $email_error = $username_err = $pass_err = $re_pass_err ="";
            
            //status of all fields
            $fname_stat = $lname_stat = $address_stat = $city_stat = $zip_stat = $home_phone_stat = $cell_phone_stat = $work_phone_stat = $email_error_stat = $username_stat = $pass_stat ="";
            
            $home_phone_err = $cell_phone_err = $work_number_err ="";

            $home_number = $cell_number = $work_number ="";
        ?>
        
        <?php
            
            //handling all fields
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                //keeps count of success
                $success_count = 0;


                if (empty($_POST['fname'])) {

                    $fname_err = "* First name is required!";
                } else {

                    $first_name = fix_data($_POST['fname']);

                    if (!preg_match("/^[a-zA-Z]*$/", $first_name)) {

                        $fname_err = "* No numbers allowed!";

                    } else {

                        $fname_stat = "SUCCESS";
                        $success_count++;
                    }

                }


                if (empty($_POST['lname'])) {

                    $lname_err = "* Last name is required!";
                } else {

                    $last_name = fix_data($_POST['lname']);

                    if (!preg_match("/^[a-zA-Z]*$/", $last_name)) {

                        $lname_err = "* No numbers allowed!";

                    } else {

                        $lname_stat = "SUCCESS";
                        $success_count++;
                    }

                }


                if (empty($_POST['address'])) {

                    $address_err = "* Address is required!";
                } else {

                    $address = $_POST['address'];

                    if (!preg_match("/\A(\d{0,4}) ([A-Z a-z]+)/", $address)) {

                        $address_err = "* Invalid address format!";

                    } else {

                        $address_stat = "SUCCESS";
                        $success_count++;
                    }
                }
                if (empty($_POST['zip'])) {

                    $zip_err = "* Zip code is required!";
                } else {

                    $zip = fix_data($_POST['zip']);

                    if (!preg_match("/^\d{5}(?:[-\s]\d{4})?$/", $zip)) {

                        $zip_err = "* Invalid zip code format!";

                    } else {

                        $zip_stat = "SUCCESS";
                        $success_count++;
                    }

                }


                $email = $_POST['email'];

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_err = '* Invalid email format!';
                } else {
                    $email_stat = "SUCCESS";
                    $success_count++;
                }//end of email

                if (empty($_POST['username'])) {

                    $username_err = "* Username is required";

                } else {

                    $username = fix_data($_POST['username']);
                    if (!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $username)) {

                        $username_err = "* Invalid username!";
                    } else {
                        $username_stat = "SUCCESS";
                        $success_count++;
                    }
                }

                //check city
                if (empty($_POST['city'])) {

                    $city_err = "* Please enter in a city";
                } else {

                    $city = $_POST['city'];

                    if (!preg_match("/^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/", $city)) {

                        $city_err = "* Invalid city format";
                    } else {

                        $city_stat = "SUCCESS";
                        $success_count++;
                    }

                }


                //checks if password field is filled and matched
                if (empty($_POST['password'])) {

                    $pass_err = "* Please enter in a password!";
                } else {
                    $password = $_POST['password'];
                    $re_password = $_POST['re_pass'];

                    if ($password !== $re_password) {

                        $pass_err = "* Passwords do not match!";
                    } else {
                        $pass_stat = "SUCCESS";
                        $success_count++;
                    }
                }
                //end of checking password


                //checks if phone numbers are valid

                if (!empty($_POST['home_number'])) {

                    $home_number = $_POST['home_number'];
                    if (!preg_match("/\d\d\d-\d\d\d-\d\d\d/", $home_number)) {

                        $home_phone_err = "* INVALID phone number";
                        echo "<script>"
                            . "location.reload();"
                            . "alert('INVALID HOME NUMBER');"
                            . "</script>";
                    } else {
                        $home_phone_stat = "SUCCESS";

                    }
                }

                //check cell number
                if (!empty($_POST['cell_number'])) {
                    $cell_number = $_POST['cell_number'];

                    if (!preg_match("/\d\d\d-\d\d\d-\d\d\d/", $cell_number)) {

                        $cell_phone_err = "* INVALID cell phone number";
                        echo "<script>"
                            . "location.reload();"
                            . "alert('INVALID CELL NUMBER');"
                            . "</script>";
                    } else {
                        $cell_phone_stat = "SUCCESS";
                    }

                }
                //end of checking cell number

                //check work number
                if (!empty($_POST['work_number'])) {
                    $work_number = $_POST['work_number'];
                    if (!preg_match("/\d\d\d-\d\d\d-\d\d\d/", $work_number)) {

                        $home_phone_err = "* INVALID work phone number";
                        echo "<script>"
                            . "location.reload();"
                            . "alert('INVALID HOME NUMBER');"
                            . "</script>";
                    } else {
                        $work_phone_stat = "SUCCESS";

                    }
                }


                //get state

                $state = $_POST['state'];


                function fix_data($data)
                {

                    $data = trim($data);
                    $data = stripcslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }

                echo"<div class ='error'>";
                if($fname_stat !== "SUCCESS")
                {
                    echo"<span>$fname_err</span><br />";
                }
                if($lname_stat !== "SUCCESS")
                {
                    echo"<span>$lname_err</span><br />";
                }
                if($address_stat !== "SUCCESS")
                {
                    echo"<span>$address_err</span> <br />";
                }
                if($city_stat !== "SUCCESS")
                {
                    echo"<span>$city_err</span> <br />";
                }
                if($zip_stat !== "SUCCESS")
                {
                    echo"<span>$zip_err</span> <br />";
                }
                if($pass_stat !== "SUCCESS"){

                    echo"<span>$pass_err</span> <br />";
                }


                if(empty($_POST['home_number']) && empty($_POST['cell_number']) && empty($_POST['work_number'])){

                    echo"<span>* Please enter in atleast one phone number for user.</span>";
                }

                if($success_count === 8){

                    insert_client($first_name, $last_name, $address, $city, $zip, $state, $home_number,
                        $cell_number, $work_number, $email, $username, $password);
                }




            }  //END OF REQUEST METHOD
        echo "</div>";
        ?>


        
       <div class ="form_layout">



        <form id = "user_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <h2>Register New User</h2>
           <input type="text" name="fname" placeholder="First Name" /><br>
            <input type="text" name="lname" placeholder="Last Name"/><br>
            <input type="text" name="address" placeholder ="Address"/> <br>
            <input type ="text" name ="city" placeholder ="City" /> <br>
           <input type ="text" name="zip" placeholder ="Zip Code" /><br>
           State: <select name = 'state'></select><br>
           <input type="text" name ="home_number" placeholder ="Home Phone Number (000-000-0000)"/><br>
           <input type ="text" name="cell_number" placeholder ="Cell Phone Number (000-000-0000)"/> <br>
           <input type ="text" name ="work_number" placeholder ="Work Phone Number(000-000-0000)" /> <br>
           <input type="text" name="email" placeholder ="Email" /><br>
            <input type="text" name ="username" placeholder="Desired Username"/><br>
            <input type ="password" name="password" placeholder="Desired Password"/><br>
            <input type="password" name="re_pass" placeholder="Re-enter Password"/><br>
           <input type ="submit" name ='reg_user' value="Register New User" /><br>
           <input type ="reset" name = 'reset_btn' value ="Reset" /><br>
      
        </form>
       </div>
    </body>
</html>