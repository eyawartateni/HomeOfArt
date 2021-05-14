function verifier()
{
	
	var titre=document.querySelector('#titre').value;
	var Description=document.querySelector('#Description').value;
   

	if(titre.charAt(0)<'A' ||  titre.charAt(0) >'Z')
	alert("Le titre doit commencer par une majuscule");
	
    
	if(Description.charAt(0)<'A' ||Description.charAt(0) >'Z')
	alert("La description doit commencer par une majuscule");
	

	
	
}

