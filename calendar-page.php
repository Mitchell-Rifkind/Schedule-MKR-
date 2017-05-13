<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="home_styles.css">
  </head>
  <body>

    <?php
      $details = "Web Programming";
      $time = (18, 20);
      $days = ("Wednesday", "Friday");

      class event {
        public $start;
        public $end;
        public $days;
        public $details;

        public function __construct($start, $end, $days, $details) {
          $this->start = $start;
          $this->end = $end;
          $this->days = $days;
        }
      }

     ?>

    <table class="schedule">
      <tr>
        <th></th><th>Sunday</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th>
      </tr>
      <?php
        $period = "a.m.";
        $check = 0;

        for ($i=6; $i <= 12; $i++) {
          if ($i == 12 && $period === "a.m.") {
            $period = "p.m.";
          } elseif ($i == 12 && $period == "p.m.") {
            $period = "a.m.";
          }
          ?>
          <tr id="eachHour">
            <th id="time"><?= $i ?>:00 <?= $period ?></th><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
          </tr>
          <?php
          if ($i == 12 && $check == 0) {
            $i = 0;
            $check = 1;
          }
        }
       ?>
    </table>

    </div>
  </body>
</html>
