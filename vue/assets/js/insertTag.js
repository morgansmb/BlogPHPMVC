function insertTag(startTag, endTag, textareaId) {
    var field  = document.getElementById(textareaId);//recupere la zone de texte
    field.focus();
    var startSelection   = field.value.substring(0, field.selectionStart);//patie du texte du debut du texte(0) au curseur ou à la selection(n ème caractère)
    var currentSelection = field.value.substring(field.selectionStart, field.selectionEnd);//partie selectionnée || si pas de selection= position curseur (selectionstart=selectionend
    var endSelection     = field.value.substring(field.selectionEnd);//du dernier caractere selectionné à la fin

    if(startTag == ':' || startTag == ';') {
        field.value = startSelection + startTag + endTag + endSelection;
        field.focus();
        field.setSelectionRange(startSelection.length + startTag.length + endTag.length, startSelection.length + startTag.length + endTag.length);//met le curseur après le smiley
    }
    else {
        field.value = startSelection + startTag + currentSelection + endTag + endSelection;
        field.focus();
        field.setSelectionRange(startSelection.length + startTag.length, startSelection.length + startTag.length + currentSelection.length);//remet la selection comme elle etait @param(numéro 1er caractère selectionné, numéro dernier caractère selectionné)
    }
}
