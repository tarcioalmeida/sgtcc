function openForm2() {
    document.getElementById("gerenciarUsuario").style.display="none";
}
function importarUsuario(campo) {
    const display = document.getElementById(campo).style.display;
    if(display=="none"){
        document.getElementById(campo).style.display='block';
    }else{
        document.getElementById(campo).style.display='none';
    }
}
/* Máscaras ER */
function MascaraTelefone(tel){
    if(mascaraInteiro(tel)==false){
        event.returnValue = false;
    }
    return formataCampo(tel, '(00) 0000-0000', event);
}



