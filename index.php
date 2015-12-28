<?php

function strCompare($strFirst, $strSecond, $compare = true)
{
    $strDifference = '';
    $char = 0;
    $replaceLimit = 1;

    $strLenght = $compare ? strlen($strFirst) : strlen($strSecond);

    while ($char < $strLenght) {
        if ($strFirst[$char] != $strSecond[$char]) {
            $strDifference .= $compare ? $strFirst[$char] : $strSecond[$char];
            $replaceChar = '';

            if ($compare) {
                $strFirst = preg_replace('#' . $strFirst[$char] . '#', $replaceChar, $strFirst, $replaceLimit);
            } else {
                $strSecond = preg_replace('#' . $strSecond[$char] . '#', $replaceChar, $strSecond, $replaceLimit);
            }
        } else {
            $char++;
        }
    }

    return $strDifference;
}

function replaceDiff($strFirst, $strSecond, $diff, $compare)
{
    if ($compare) {
        $pos = strpos($strFirst, $diff);
        $replacePos = isset($strSecond[$pos]) ? $pos : strlen($strSecond);
        $len = 0;
        return substr_replace($strSecond, $diff, $replacePos, $len);
    }

    return str_replace($diff, '', $strSecond);
}

$str1 = '12%%45';
$str2 = '12345';

$compare = strlen($str1) > strlen($str2) ? true : false;

$diff = strCompare($str1, $str2, $compare);
$str2 = replaceDiff($str1, $str2, $diff, $compare);
var_dump($str2);