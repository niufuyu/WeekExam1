<?php
/**
 * Created by PhpStorm.
 * User: 余
 * Date: 2019/2/26
 * Time: 8:40
 */
/*
 * 1．编写一个程序，传入n与m两个参数，生成1~n的编号，从开头的编号开始数，
 * 数到m将对应的元素删除，接下来从下一个元素开始数，数到m就删除，求最后剩下的数字
 */
function nm($n, $m){
    echo "<pre>";
    $num = range(1, $n);
//    print_r($num);
    $k = 1;
    $arr = [];
    $i = 0;
    while (count($num) > 1){
        if (!isset($num[$i])){
            $num = $arr;
            $arr = [];
            $i = 0;
        }
        if ($k == $m){
            unset($num[$i]);
            $k = 1;
        }else{
            $arr[] = $num[$i];

            $k++;
            print_r($num);
        }
        $i++;
    }
    print_r($num);

}
//nm(3, 2);
/*
 * 2．编写一个程序，给定任意长度的数组，数组内包含n个数字，要求将数组分为三组，每组的和尽量相近：
 */
function group($arr){
    rsort($arr);//排序
    $array = [//从三个数组里各取出一个元素
        [array_shift($arr)],
        [array_shift($arr)],
        [array_shift($arr)],
    ];
    for ($i = 0; $i < count($arr); $i++){
        $array[2][] = array_sum($array[$i]);
        $sum = array_sum($array[2]);
        if ($sum > array_sum($array[0])){
            $array = [
                $array[2],
                $array[0],
                $array[1],
            ];
        }elseif ($sum > array_sum($array[1])){
            $array = [
                $array[0],
                $array[2],
                $array[1],
            ];
        }

    }
    return $array;
}
echo "<pre>";
//var_dump(group([13,14,20,21,27,17]));
/*
 * 编写一个函数，传入一个数组，数组内包含n个正整数数字，返回数组内数字可以组成的最大值：
 */
function num($arr){
    $sum = 0;
    //$num = max($arr[$i]);
    for ($i = 1; $i < 10; $i++){
        for ($t = 0; $t < count($arr); $t++){
            $num = max($arr[$t]);
            $sum += $num[$i];
        }
    }
}
echo "<pre>";
var_dump(num([9,85,25,35,36,998,11,27]));