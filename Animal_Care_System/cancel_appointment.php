<?php error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the session
session_start();
// Get the connection information
require_once 'connection.php';
//get the current appointment id
$appointmentid = $_GET['appointmentid'];
// Get the client id to confirm client has permission to cancel it
$clientid = $_SESSION['id'];
// Create the query to check if this appointment is valid
$query = "SELECT * FROM appointment ap WHERE appointmentid = \"$appointmentid\" AND clientid = \"$clientid\"";
// Run the query
$result = mysqli_query($conn, $query);print_r(mysqli_fetch_array($result));
// Check the number of results.  There should be exactly one appointment with this id for this userid
if (mysqli_num_rows($result) == 1){
    // Create the query to remove the appointmentprocedurecode
    $query = "DELETE FROM appointmentprocedurecode WHERE appointmentprocedurecode.appointmentid = \"$appointmentid\"";
    // Run the delete command
    mysqli_query($conn, $query);
    // Create the query to remove the appointment
    $query = "DELETE FROM appointment WHERE appointment.appointmentid = \"$appointmentid\"";
    // Run the delete command
    mysqli_query($conn, $query);
}
// Redirect them back
header("location: ./client_pet_appointments.php");
?>