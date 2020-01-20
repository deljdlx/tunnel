<?php


$extras = [
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


$tarifs = [];

/*
$tarifs[] = 4.5;
$tarifs[] = 6.8;
$tarifs[] = 8.3;
*/


/*
$tarifs['tarifEnfant'] = 4.5;
$tarifs['tarifReduit'] = 6.8;
$tarifs['tarifPlein'] = 8.3;
*/


$array = $extras;








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
