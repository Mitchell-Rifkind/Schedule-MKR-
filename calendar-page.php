<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="home_styles.css">
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
      <table id="schedule">
      <tr>
        <th>Sunday</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>thursday</th><th>Friday</th><th>Saturday</th>
      </tr>
      <?php
        $check = 0;
        for ($i=6; $i <= 12; $i+=1) {
          ?>
          <tr>
            <td><?= $i ?>:00</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
          </tr>
          <?php
          if ($i == 12 && $check != 1) {
            $i = 0;
            $check =1;
          }
        }
       ?>
    </table>

  </body> 
</html>
