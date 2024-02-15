<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="public/css/mystyle.css" />
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <title>Hymns</title>
  </head>
  <script src="/socket.io/socket.io.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
  <script>
    function updateNumber() {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "get_numbers.php", true);
      xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
              console.log(xhr);
              if (xhr.status === 200) {
                var hymnNumbers = xhr.responseText;
                if (hymnNumbers === null) {
                  document.getElementById("engKorean").innerText = '-';
                  document.getElementById("chinese").innerText = '-';
                  document.getElementById("spanish").innerText = '-';
                } else {
                  var parts = hymnNumbers.split(',');
                  document.getElementById("engKorean").innerText = parts[0];
                  document.getElementById("chinese").innerText = parts[1] != '' ? parts[1] : '-';
                  document.getElementById("spanish").innerText = parts[2] != '' ? parts[2] : '-';
                }
              } else {
                console.log("error: " + xhr.error);
              }
          }
      };
      xhr.send();
    }
    function updateLanguage() {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "get_language.php", true);
      xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            console.log(xhr);
            if (xhr.status === 200) {
              var language = xhr.responseText;
              if(language == 'all'){
                if($('#englishSection').hasClass('nodisp')){
                  $('#englishSection').removeClass('nodisp');
                }
                if($('#chineseSection').hasClass('nodisp')){
                  $('#chineseSection').removeClass('nodisp');
                }
                if($('#spanishSection').hasClass('nodisp')){
                  $('#spanishSection').removeClass('nodisp');
                }
                $('#englishLabel').text("E / K");
              }
              else if(language == 'englishSpanish'){
                if($('#englishSection').hasClass('nodisp')){
                  $('#englishSection').removeClass('nodisp');
                }
                if(!$('#chineseSection').hasClass('nodisp')){
                  $('#chineseSection').addClass('nodisp');
                }
                if($('#spanishSection').hasClass('nodisp')){
                  $('#spanishSection').removeClass('nodisp');
                }
                $('#englishLabel').text("E");
              }
              else if(language == 'english'){
                if($('#englishSection').hasClass('nodisp')){
                  $('#englishSection').removeClass('nodisp');
                }
                if(!$('#chineseSection').hasClass('nodisp')){
                  $('#chineseSection').addClass('nodisp');
                }
                if(!$('#spanishSection').hasClass('nodisp')){
                  $('#spanishSection').addClass('nodisp');
                }
                $('#englishLabel').text("E");
              }
            } else {
              console.log("error: " + xhr.error);
            }
          }
        };
      xhr.send();
    }

    // Update number initially
    updateNumber();
    // Update number every second
    setInterval(updateNumber, 1000);
    // Update language initially
    updateLanguage();
    // Update language every second
    setInterval(updateLanguage, 1000);
  </script>
  <body class="displayContainer">
    <header>
    </header>
    <br/>

    <div class="container">
      <div class="hymns">
        <div class="langSection" id="englishSection">
          <span id="englishLabel">
            E / K
          </span>
          <hr/>
          <span id = 'engKorean'>
          -
          </span>
        </div>
        <div class="langSection" id="spanishSection"> 
          <span>
            S
          </span>
          <hr/>
          <span id = 'spanish'>
          -
          </span>
        </div>
        <div class="langSection" id="chineseSection">
          <span>
            C
          </span>
          <hr/>
          <span id = 'chinese'>
          -
          </span>
        </div>
      </div>
    </div>

  </body>

</html>



