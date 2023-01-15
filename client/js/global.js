let validerMotdePass = (pw,tag) =>{
    let msgErrEnregm = "";
    let validem = true;
    if(!/[A-Z]/.test(pw)){
        validem = false;
        msgErrEnregm += "pas de lettre majuscule<br>";
    }
    if(!/[a-z]/.test(pw)){
        validem = false;
        msgErrEnregm += "pas de lettre minuscule<br>";
    }
    if(!/[0-9]/.test(pw)){
        validem = false;
        msgErrEnregm += "pas de un chiffre<br>";
    }
    if(!/[^A-Za-z0-9]/.test(pw)){
        validem = false;
        msgErrEnregm += "pas de caractere special<br>";
    }
    if(pw.length < 8){
        validem = false;
        msgErrEnregm += "au moins 8 caracteres<br>";
    }
    if(pw.length > 10){
        validem = false;
        msgErrEnregm += "au plus 10 caracteres<br>";
    }
    if(!validem){
        document.getElementById(tag).innerHTML=msgErrEnregm;
        setInterval(()=>{
            document.getElementById(tag).innerHTML="";
        }, 8000);
    }
    return validem;
}

let comparerMotdePass = (pw,pwc) =>{
    let msgErrEnregc = "";
    let validec = true;
    if(pw != pwc){
        validec = false;
        msgErrEnregc += "les mots de passe ne correspondent pas";
    }
    if(!validec){
        document.getElementById('msgErrEnregc').innerHTML=msgErrEnregc;
        setInterval(()=>{
            document.getElementById('msgErrEnregc').innerHTML="";
        }, 8000);
    }
    return validec;
}

let validerFormEnreg = () => {
    let pw = document.getElementById('motdepass').value;
    let pwc = document.getElementById('motdepassc').value;
    return validerMotdePass(pw,'msgErrEnregm') &&  comparerMotdePass(pw,pwc);
}

let validerFormCon = () => {
    let pwcon = document.getElementById('motdepasscon').value;
    return validerMotdePass(pwcon,'msgErrCon');
}