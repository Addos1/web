
function registration()
	{

		var name= document.getElementById("t1").value;
		var email= document.getElementById("t2").value;
		var uname= document.getElementById("t3").value;
		
		
       
		var letters = /^[A-Za-z]+$/;
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		if(name=='')
		{
			alert('Bitte geben Sie Ihren Namen ein.');
		}
		else if(!letters.test(name))
		{
			alert('Für das Namensfeld sind nur Buchstaben erforderlich.');
		}
		else if(email=='')
		{
			alert('Bitte geben Sie Ihre E-Mail ein.');
		}
		else if (!filter.test(email))
		{
			alert('Ungültige E-Mail');
		}
		else if(uname=='')
		{
			alert('Bitte geben Sie den Vornamen ein.');
		}
		else if(!letters.test(uname))
		{
			alert('Für das Feld „Vorname“ sind nur Buchstaben erforderlich');
		}
		
		
		else
		{				                            
               alert('Vielen Dank für die Anmeldung');
			
			   window.location = "index.html"; 
		}
	}
		var current= new Date()
		var day_night=current.getHours()
		if (day_night>=10 && day_night<=20)
			document.write("<img src='day.gif'>")
		else
			document.write("<img src='night.gif'>")
			
		
		   function digitalClock() {
			var date = new Date();
			var hours = date.getHours();
			var minutes = date.getMinutes();
			var seconds = date.getSeconds();
			   
			  if (hours < 10) hours = "0" + hours;
			  if (minutes < 10) minutes = "0" + minutes;
			  if (seconds < 10) seconds = "0" + seconds;
				document.getElementById("id_clock").innerHTML = hours + ":" + minutes + ":" + seconds;
				setTimeout("digitalClock()", 1000);}