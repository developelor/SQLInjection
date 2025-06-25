<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Setup Database</title>
  <style>
    body {
      background-color: #222;
      color: #eee;
      font-family: Arial, sans-serif;
      padding: 30px;
      text-align: center;
    }
    h1 {
      color: #ff4444;
      margin-bottom: 30px;
      font-size: 3em;
    }
    button {
      font-size: 2em;
      padding: 20px 40px;
      border: none;
      border-radius: 10px;
      background-color: #00cccc;
      color: #000;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-bottom: 30px;
    }
    button:hover {
      background-color: #009999;
    }
    #result {
      white-space: pre-wrap;
      background-color: #333;
      padding: 30px;
      border-radius: 10px;
      max-width: 900px;
      margin: auto;
      text-align: left;
      font-size: 1.5em;
      height: 400px;
      overflow-y: scroll;
      font-family: Consolas, monospace;
      line-height: 1.5em;
    }
  </style>
</head>
<body>

<h1>SQL Injection Master Setup For Labs</h1>

<button id="runSetupBtn">Run Setup</button>

<div id="result"></div>

<script>
  document.getElementById('runSetupBtn').addEventListener('click', function() {

    const resultDiv = document.getElementById('result');
    resultDiv.textContent = '';

    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'setup.php', true);

    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.LOADING || xhr.readyState === XMLHttpRequest.DONE) {
        resultDiv.textContent = xhr.responseText;
        resultDiv.scrollTop = resultDiv.scrollHeight; 
      }
    };

    xhr.onerror = function() {
      resultDiv.textContent = 'Error running setup.';
    };

    xhr.send();
  });
</script>

</body>
</html>
