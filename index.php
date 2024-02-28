<!DOCTYPE html>
<html>
  <head>
    <title>Hymns</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="public/css/mystyle.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  </head>

  <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
  <body>
    <header
    </header>
    <br/>
    <div class="container">
    <div class="row">

    <div class="col-lg-4">
      <h1>Hymns</h1>
      <form id="numberForm">
        <div class="form-group">
          <label for="number">Hymn Number</label>
          <input type="number" pattern="\d* "id="number" name="number" class="form-control" placeholder="1-1348" min = "1" max = "1348" style='width:20em' autofocus required/>
        </div>
        <button id='form' input type = 'submit' class="btn btn-secondary" >Submit</button>
      </form>
      <button id='clear-display-button' class="btn btn-secondary" >Clear Number</button>
      <br />
      <br />
      <form id="langForm">
        <div class="form-group">
          <label for="language">Languages shown</label>
          <select id="language" name="language" class="form-control" style='width:20em'>
            <option value="all">All</option>
            <option value="englishSpanish">English and spanish</option>
            <option value="english">English only</option>
          </select>
        </div>
        <button id='form' input type = 'submit' class="btn btn-secondary" >Change display</button>
      </form>
    </div>
    </div>

    <a id='display-button' class="btn btn-secondary" href="/display.php" >Go to display</a>

    <script>
      // handle number submission
      document.getElementById("numberForm").addEventListener("submit", function(event) {
          event.preventDefault();
          var formData = new FormData(this);
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "change_number.php", true);
          xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                  console.log(xhr);
                  if (xhr.response != "") {
                    alert("Error: " + xhr.responseText)
                  }
              }
          };
          xhr.send(formData);
          document.getElementById("number").value = "";
      });
      // handle language submission
      document.getElementById("langForm").addEventListener("submit", function(event) {
          event.preventDefault();
          var formData = new FormData(this);
          var xhr = new XMLHttpRequest();
          xhr.open("POST", "change_language.php", true);
          xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                  console.log(xhr);
                  if (xhr.response != "") {
                    alert("Error: " + xhr.responseText)
                  }
              }
          };
          xhr.send(formData);
      });
      // handle clear
      document.getElementById('clear-display-button').addEventListener('click', function() {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'clear_number.php', true);
            xhr.onreadystatechange = function() {
              if (xhr.readyState === XMLHttpRequest.DONE) {
                  console.log(xhr);
                  if (xhr.response != "") {
                    alert("Error: " + xhr.responseText)
                  }
              }
            };
            xhr.send();
        });
    </script>
  </body>

</html>