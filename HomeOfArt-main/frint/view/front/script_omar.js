function verifier()
{
	
	var titre=document.querySelector('#titre').value;
	var Description=document.querySelector('#Description').value;
	var message=document.querySelector('#message').value;


	if(titre.charAt(0)<'A' ||  titre.charAt(0) >'Z')
	{
	alert("Le titre doit commencer par une majuscule");
	return false;
	}
    
	if(Description.charAt(0)<'A' ||Description.charAt(0) >'Z')
	{
	alert("La description doit commencer par une majuscule");
	return false;
	}

	if(message.charAt(0)<'A' ||message.charAt(0) >'Z')
	{
	alert("Le message doit commencer par une majuscule");
	return false;
	}

	
	
}

