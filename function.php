<?php

function simpleSlug($string)
{
    return preg_replace('`[^a-zA-Z0-9]`', '-', $string);
}

function renderHorizontalTable($array, $path = '')
{
    $valuesBuffer = '';
    $indexBuffer = '';


    $valuesBuffer .= '<th class="type">Valeurs<i class="fas fa-caret-right"></i> </th>';
    $indexBuffer .= '<th class="type">Indexes<i class="fas fa-caret-right"></i> </th>';

    foreach ($array as $index => $value) {

        $key = $index;
        if (!is_int($index)) {
            $key = "'" . $index . "'";
        }
        $currentPath = $path . '[' . $key . ']';

        if (is_array($value)) {
            $value = renderVerticalTable($value, $currentPath);
            $valuesBuffer .= '<td class="index-' . simpleSlug($index) . '">' . $value . '</td>';
        }
        else {
            $valuesBuffer .= '<td class="array-value index-' . simpleSlug($index) . '" data-path="' . $currentPath . '"><span class="value ' . gettype($value) . '">' . $value . '<span></td>';
        }

        $indexBuffer .= '<th title="index/clé : ' . $index . '">' . $index . '</th>';
    }

    $buffer = '<table class="horizontal">';
    $buffer .= '<tr>' . $indexBuffer . '</tr>';
    $buffer .= '<tr>' . $valuesBuffer . '</tr>';
    $buffer .= '</table>';

    return $buffer;
}

function renderVerticalTable($array, $path = '')
{
    $buffer = '<table class="vertical">';
    $buffer .= '<tr>';
    $buffer .= '<th class="type">Indexes<i class="fas fa-caret-down"></i> </th>';
    $buffer .= '<th class="type">Valeurs<i class="fas fa-caret-down"></i> </th>';
    $buffer .= '</tr>';
    foreach ($array as $index => $value) {

        $key = $index;
        if (!is_int($index)) {
            $key = "'" . $index . "'";
        }
        $currentPath = $path . '[' . $key . ']';

        $buffer .= '<tr>';
        $buffer .= '<th title="index/clé : ' . $index . '">' . $index . '</th>';
        if (is_array($value)) {
            $value = renderHorizontalTable($value, $currentPath);
            $buffer .= '<td class="index-' . simpleSlug($index) . '">' . $value . '</td>';
        }
        else {
            if (is_bool($value)) {
                if ($value === true) {
                    $value = '(bool) true';
                }
                else {
                    $value = '(bool) false';
                }
            }
            $buffer .= '<td class="array-value index-' . simpleSlug($index) . '" data-path="' . $currentPath . '"><span class="value ' . gettype($value) . '">' . $value . '</span></td>';
        }

        $buffer .= '</tr>';
    }

    $buffer .= '</table>';

    return $buffer;
}

function parse($content)
{
    $code = str_replace('<?php', '', $content);
    eval($code);
    unset($code);

    $variables = get_defined_vars();

    foreach ($variables as $name => $value) {
        if (is_array($value)) {
            return [
                'name' => $name,
                'array' => $value
            ];
        }
    }
    return false;
}