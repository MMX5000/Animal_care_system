<?php

    require 'connection.php';
    
    function insert_animal_id($pet_name, $species, $breed, $gender, $color, $weight,$birth_date, $owner_id){
        
        $conn = $GLOBALS["conn"];
        $floatweight = (float)$weight;

        $query = "INSERT INTO pet (`Name`, `SpeciesId`, `Breed`, `Sex`, `Color`, `Weight`, `BirthDate`, `ClientId`) VALUES ('$pet_name', (SELECT speciesid from species where name = '$species'), '$breed', '$gender', '$color', $floatweight, '$birth_date', '$owner_id')";
        
        if(mysqli_query($conn, $query)){

            return "SUCCESS";
                    
                
        }else{
            echo "Error:" . mysqli_error($conn);
            
        }
        mysqli_close($conn);
    }

    function insert_animal_username($pet_name, $species, $breed, $gender, $color, $weight,$birth_date, $username){

        $conn = $GLOBALS["conn"];
        $floatweight = (float)$weight;

        $username_query = "SELECT ClientId from client where Username = '$username'";
        $result = mysqli_query($conn, $username_query);

        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){

                $owner_id = $row['ClientId'];
            }
        }



        $query = "INSERT INTO pet (`Name`, `SpeciesId`, `Breed`, `Sex`, `Color`, `Weight`, `BirthDate`, `ClientId`) VALUES ('$pet_name', (SELECT speciesid from species where name = '$species'), '$breed', '$gender', '$color', $floatweight, '$birth_date', $owner_id)";

        if(mysqli_query($conn, $query)){

            return "SUCCESS";


        }else{
            echo "Error:" . mysqli_error($conn);

        }

        mysqli_free_result($result);
        mysqli_close($conn);
    }

    function insert_animal_email($pet_name, $species, $breed, $gender, $color, $weight,$birth_date, $email)
    {
        $conn = $GLOBALS["conn"];
        $floatweight = (float)$weight;

        $email_query = "SELECT ClientId FROM client WHERE Email = '$email'";

        $result = mysqli_query($conn,$email_query);



        if(mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){

                $owner_id = $row['ClientId'];
            }
        }

        $query = "INSERT INTO pet (`Name`, `SpeciesId`, `Breed`, `Sex`, `Color`, `Weight`, `BirthDate`, `ClientId`) VALUES ('$pet_name', (SELECT speciesid from species where name = '$species'), '$breed', '$gender', '$color', $floatweight, '$birth_date', $owner_id)";
        if(mysqli_query($conn, $query)){

            return "SUCCESS";

        }else{
            echo "Error:" . mysqli_error($conn);

        }
        mysqli_free_result($result);
        mysqli_close($conn);
    }
?>