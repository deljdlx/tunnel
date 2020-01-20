<?php

$array = include(__DIR__.'/../code.php');



?>

<?php
if(is_array($array['array'])) {
    echo '<div class="road">
        <div id="array-caption">$array</div>
</div>';
}

?>


<div class="items">
<?php


if(is_file(__DIR__.'/../code.php')) {
    $buffer = '';
    if(is_array($array['array'])) {
        foreach ($array['array'] as $index => $value) {

            $selected = '';
            if($array['value'] === $index) {
                $selected = ' selected';
            }

            $buffer .= '';
            $buffer.= '
                <div class="element '.$selected.'" data-value="'.htmlspecialchars($value).'" id="element-'.$index.'" data-index="'.$index.'">
                    <img src="./house.png">
                    <div class="index">'.$index.'</div>
                </div>
            ';
        }
    }

    echo $buffer;
}
?>
</div>

