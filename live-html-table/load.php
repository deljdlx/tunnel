<?php

require(__DIR__.'/../function.php');

$exemplePath = __DIR__.'/../data';

$exemple = $_GET['exemple'];
$exemple = preg_replace('`[^a-zA-Z0-9\-_]`', '', $exemple);


header('Content-type: application/json');
if($exemplePath.'/'.$exemple.'.php') {
    $source = file_get_contents($exemplePath.'/'.$exemple.'.php');

    $data = parse($source);
    $path = '$' . $data['name'];
    $buffer = renderVerticalTable($data['array'], $path);

    echo json_encode([
        'source' => $source,
        'table' =>$buffer,
        'name' => '$'.$data['name'],
        'data' => $data
    ]);
}
else {

}