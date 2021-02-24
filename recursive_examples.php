<?php

// recursive example 1
$categories = [
    [
        "id" => 1,
        "parent" => 0,
        "name" => "categori 1"
    ],
    [
        "id" => 2,
        "parent" => 0,
        "name" => "categori 2"
    ],
    [
        "id" => 3,
        "parent" => 0,
        "name" => "categori 3"
    ],
    [
        "id" => 4,
        "parent" => 1,
        "name" => "categori 4"
    ],
    [
        "id" => 5,
        "parent" => 2,
        "name" => "categori 5"
    ]
];


function listCategories($categories, $parent = 0)
{
    $html = "";
    foreach ($categories as $categori) {
        $html .= "<ul>";
        if ($categori["parent"] == $parent) {
            $html .= "<li>" . $categori["name"];
            $html .= listCategories($categories, $categori["id"]);
            $html .= "</li>";
        }
        $html .= "</ul>";
    }
    return $html;
}

echo listCategories($categories);



// recursive example 2
$arr = [
    "name" => "Furkan",
    "surname" => "Aygur",
    "sports" => [
        "swimming" => "true",
        "bodybuilding" => "true",
        "defense_sports" => [
            "judo" => "false",
            "capoira" => "false",
        ]
    ]
];

function getInfo($arr, $keys)
{
    foreach ($arr as $key => $value) {
        if ($key == $keys) {
            return $value;
        }
        if (is_array($value)) {
            $result = getInfo($value, $keys);
            if ($result) {
                return $result;
            }
        }
    }
}

echo getInfo($arr, "swimming");

?>