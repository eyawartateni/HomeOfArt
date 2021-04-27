
  function verifier(){
    var tele =parseInt(document.getElementById('tel').value);
    var  tel =tele.toString();

    if(tel.length==8) {
        
       alert("valider");
               
        } else {
        alert("verifier telephone : il doit etre de 8 chiffres")
         }
    }

