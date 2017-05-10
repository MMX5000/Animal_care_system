<?php
    session_start();
    require 'insert_animal.php';
    require_once 'is_logged.php';

    $firstname =  $_SESSION['firstname'];
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>New Animal</title>
        <link rel="stylesheet" type="text/css" href="form_page.css"/>
         <link rel ="stylesheet" type="text/css" href="menu_nav.css"> </link>

        <script src ="jquery-3.1.1.js"> </script>
        <script src= "new_animal.js"> </script>
        <script src ="menu_nav.js"> </script>

        <style>


            body{
                margin:0;
                background:url(images/pet_reg_img.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }


            .error{

                font-weight:bold;
                font-family: sans-serif;
                color:red;
                background-color:#48b5f9;
                height:8%;
                border-radius:10px;
                margin:auto;
                width:50%;
                padding:10px;
                font-size: 14px


            }


        </style>
    </head>
    <body class = 'bg'>

        <?php
            require_once 'sidebar.php';
            $pet_name_err = $username_err = $breed_err = $owner_id_err = $weight_err = $email_err = $birth_date_err = "";
             $pet_name = $username = $breed = $owner_id = $weight = $email= "";
             $name_stat = $username_stat = $breed_stat = $weight_stat = $owner_id_stat = $email_stat = $birth_date_stat ="";

        ?>
        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {

                $birth_date = $_POST['birth_date'];


                //check birthdate
                if (!empty($_POST['birth_date'])) {

                    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $birth_date)) {

                        $birth_date_err = "* Invalid date format.";
                    } else {
                        $birth_date_stat = "SUCCESS";
                    }

                }//end of checking birthdate

                //checking pet name
                if (empty($_POST["pet_name"])) {

                    $pet_name_err = "* Pet name required!";
                } else {

                    $pet_name = fix_data($_POST["pet_name"]);

                    if (!preg_match("/^[a-zA-Z]*$/", $pet_name)) {

                        $pet_name_err = "* Only letters allowed!";

                    } else {
                        $name_stat = "SUCCESS";
                    }


                }//end of  checking pet name

                //start of checking email

                $email = $_POST['email'];

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_err = '* Invalid email format!';
                } else {
                    $email_stat = "SUCCESS";
                }//end of email

                //check email

                if (isset($_POST['username'])) {

                    $username = $_POST['username'];
                    $username_stat = "SUCCESS";
                }

                //checking breed
                if (empty($_POST['breed'])) {

                    $breed_err = '* Breed required!';
                } else {
                    $breed = fix_data($_POST['breed']);

                    if (!preg_match("/^[a-zA-Z]*$/", $breed)) {

                        $breed = "Breed cant contain numbers";
                    } else {

                        $breed_stat = "SUCCESS";
                    }
                }

                //handling owner_id
                $owner_id = fix_data($_POST['owner_id']);

                if (!filter_var($owner_id, FILTER_VALIDATE_INT) == false && $owner_id >= 1000) {
                    $owner_id_stat = "SUCCESS";
                }


                //handling username


                //checking weight
                if (empty($_POST['weight'])) {
                    $weight_err = '* Weight is required!';
                } else {

                    $weight = fix_data($_POST['weight']);

                    if (!preg_match("/([\d+])(\.)([0-9]?)/", $weight)) {

                        $weight_err = '* Invalid weight!';
                    } else {
                        $weight_stat = "SUCCESS";
                    }

                }//end of checking weight


                echo "<div class ='error'>";


                //Result if anything was not = to Success

                if ($name_stat !== "SUCCESS") {
                    echo "<span>$pet_name_err</span><br />";
                }
                if ($breed_stat !== "SUCCESS") {
                    echo "<span>$breed_err</span><br />";
                }
                if ($weight_stat !== "SUCCESS") {
                    echo "<span>$weight_err</span> <br />";
                }
                if (empty($owner_id) && empty($username) && empty($email)) {

                    echo "<span>* Please fill in one field for user information</span>";
                }
                if ($birth_date_stat !== "SUCCESS") {

                    echo "<span>$birth_date_err</span> <br />";
                }

                //end of error checking


                //check if everything is successful
                if ($name_stat === "SUCCESS" && $breed_stat === "SUCCESS" && $weight_stat === "SUCCESS" && $birth_date_stat === "SUCCESS") {

                    $pet_info_stat = "SUCCESS";

                    if ($pet_info_stat === "SUCCESS" && ($owner_id_stat == "SUCCESS" || $username_stat === "SUCCESS" || $email_stat === "SUCCESS")) {
                        $species = $_POST['species'];
                        $gender = $_POST['gender'];
                        $color = $_POST['color'];

                    }
                    //checks which field was entered.
                    if ($owner_id !== "") {
                        //insert into pet
                        if (insert_animal_id($pet_name, $species, $breed, $gender, $color,
                                $weight, $birth_date, $owner_id) === "SUCCESS"
                        ) {


                            echo "<span style = 'color:#ffffff; font-size:50px;'> SUCCESS</span>";

                        }


                    } elseif ($username !== "") {
                        if (insert_animal_username($pet_name, $species, $breed, $gender, $color,
                                $weight, $birth_date, $username) === "SUCCESS"
                        ) {

                            echo "<span style = 'color:#ffffff; font-size:50px;'> SUCCESS</span>";
                        }
                    } else {

                        insert_animal_email($pet_name, $species, $breed, $gender, $color,
                            $weight, $birth_date, $email);
                    }
                }
            }


          echo"</div>";
         //end of checking if everything is successful
          function fix_data($data){

              $data = trim($data);
              $data = stripcslashes($data);
              $data = htmlspecialchars($data);
              return $data;
          }
          ?>

        <div class ="form_layout">
            <form id = "animal_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <h2>Pet Registration Form</h2>
            <fieldset id ='pet'>
                <legend>Pet Information</legend>
            <input type="text" name="pet_name" placeholder="Pet Name" />
            <input type ="text" name ="breed" placeholder="Breed" /><br>
            <input type="radio" name ="gender"  value ="Male" checked/>Male
            <input type="radio" name ="gender" value="Female"/> Female <br>
            <input type ="text" name ="weight" placeholder ="Weight (100.0 lbs)"/> <br>
            <input type="text" name="birth_date" placeholder="Birth Date (YYYY-MM-DD)"/><br>
            </fieldset>
            <br/>
            <fieldset id ='user'>
                <legend>User Information</legend>
            <span style="padding:5px; margin-top:7.5px;">Please enter one of the following to associate a pet with their user:</span><br>
            <input type="text" name="owner_id" placeholder="Owner ID"/> <br>
            <input type ="text" name ="username" placeholder ="Owner Username"/><br>
            <input type ="text" name="email" placeholder ="Owner Email"/><br/>
            </fieldset>
             <input type='submit' name = 'reg_pet' value = 'Register'/>
                <input type='reset' name = 'reset_btn' value = 'Reset'/>
          </form>
            </div>
    </body>
</html>
