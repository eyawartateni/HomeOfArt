function verifier()
{
	
	var etat=document.getElementById('etat').value;
	
	if(etat.charAt(0)<'A' ||  etat.charAt(0) >'Z')
    {
	alert("L'etat doit commencer par une majuscule");
    return false;
    }
}

