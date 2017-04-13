
<link rel ="stylesheet" type="text/css" href="menu_nav.css"> </link>
<script src="menu_nav.js"> </script>
<div class ="container"> 
<div class="title_header">
<h1> <span onclick="open_nav()">&#9776</span>Animal Care System</h1>
</div>

<div id ="menu_nav" class ="menu_nav">
    <a href="javascript:void(0)" class="close_btn" onclick="close_nav()">&times;</a>
    <span>Hello <?php echo $_SESSION['firstname'] ?>!</span>
    <a href="user_home.php"> Home</a>
    <a href="view_my_pets.php">View Pets</a>
    <a href="client_pet_appointments.php">Appointments</a>
    <a href="logout.php">Logout</a>
</div> 