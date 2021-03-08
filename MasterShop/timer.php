<!doctype html>
<html>
<head>

  <meta charset="UTF-8">
  <script src="jquery-1.8.2.min.js"></script>
  <title>Document</title>

  <style>
    .timer {
        width: 60%;
        margin: 0 auto;
        font-size: 36px;
        text-align: center;
    }

  </style>
</head>
<body>

<div class="timer">
  <span id="hour">18</span>
  <span>:</span>
  <span id="min">30</span>
  <span>:</span>
  <span id="sec">45</span>
</div>


<div id="res">
adas
</div>


<script>

  setInterval(function(){
    var hour = document.getElementById("hour").innerHTML;
    var minn = document.getElementById("min").innerHTML;
    var sec = document.getElementById("sec").innerHTML;

    if (sec == 0) {
      if (minn!= 0){
        var showH = hour;
        var showM = document.getElementById("min").innerHTML = minn-1;
        var showS = document.getElementById("sec").innerHTML = 59;
      }
      else
      {
        var showH = document.getElementById("hour").innerHTML = hour-1;
        var showM = document.getElementById("min").innerHTML = 59;
        var showS = document.getElementById("sec").innerHTML = 59;
      }
    }
    else
    {
      var showH = hour;
      var showM = minn;
      var showS = document.getElementById("sec").innerHTML = sec-1;
    }

    $.post("settimer.php",{showS:showS,showM:showM,showH:showH},function(data){   $("#res").html(data);   });

  },1000);

</script>

</body>
</html>