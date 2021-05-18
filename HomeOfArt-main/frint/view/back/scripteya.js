function verifier()
{
	
	var nom=document.querySelector('#nom_event').value;
	
    var type=document.querySelector('#type_event').value;
	var date=document.querySelector('#date_event').value;
    var nbre=document.querySelector('#nbre_participants').value;
	
    
	
	if(nom.length==0 || type.length==0 || date.length==0 || nbre.length==0 || artiste.length==0)
	{
		alert("les champs sont vide");
        return false;
	}

	if(nom.charAt(0)<'A' ||  nom.charAt(0) >'Z')
	{
	alert("Le nom doit commencer par une majuscule");
	return false;
	}
    
	
	
	
}