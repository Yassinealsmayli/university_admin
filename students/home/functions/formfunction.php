<?php
function form($action,$methode,$legend)
{
    $code = "<form action=\"$action\" method=\"$methode\" >\n";
    $code.="<fieldset><legend>$legend</legend>\n";
    return $code;
}
//Definition de la fonction text
function text($libtexte,$montexte)
{
    $code="<label><b> $libtexte </b></label>
           <input type=\"text\" name=\"$montexte\" placeholder=\"$montexte\" />\n";
    return $code;
}
function numbers($libnums,$monnums)
{
    $code="<label><b> $libnums </b></label>
    <input type=\"number\" name=\"$monnums\" min=\"0\" placeholder=\"$monnums\" />\n";
return $code;
}
function phonenumbersLebanon($label, $placeholder)
{
    $code = "<label><b> $label </b></label>
             <input type=\"tel\" name=\"$placeholder\" pattern=\"[0-9]{8}\" placeholder=\"$placeholder\" />\n";
    return $code;
}

function homePhoneNumbersLebanon($label, $placeholder)
{
    $code = "<label><b> $label </b></label>
             <input type=\"tel\" name=\"$placeholder\" pattern=\"[0-9]{8}\" placeholder=\"$placeholder\" />\n";
    return $code;
}
function comboBox($label, $name, $options)
{
    $code = "<label><b>$label</b></label>
             <select name=\"$name\">\n";
    
    $code .= "<option value=\"\" disabled selected hidden>$label</option>\n";

    foreach ($options as $value => $text) {
        $code .= "<option value=\"$value\">$text</option>\n";
    }

    $code .= "</select>\n";

    return $code;
}
function dates($libdate,$mondate)
{
    $code="<label><b> $libdate </b></label>
           <input type=\"date\" name=\"$mondate\" />\n";
    return $code;
}
//Definition de la fonction radio
function radio($libradio,$monradio)
{
    $code="<label><b> $libradio </b></label>
           <input type=\"radio\" name=\"$monradio\" />\n";
    return $code;
}
function submit($libsubmit,$monsubmit)
{
    $code="<label><b> $libsubmit </b></label>
           <input type=\"submit\" value=\"$monsubmit\" />&nbsp;\n";
    return $code;
}

function resett($libreset,$monreset)
{
    $code="<label><b> $libreset </b></label>
    <input type=\"reset\" value=\"$monreset\" /><br />\n";
    return $code;
}
function pass($libpass)
{
    $code="<label><b> $libpass </b></label>
    <input type=\"pass\"  /><br />\n";
    return $code;
}
function confirmPass($libpass,$monPass)
{
    $code="<label><b> $libpass </b></label>
    <input type=\"pass\"  /><br />\n";
    return $code;
}
//Definition de la fonction fin form
function finForm()
{
    $code="</fieldset></form>\n";
    return $code;
}
?>
