<?php

$array = include(__DIR__ . '/../code.php');


?>


<?php

function simpleSlug($string)
{
    return preg_replace('`[^a-zA-Z0-9]`', '-', $string);
}

function renderHorizontalTable($array)
{
    $valuesBuffer = '';
    $indexBuffer = '';


    $valuesBuffer .= '<th class="type">Valeurs <i class="fas fa-caret-right"></i> </th>';
    $indexBuffer .= '<th class="type">Indexes <i class="fas fa-caret-right"></i> </th>';

    foreach ($array as $index => $value) {
        if (is_array($value)) {
            $value = renderVerticalTable($value);
            $valuesBuffer .= '<td class="index-' . simpleSlug($index) . '">' . $value . '</td>';
        }
        else {
            $valuesBuffer .= '<td class="index-' . simpleSlug($index) . '"><span class="value ' . gettype($value) . '">' . $value . '<span></td>';
        }

        $indexBuffer .= '<th title="index/clé : ' . $index . '">' . $index . '</th>';
    }

    $buffer = '<table class="horizontal">';
    $buffer .= '<tr>' . $indexBuffer . '</tr>';
    $buffer .= '<tr>' . $valuesBuffer . '</tr>';
    $buffer .= '</table>';

    return $buffer;
}

function renderVerticalTable($array)
{
    $buffer = '<table class="vertical">';
    $buffer .= '<tr>';
    $buffer .= '<th class="type">Indexes <i class="fas fa-caret-down"></i> </th>';
    $buffer .= '<th class="type">Valeurs <i class="fas fa-caret-down"></i> </th>';
    $buffer .= '</tr>';
    foreach ($array as $index => $value) {
        $buffer .= '<tr>';
        $buffer .= '<th title="index/clé : ' . $index . '">' . $index . '</th>';
        if (is_array($value)) {
            $value = renderHorizontalTable($value);
            $buffer .= '<td class="index-' . simpleSlug($index) . '">' . $value . '</td>';
        }
        else {
            if(is_bool($value)) {
                if($value === true) {
                    $value = '(bool) true';
                }
                else {
                    $value = '(bool) false';
                }
            }
            $buffer .= '<td class="index-' . simpleSlug($index) . '"><span class="value ' . gettype($value) . '">' . $value . '</span></td>';
        }

        $buffer .= '</tr>';
    }

    $buffer .= '</table>';

    return $buffer;
}


if (is_file(__DIR__ . '/../code.php')) {
    $buffer = '';
    if (is_array($array['array'])) {
        $buffer = renderHorizontalTable($array['array']);
    }

    echo $buffer;
}
?>
