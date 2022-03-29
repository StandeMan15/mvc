<!-- Footer -->
<div class="footer">
  <h2>Footer</h2>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js" integrity="sha512-XQOOk3AOZDpVgRcau6q9Nx/1eL0ATVVQ+3FQMn3uhMqfIwphM9rY6twWuCo7M69rZPdowOwuYXXT+uOU91ktLw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    tinymce.init({
    selector: 'textarea#other_product_details',
    height: 500,
    plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table paste imagetools wordcount'
    ],
    toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
    });

</script>
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