$(document).foundation()

function ClipBoard()
{
    holdtext.innerText = copytext.innerText;
    Copied = holdtext.createTextRange();
    Copied.execCommand("Copy");
}
