<?php

$a = 0;

for ($i = 0; $i <= 160; $i++) {
    $a = $i & 8;
    $b = $i & 16;
    $c = $i | 8;
    if ($a != 8 && $b != 16) {
        //echo "true" . $i ."aa" . $c ."\r\n" ;
    } else {
        //echo "false" . $i;
    }
    $d = $i | 8;
    if ($d == 72) {
        echo "true" . $i . "aa" . $d . "\r\n";
    }
}

function my_sort($arrays, $sort_key, $sort_order = SORT_ASC, $sort_type = SORT_NUMERIC)
{
    if(is_array($arrays)) {
        foreach ($arrays as $array) {
            if (is_array($array)) {
                $array_keys[] = $array[$sort_key];
            } else {
                return false;
            }
        }
        array_multisort($array_keys, $sort_order, $sort_type, $arrays);
        return $arrays;
    }
    return false;
}

$jsonStr = '{"name":"xiaoming","age":18,"sex":"girl"}';
var_dump($jsonStr);
$datas = json_decode($jsonStr);
var_dump($datas);
echo $datas->name;



//创建项目语句
//创建指定版本的laravel项目
//composer create-project laravel/laravel=5.0.* projectName --prefer-dist
//composer create-project laravel/laravel=5.0.* --prefer-dist
//composer create-project laravel/laravel projectName --prefer-dist
//composer create-project laravel/laravel projectName --prefer-dist
//js判断数组需要用 Array.isArray(arr); 来判断

//composer dump-autoload
