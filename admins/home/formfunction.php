<?php

function form($action, $method, $legend)
{
    $code = "<form action=\"$action\" method=\"$method\">\n";
    $code .= "<fieldset><legend>$legend</legend>\n";
    return $code;
}

function text($label, $placeholder)
{
    $code = "<label for=\"$label\"><b>$label</b></label>
           <input type=\"text\" name=\"$label\" id=\"$label\" placeholder=\"$placeholder\" />\n";
    return $code;
}

function numbers($label, $placeholder)
{
    $code = "<label for=\"$label\"><b>$label</b></label>
    <input type=\"number\" name=\"$label\" id=\"$label\" min=\"0\" placeholder=\"$placeholder\" />\n";
    return $code;
}

function phonenumbersLebanon($label, $placeholder)
{
    $code = "<label for=\"$label\"><b>$label</b></label>
             <input type=\"tel\" name=\"$label\" id=\"$label\" placeholder=\"$placeholder\" pattern=\"[0-9]{8}\" />\n";
    return $code;
}

function homePhoneNumbersLebanon($label, $placeholder)
{
    $code = "<label for=\"$label\"><b>$label</b></label>
             <input type=\"tel\" name=\"$label\" id=\"$label\" pattern=\"[0-9]{8}\" placeholder=\"$placeholder\" />\n";
    return $code;
}

function comboBox($label, $name, $options)
{
    $code = "<label for=\"$name\"><b>$label</b></label>
             <select name=\"$name\" id=\"$name\">\n";
    
    $code .= "<option value=\"\" disabled selected hidden>$label</option>\n";

    foreach ($options as $value => $text) {
        $code .= "<option value=\"$value\">$text</option>\n";
    }

    $code .= "</select>\n";

    return $code;
}

function dates($label, $name)
{
    $code = "<label for=\"$name\"><b>$label</b></label>
           <input type=\"date\" name=\"$name\" id=\"$label\" placeholder=\"$name\" />\n";
    return $code;
}

function radio($label, $name)
{
    $code = "<label for=\"$name\"><b>$label</b></label>
           <input type=\"radio\" name=\"$name\" id=\"$name\" />\n";
    return $code;
}

function submit($label, $value)
{
    $code = "<label for=\"$value\"><b>$label</b></label>
           <input type=\"submit\" value=\"$value\" id=\"$value\" />&nbsp;\n";
    return $code;
}

function resett($label, $value)
{
    $code = "<label for=\"$value\"><b>$label</b></label>
    <input type=\"reset\" value=\"$value\" id=\"$value\" /><br />\n";
    return $code;
}

function pass($label)
{
    $code = "<label for=\"$label\"><b>$label</b></label>
    <input type=\"password\" name=\"$label\" id=\"$label\" /><br />\n";
    return $code;
}

function confirmPass($label, $value)
{
    $code = "<label for=\"$value\"><b>$label</b></label>
    <input type=\"password\" name=\"$label\" id=\"$label\" /><br />\n";
    return $code;
}

function finForm()
{
    $code = "</fieldset></form>\n";
    return $code;
}
?>
