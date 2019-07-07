<button onclick="onTimer()">Clickme</button>
<div id="mycounter"></div>
<script>
i = 1;
function onTimer() {
  document.getElementById('mycounter').innerHTML = i;
  i--;
  if (i < 0) {
    alert('You lose!');
    document.close();
  }
  else {
    setTimeout(onTimer, 1000);
  }
}
</script>