function geek() {
    var doc;
    var result = confirm("Ao pressionar OK você estará confirmando a candidatura a este projeto");
    if (result == true) {
        doc = "OK was pressed.";
    } else {
        doc = "Cancel was pressed.";
    }
    document.getElementById("confirmarCandidatura").innerHTML;
}