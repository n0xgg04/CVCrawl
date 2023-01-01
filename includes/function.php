<?php

$kz=base64_decode(file_get_contents('./includes/raw.txt'));

function response($api){
    $ch = curl_init($api);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    return $result;
}

function fill($num){
    while(strlen($num)<3) $num="0".$num;
    return $num;
}

function parse($arr){
    $str="";
    foreach($arr as $key => $value){
        $str.="

        ".$key." => ".$value;
    }
    return $str;
}

function crawl($code){
    global $kz;
    $found=array();
    if(!is_dir('./data/')) mkdir('./data',0777,true);
    for($i=1;$i<=999;$i++){
        if(file_exists("./data/{$code}".fill($i).".json")) continue;
        $data=response($kz.$code.fill($i));
        $arr=json_decode($data,true);
        if(!empty($arr['data'])){
            file_put_contents('./data/'.$code.fill($i).'.json',parse($arr['data'][0]));
            echo "Found CV : {$code}".fill($i)."\n";
            $found[]="{$code}".fill($i);
        }else echo "Not found CV : {$code}".fill($i)."\n";
    }

    echo "\nFOUND LIST : ".json_encode($found);
}

//!ADDADDDDDDDDDĐ