<?php 
    $eName = $_POST['eName']; 
    $sHour = $_POST['sHour']; 
    $eHour = $_POST['eHour']; 
    $details = $_POST['details']; 
    $days;
    if(isset($POST["monday"])){
    $days = $days.="monday";
    } 
    if (isset($POST["tuesday"])){
    $days = $days.="tuesday";
    } 
    if (isset($POST["wednesday"])){
    $days = $days.="wednesday";
    }
    if (isset($POST["thursday"])){
    $days = $days.="thursday";
    }
    if (isset($POST["friday"])){
    $days = $days.="friday";
    } 
    if (isset($POST["saturday"])){
    $days = $days.="saturday";
    } 
    if (isset($POST["sunday"])){
    $days = $days.="sunday";
    } 
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

