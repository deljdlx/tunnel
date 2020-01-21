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



$array = [
    'notice' => [
        'estGrave' => false,
        'coupeLeScript' => false,
        'toto' => [1,2,3,4],
        'texte' => 'pas très grave, mais il faut la corriger'
    ],
    'warning' => [
        'estGrave' => true,
        'coupeLeScript' => false,
        'texte' => 'assez grave, mais ne coupe pas le script'
    ],
    'fatal' => [
        'estGrave' => true,
        'coupeLeScript' => true,
        'texte' => 'erreur grave, le script est coupé au moment où l\'erreur est rencontrée'
    ],
    'parse' => [
        'estGrave' => true,
        'coupeLeScript' => true,
        'texte' => 'très grave, le script n\'est même pas exécuté car PHP a vu que la syntaxe était incorrecte'
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
