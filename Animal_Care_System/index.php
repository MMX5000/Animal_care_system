
<!DOCTYPE html>
<!--
Creator: Ryan Claude Fox
Version:1.0
Date:3/2/17
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Animal Care System Log in</title>
        <link rel="stylesheet" type="text/css" href="index.css" />
        <style>
              html,body
            { 
                margin:0;
                width:100%;
                height:100%;
              
            }
            
               .bg{
                
               background: url("images/index_background.jpg");
                 height:100%;
                 width:100%;
                 background-size:cover;
                 background-position:center;
                 background-repeat: no-repeat;
            }
        </style>
    </head>
    <body class = "bg">
        <h1>Animal Care System</h1>
        <div>
            <form method="post" action = 'index_login.php'>
                <br>
                <span style = "text-align:center;text-decoration:underline;">Sign In</span><br>
                <br>
            <span>Username/ID</span><input type="text" name="username" placeholder="Username"/><br>
            <span>Password</span><input type="password" name="password" placeholder="Password"/><br>
            <input type="submit"name ="login_btn" value="Log In"/><br>
        </form>
        </div>
    </body>
</html>
