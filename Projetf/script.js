function test()
{
    var nom=f.nom.value
    var prenom=f.prenom.value
    var email=f.email.value
    var pass=f.pass.value
    var login=f.login.value
    if(login.length==0 || pass.length==0 || email.length==0 || nom.length==0 || prenom.length==0)
    {
        alert("les champs sont vide")
    }
    else if(pass.length<8)
        alert("tapez un mot de passe avec 8 caracetere au minimum")
    else if(email.substring(email.indexOf('@'))!='@esprit.tn')
    {
        console.log(email.substring(email.indexOf('@')))
        alert("tapez un email de esprit")
    }
    else
    {
        alert("succes !!")
    }


}