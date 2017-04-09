<html>
    <head>
        <meta charset="UTF-8">
        <title>No Login!</title>
    </head>
    It seems you are not yet logged in.  Please log in to view this page.  Redirecting shortly.  Press the link below to redirect immediately.</br>
    <a href="./">Login</a>
    <?PHP
        // Waits 5 seconds then redirects to the login page
        header('Refresh: 5; URL=./');
    ?>
</html>
