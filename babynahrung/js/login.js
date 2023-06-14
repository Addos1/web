function registration()
	{

		var name= document.getElementById("checkout_name").value;
		var uname= document.getElementById("checkout_last_name").value;
		var adress= document.getElementById("checkout_address").value;
		var zipcode= document.getElementById("checkout_zipcode").value;
		var phone= document.getElementById("checkout_phone").value;
		
		
       
		var letters = /^[A-Za-z]+$/;
		var digits = /^[0-9]+$/;
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; //для имейла

		if(name=='')
		{
			alert('Bitte geben Sie Ihren Namen ein.');
		}
		else if(!letters.test(name))
		{
			alert('Für das Namensfeld sind nur Buchstaben erforderlich.');
		}
		else if(uname=='')
		{
			alert('Bitte geben Sie den Vornamen ein.');
		}
		else if(!letters.test(uname))
		{
			alert('Für das Feld „Vorname“ sind nur Buchstaben erforderlich');
		}
		
		
		else if(adress=='')
		{
			alert('Bitte geben Sie Ihre Adresse ein.');
		}
		
		
		if(zipcode=='')
		{
			alert('Bitte geben Sie Ihren Zipcode ein.');
		}
		else if(!digits.test(zipcode))
		{
			alert('Für das Feld "Zipcode" sind nur Zahlen erforderlich.');
		}
		else if(phone=='')
		{
			alert('Bitte geben Sie den Phone ein.');
		}
		else if(!digits.test(phone))
		{
			alert('Für das Feld „Phone“ sind nur Buchstaben erforderlich');
		}
		
		
		else
		{				                            
               alert('Vielen Dank für die Anmeldung');
			
			   window.location = "checkout.php"; 
		}
	}

function eintragen()
	{

		var name= document.getElementById("checkout_name").value;
		var uname= document.getElementById("checkout_last_name").value;
		var adress= document.getElementById("checkout_address").value;
		var zipcode= document.getElementById("checkout_zipcode").value;
		var phone= document.getElementById("checkout_phone").value;
		
		
       
		var letters = /^[A-Za-z]+$/;
		var digits = /^[0-9]+$/;
		var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; //для имейла

		if(name=='')
		{
			alert('Bitte geben Sie Ihren Namen ein.');
		}
		else if(!letters.test(name))
		{
			alert('Für das Namensfeld sind nur Buchstaben erforderlich.');
		}
		else if(uname=='')
		{
			alert('Bitte geben Sie den Vornamen ein.');
		}
		else if(!letters.test(uname))
		{
			alert('Für das Feld „Vorname“ sind nur Buchstaben erforderlich');
		}
		
		
		else if(adress=='')
		{
			alert('Bitte geben Sie Ihre Adresse ein.');
		}
		
		
		if(zipcode=='')
		{
			alert('Bitte geben Sie Ihren Zipcode ein.');
		}
		else if(!digits.test(zipcode))
		{
			alert('Für das Feld "Zipcode" sind nur Zahlen erforderlich.');
		}
		else if(phone=='')
		{
			alert('Bitte geben Sie den Phone ein.');
		}
		else if(!digits.test(phone))
		{
			alert('Für das Feld „Phone“ sind nur Buchstaben erforderlich');
		}
		
		
		else
		{				                            
			   window.location = "checkout.php"; 
		}
	}
	
function abmelden()
	{		
		window.location = "checkout.php"; 
	}