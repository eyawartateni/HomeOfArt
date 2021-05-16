
  
    function verifier(){

      var tele =parseInt(document.getElementById('tel').value);
    var  tel =tele.toString();
      var name=document.getElementById('nomLivreur').value;
      var prenom=document.getElementById('prenomLivreur').value;
      var email=document.getElementById('email').value;
      var  tel =tele.toString();
  
      if(name.length==0 || prenom.length==0 || email.length==0 || tel.length!=8) {
          
          alert("il faut remplir les champs nom et prenom et email ou verifier votre telephone");
          
           }
           
          
      }
  

