<!DOCTYPE html>

  <html>
  <head>
  <title>Registration</title>
  <link rel="stylesheet" type="text/css" href="Login.css">
  <meta charset="utf-8">
  

  </head>

	<body>
		<script src="Login.js" type="text/javascript"> </script>
		<div id="id_clock"></div>
		<script>digitalClock();</script>
		
		<div id="main">
		
		<div class="h-tag">
		<h2>Erstellen Sie Ihr Account</h2>
		</div>
		
		 <form name="myForm" action="index_form_process.php" onsubmit="return validateForm()" method="post">
		 
		<div class="login">
		<table cellspacing="2" align="center" cellpadding="8" border="0">
		<tr>
		<td align="right">Name eingeben:</td>
		<td><input type="text" placeholder="Geben hier den Namen ein" id="t1" class="tb" name="name" /></td>
		</tr>	
		<td align="right">Vorname eingeben:</td>
		<td><input type="text" placeholder="Geben hier den Vornamen ein" id="t3" class="tb" name="fname" /></td>
		</tr>
		<tr>
		<td align="right">E-Mail eingeben:</td>
		<td><input type="text" placeholder="Geben hier E-Mail ein" id="t2" class="tb" name="Email" /></td>
		</tr>
		<tr>
		<td></td>
		<td>
		<input type="submit" value="Anmelden" class="btn" onclick="registration()" /></td>
		</tr>
		</table>
		</form>
		
		<div class="php_data">
          <div class="php_data">
            <h1>Registrierte Benutzer:</h1>
            <?php
              $server = "localhost";
              $user = "root";
             
            
              $verbindung = mysqli_connect($server, $user, $pass) or die("Keine Verbindung!");
          
              mysqli_select_db($verbindung, "users");
              $sql = "SELECT * FROM tuser";
              $query = mysqli_query($verbindung, $sql) or die("Query hat nicht funktioniert!");
              $anzahl = mysqli_num_rows($query);

              while ($zeile = mysqli_fetch_array($query)) {
                echo $zeile["name"] . ", "
                . $zeile["fname"] . ", "
                . $zeile["Email"] . "<br>";
              }
            ?>
          </div>
        </div>
		
		<div class="scroll-left">
			<p>Gewinnen Sie attraktive Preise durch die Teilnahme an der Umfrage!!!</p>	
		</div>
		
	</body>
</html>
