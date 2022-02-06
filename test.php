<style type="text/css">
#clockdiv h2{font-family:'Roboto';font-weight:100;color:#034688;text-align:center;font-size:40px;margin:0 0 16px}
#clockdiv{font-family:sans-serif;color:#fff;background:rgba(255,255,255,0.63);display:inline-block;font-weight:100;text-align:center;font-size:30px;margin:20px auto;padding:20px;width:100%}
#clockdiv > div{padding:10px 35px;border-radius:3px;background:#034688;display:inline-block}
#clockdiv div > span{padding:0;border-radius:3px;font-size:58px;display:inline-block}
#clockdiv .smalltext{padding-top:5px;font-size:16px}
</style>

<div id="clockdiv">
  <h2>Countdown Clock</h2>
  <div>
    <span class="minutes"></span>
    <div class="smalltext">Minutes</div>
  </div>
  <div>
    <span class="seconds"></span>
    <div class="smalltext">Seconds</div>
  </div>
</div>
 
    <script type='text/javascript'>
//<![CDATA[
function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 60);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  return {
    'total': t,
    'days': days,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var daysSpan = clock.querySelector('.days');
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

    minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
      clock.style.display = "none";
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(Date.parse(new Date()) +  60 * 1000);
initializeClock('clockdiv', deadline);
//]]>
</script>