<?php
    $page = "ABay Events";
    $path = "./";
    $heroimg = 'src="assets/images/ray-hennessy-gdTxVSAE5sk-unsplash.jpg" alt="Fireworks Over Water"';
    $herotxt = '<h1>Events</h1>';
    // header, nav, and hero includes
    include($path."assets/inc/header.php");
    include($path."assets/inc/nav.php");
    include($path."assets/inc/hero.php");

    // main content from database
    // connect to db
    include('../../../dbCon.php');
    // build query
    $sql = "SELECT content FROM finalContent WHERE page= '".$page."'";
    // execute query
    $result = $mysqli->query($sql);
    while($row = $result->fetch_assoc()) {
        echo $row['content'];
    }
    // close connection
    $mysqli->close();
?>

<script>
/* events.php: Countdown to 4th of July */
// Set the date we're counting down to
var countDownDate = new Date("Jul 4, 2021 21:00:00").getTime();
// Get the element with id="countdown"
var countdownEl = document.getElementById("countdown");

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="countdown"
  countdownEl.innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If current day is 4th of July, change the countdown color
  if(days < 1) {
      countdownEl.style.color = "orangered";
      countdownEl.style.fontWeight = "bold";
  }

  // If the count down is finished, write some text and change the style
  if (distance < 0) {
    clearInterval(x);
    countdownEl.innerHTML = "ENJOY THE SHOW!";
    countdownEl.style.fontSize = "2em";
    countdownEl.style.color="red";
    document.getElementById("fireworks-container").style.display="flex";
  }
}, 1000);
</script>

<?php
    // footer include
    include($path."assets/inc/footer.php");
?>

