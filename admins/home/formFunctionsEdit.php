<?php
// Define form-related functions
function text($name, $label, $value = '') {
    return "
        <label for='$name'>$label</label>
        <input type='text' name='$name' id='$name' value='$value'>
    ";
}

function dates($name, $label, $value = '') {
    return "
        <label for='$name'>$label</label>
        <input type='date' name='$name' id='$name' value='$value'>
    ";
}

function numbers($name, $label, $value = '') {
    return "
        <label for='$name'>$label</label>
        <input type='number' name='$name' id='$name' value='$value'>
    ";
}

function phonenumbersLebanon($name, $label, $value = '') {
    return "
        <label for='$name'>$label</label>
        <input type='tel' name='$name' id='$name' pattern='\\+961[0-9]{8}' value='$value' placeholder='+961XXXXXXXX'>
    ";
}


function comboBox($name, $label, $options, $selected = '') {
    $html = "<label for='$name'>$label</label><select name='$name' id='$name'>";
    foreach ($options as $key => $option) {
        $isSelected = ($key == $selected) ? 'selected' : '';
        $html .= "<option value='$key' $isSelected>$option</option>";
    }
    $html .= "</select>";
    return $html;
}
?>