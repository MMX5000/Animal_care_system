<?php
require 'connection.php';
session_start();
$visit_id = (int) $_SESSION['visit_id'];
$pro_id = (int) $_SESSION['pro_id'];
if($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['drug'])) {
        //if drug id isset
        $drugid = (int)$_POST['drug'];
    }
    if (isset($_POST['quantity'])) {
        //if quantity is set
        $quantity = (int)$_POST['quantity'];
    }
    if (empty($_POST['instructions'])) {
        //if instructions are empty set an error message
        $err_msg = "Must enter in instructions for medication";
    } else {

        $instructions = $_POST['instructions'];
    }
    if (insert_medication($drugid, $quantity, $instructions, $pro_id, $visit_id) === "SUCCESS") {
        header("Location:view_medications.php");
    }
}



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
    <select name = 'drug'>
        <?php
            $drug = get_drug();
            while($row = mysqli_fetch_assoc($drug)){
                echo '<option value =' . $row['DrugId'] . ">" . $row['name'] ." " . $row['dosage'] ."</option>";
            }
        ?>
    </select>
        <br>
    <script>
        //adds select tag to page and loops from numbers 0-100 for quantity
        $("<select name = 'quantity'  id ='quantity'> </select>").appendTo('form');
        for(var i = 0; i<=100; i++){

            $("#quantity").append("<option value =" + i +">" + i + "</option>");
        }
    </script>
        <br>

    <textarea name = 'instructions'rows = "6" cols="50">
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

    function insert_medication($drugid,$quantity,$instructions,$pro_id,$visit_id){

        $query = "INSERT INTO medication(DrugId,Quantity,Instructions,ProcedureId,VisitId) VALUES ($drugid,$quantity,'$instructions',$pro_id,$visit_id)";

        if(mysqli_query($GLOBALS['conn'],$query)){

            return "SUCCESS";
        }else{

            return "FAILURE";
        }


    }

?>