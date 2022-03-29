<!-- Footer -->
<div class="footer">
  <h2>Footer</h2>
</div>

<script>
function loadDoc($url) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("main").innerHTML =
    this.responseText;
  }
  xhttp.open("GET", $url);
  xhttp.send();
}

function aboutTxt($txt) {
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("side h2").innerHTML = "about you"
    this.responseText;
  }
  xhttp.open("GET", $txt);
  xhttp.send();
}
</script>
</body>
</html>