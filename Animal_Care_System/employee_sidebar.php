<link rel ="stylesheet" type ="text/css" href="form_page.css"/>
<link rel ="stylesheet" type ="text/css" href="menu_nav.css" />
<script src = 'menu_nav.js'> </script>
</head>
<div class="title_header">
   <h1> <span onclick="open_nav()">&#9776</span>Animal Care System</h1>
</div>
<div id ="menu_nav" class ="menu_nav">
    <a href="javascript:void(0)" class="close_btn" onclick="close_nav()">&times;</a>
    <span>Hello <?php echo $_SESSION['firstname'];?>! </span>
    <a href="employee_home.php"> Home</a>
    <a href="calendar.php">Schedule</a>
    <a href="new_animal.php">Register Animal</a>
    <a href="new_user.php">Register User</a>
    <a href ="search_user.php">Search</a>
    <a href="logout.php">Logout</a>
</div>