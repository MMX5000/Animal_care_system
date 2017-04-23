<?php
require 'connection.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert New Medication</title>
    <link rel="stylesheet" type="text/css" href="form_page.css" />
    <script src = 'jquery-3.1.1.js'></script>
    <script src="medication.js"></script>

    <style>

        body{
        background: url(images/medication.jpg) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        margin:0;
        }

    </style>
</head>
<body>
<?php
require 'sidebar.php';
require 'is_employee.php';
?>
<div class="form_layout">
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <h2>Insert Medication</h2>
    <select>
        <?php
            $drug = get_drug();
            while($row = mysqli_fetch_assoc($drug)){
                echo '<option value =' .$row['DrugId'] . ">" . $row['name'] ." " . $row['dosage'] ."</option>";
            }
        ?>
    </select>
        <br>
    <script>
        //adds select tag to page and loops from numbers 0-100 for quantity
        $("<select id ='quantity'> </select>").appendTo('form');
        for(var i = 0; i<=100; i++){

            $("#quantity").append("<option value =" + i +">" + i + "</option>");
        }
    </script>
        <br>

    <textarea rows = "6" cols="50">
      Instructions for medication..

    </textarea><br/>
    <input type = 'submit' name = 'submit_btn' value ='Insert Medication'/> <br>
    <input type ='reset' name = 'reset_btn' value="Reset"/>

    </form>
</div>

</body>
</html>

<?php
    function get_drug()
    {

        $query = "SELECT DrugId, name, dosage from drug";

        $result = mysqli_query($GLOBALS['conn'], $query);

        if (!$result) {
            echo mysqli_error();

        }

        return $result;

    }

    function insert_medication(){


    }
?>