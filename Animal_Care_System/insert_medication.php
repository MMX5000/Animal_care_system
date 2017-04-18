<?php
require 'connection.php';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert New Medication</title>

</head>
<body>
<?php require 'sidebar.php';
require 'is_employee.php';?>
<div>
    <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

    <select>
        <?php
            $drug = get_drug();
            while($row = mysqli_fetch_assoc($drug)){
                echo '<option value =' .$row['DrugId'] . ">" . $row['name'] . $row['dosage'] ."</option>";
            }
        ?>
    </select>



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
?>