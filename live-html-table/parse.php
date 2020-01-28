<?php

require(__DIR__.'/../function.php');


$whitelist = array(
    '192.168.0.10',
    '127.0.0.1',
    '::1'
);

if (!in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
    header('HTTP/1.0 403 Forbidden');
    exit();
}


$data = parse($_POST['content']);
if (is_array($data)) {
    header('Content-type: application/json');
    $buffer = '';
    if (is_array($data['array'])) {
        $path = '$' . $data['name'];
        $buffer = renderVerticalTable($data['array'], $path);
        echo json_encode([
            'table' => $buffer,
            'name' => '$'.$data['name'],
            'data' => $data
        ]);
    }
}
