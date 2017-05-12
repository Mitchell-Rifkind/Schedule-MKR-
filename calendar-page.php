<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title> Calender </title>

  </head>
  <body>
    <?php session_start(); ?>
    <h2>Welcome <?= $_SESSION["email"]; ?></h2>
    <div Calender>
      <iframe src="https://docs.google.com/spreadsheets/d/1OMBF888I97N6cMlp3gJPU4VDj8U4RFxZ1IV4bAQNqz4/pubhtml?gid=0&single=true" width ="800" height="800">
      </iframe>
    </div>
    <div Logout>
      <input type="submit" value="Logout"/>

    </div>
    <div Create New Event +>
      <input type="submit" value="Create New Event +" />
    </div>
    <div Event box>
      <textarea rows="6" cols="20">
        Type event details here.
      </textarea>
    </div>
  </body>
</html>
