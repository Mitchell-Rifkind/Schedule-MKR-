<?php 
    require '/Applications/XAMPP/xamppfiles/htdocs/Schedule-MKR-/Database_Functions.php';
    echo $_GET['eName']; 
    echo $_GET['sHour']; 
    echo $_GET['eHour']; 
    echo $_GET['details']; 
    handle_login($validation);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <script type = "text/javascript" scr = "JS_Functions_Login.js"> </script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

        <script type="text/javascript"> // Needed in order to return to home.php or calendar-page.html with the proper values
            toCalendar();
        </script>
    </body>
</html>
