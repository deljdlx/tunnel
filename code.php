<?php

//you have to define the $array variable
$array = [
    [
        'test 2' => 'Popcorn',
        'size' => 'L',
        'price' => 2.9
    ],
    [
      'label' => 'Popcorn',
      'size' => 'L',
      'price' => 2.9
    ],
    [
      'Popcorn',
      'XL',
      4
    ],
    [
      'Chips',
      '50g',
      2.5
    ],
    [
      'M&M\'s',
      '100g',
      4
    ],
    [
      'Soda',
      '33cl',
      3.2
    ],
    [
      'Evian',
      '33cl',
      3
    ]
  ];


//=======================================================
//do not touch this code
//=======================================================
//ignore this code ; here for demo purposes
if (!isset($value)) {
    $value =false;
}
if (!isset($name)) {
    $name = '$array';
}

if (isset($array)) {
    return [
        'checksum' => md5(json_encode($array)),
        'name' => $name,
        'value' => $value,
        'array' => $array
    ];
}
//=======================================================
