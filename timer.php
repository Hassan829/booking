<html>

<body>
  <div>Time left = <span id="timer"></span></div>

<script type="text/javascript">
                                 function startTimer(duration, display) {
                                  var timer = duration, minutes, seconds;
                                  debugger
                                  setInterval(function () {
                                      minutes = parseInt(timer / 60, 10)
                                      seconds = parseInt(timer % 60, 10);

                                      minutes = minutes < 10 ? "0" + minutes : minutes;
                                      seconds = seconds < 10 ? "0" + seconds : seconds;

                                      display.textContent = minutes + ":" + seconds;

                                      if (--timer < 0) {
                                          timer = duration;
                                      }
                                  }, 1000);
                              }

                              window.onload = function () {
                                  var fiveMinutes = 60*5,
                                      display = document.querySelector('#timer');
                                  startTimer(fiveMinutes, display);
                              };
</script>

  <?php

 /* $start_date = new DateTime('04:10:58');
$since_start = $start_date->diff(new DateTime('10:25:00'));
echo $x = $since_start->h.' hours<br>';
echo($x *60 ).' min<br>';
echo $since_start->i.' minutes<br>';
echo $since_start->s.' seconds<br>';*/



/*date_default_timezone_set('Europe/London');
  $currentTime=time();
echo(date("h:m:s",$currentTime)."current time");
echo('<br>');
$checkInTime = "2019:06:22 11:05:00";
echo date("Y-m-d h:i:sa");
echo('<br>');

echo $endTime = date("Y-m-d H:i", strtotime('+1 hour +40 minutes', strtotime($checkInTime)));
echo('<br>');
echo substr($endTime, 11,5);
if($currentTime<$endTime)
  echo("times up");
else
  echo("arg1");*/

/*echo('<br>');
//$checkInTime = "2019:06:21 06:05:00";




$comp = getdate();
print_r($comp);
echo $comp[0];
echo('<br>');
$checkInTime = "12:25:00";
echo $endTime = strtotime('+1 hour +40 minutes', strtotime($checkInTime));
echo('<br>');
echo date("Y-m-d H:i",$endTime);
echo('<br>');
echo $jaoAb = $comp[0]-$endTime ;
echo('<br>');
echo  date("H:i:s", $jaoAb);
echo('<br>');
echo $sec = floor($jaoAb/1000);
echo('<br>');
echo $min = floor($sec/60);
echo('<br>');
echo $hours = floor($min/60);*/


die;
/*
$currentTime=time();
echo(date("Y:m:d h:m:s",$currentTime)."current time");
echo('<br>');
$checkInTime = "2019:06:21 06:05:00";
echo $endTime = date("Y-m-d H:i", strtotime('+1 hour +40 minutes', strtotime($checkInTime)));
echo('<br>');
$checkOut = date("Y:m:d h:m:s",$currentTime);
echo('<br>');

$time = strtotime('06:05:00');

echo('<br>');
echo $checkOutTime = strtotime($endTime);
echo('<br>');
echo $timeLeft =   $currentTime-$checkOutTime   ;
echo (date("h:i",$timeLeft)."Time left");
echo "<br>";
echo $time = strtotime('10:00');
echo "<br>";
echo  strtotime('-30 minutes', $time);//$startTime = date("H:i", strtotime('-30 minutes', $time));
echo "<br>";
echo strtotime('+30 minutes', $time);//$endTime = date("H:i", strtotime('+30 minutes', $time));;
echo "<br>";*/
 
/*$startTime = new DateTime("2019:06:22 06:05:00");
//echo "end time ".$endTime = date("Y-m-d H:i", strtotime('+1 hour +40 minutes', $checkInTime));
 $endTime = $startTime -> modify('+1 hour +40 minutes');
 echo "<br>";
print_r($endTime->format('Y-m-d H:i:s'));
echo "<br>";
$now = new DateTime('now');
print_r($now);
$x = $now - $endTime;
echo $cc = new DateTime($x);
 $sinceStart = $now->diff( new DateTime($endTime->format('Y-m-d H:i:s')));
// print_r($sinceStart);

echo "<br>";
echo $sinceStart->h;
echo "<br>";
echo $sinceStart->i;
echo "<br>";
echo $sinceStart->s;
echo "<br>";

*/

/*$time1 = "12:55:00";
$time2 = "01:05:00";

$t1 = strtotime($time1);


echo "</br>End:".$end = strtotime('01:05:00');
echo "</br>Floor value :".var_dump(floor((($end-$t1)/60)/60));

$hour = floor((($end-$t1)/60)/60);
echo "hours:".$hour;
*/
?>


</body>

</html>
<style type="text/css">
	

body{
  background-color:#2D3047;
}

div{
  background-color:#419D78;
  color:#EFD0CA;
  font-size:20px;
  text-align:center;
}

</style>

<!-- <script type="text/javascript">
	
	document.getElementById('timer').innerHTML = 01 + ":" + 40 + ":" + 00;
startTimer();

function startTimer() {
  var presentTime = document.getElementById('timer').innerHTML;
  var timeArray = presentTime.split(/[:]+/);
  var h = timeArray[0];
  var m = timeArray[1];
  var s = checkSecond((timeArray[2] - 1));
  if(s==59){m=m-1}
  	if(m==00){
  		h=h-1;
  		m=59;}
  //if(m<0){alert('timer completed')}
  
  document.getElementById('timer').innerHTML =
  h +" : "+  m + ":" + s;
  setTimeout(startTimer, 1000);
}

function checkSecond(sec) {
  if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
  if (sec < 0) {sec = "59"};
  return sec;
}
</script> -->