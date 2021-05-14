
  function verifier(){
    var tele =parseInt(document.getElementById('tel').value);
    var name=parseInt(document.getElementById('nomLivreur').value);
    var  tel =tele.toString();

    if(tel.length!=8) {
        
        alert("verifier telephone : il doit etre de 8 chiffres");
        return true;
         }
    }

