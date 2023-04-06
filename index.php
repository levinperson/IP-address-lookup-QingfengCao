<!DOCTYPE html>
<html>
<head>
	<title>IP Lookup</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector("#ip-form");
            form.addEventListener("submit", function(event) {
                event.preventDefault();
                const ips = document.querySelector("#ip-input").value.split("\n");
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "lookup.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        document.querySelector("#result").innerHTML = xhr.responseText;
                    }
                };
                xhr.send("ips=" + JSON.stringify(ips));
                // xhr.send("ips=" + ips);
            });
        });
	</script>
</head>
<body>
	<h1>IP Lookup</h1>
	<form id="ip-form">
		<label for="ip-input">Enter IP addresses (one per line):</label><br>
		<textarea id="ip-input" rows="10" cols="30"></textarea><br>
		<button type="submit">Lookup</button>
	</form>
  <!-- <div id="result-container"> -->
	  <div id="result"></div>
  <!-- </div> -->
</body>
</html>