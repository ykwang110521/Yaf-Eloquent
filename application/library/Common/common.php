<?php

function checkMobileFormat($mobile){
    if(preg_match('/^1[34578]{1}\d{9}$/',$mobile)){
        return true;
    }else{
        return false;
    }
}

function checkMailFormat($mail) {
    if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/',$mail)){
        return true;
    }else{
        return false;
    }
}

//生成随机字符串
function randomStr($length=16,$type=0){
    switch((int)$type){
        case 1:     //数字和字母小写
            $chars = '0123456789abcdefghjklmnopqrstuvwxyz';
            break;
        case 2:     //16进制数字符串
            $chars = '0123456789abcdef';
            break;
        default :   //数字和字母大小写
            $chars = '0123456789abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
            break;
    }
    $max = strlen($chars)-1;
    $str = '';
    for($i=0;$i<$length;$i++){
        $str .= $chars[mt_rand(0,$max)];
    }
    return $str;
}