<?php
class Html{
    static function encode($str){
        return my_htmlspecialchars($str);
    }
    static function splitArray($size,$array){
        $out=array();
        $i=0;
        foreach ($array as $item){
            if(!isset($out[$i])){
                $out[$i]=array();
            }
            $out[$i][]=$item;
            if(count($out[$i])==$size){
               $i++;
            }
        }
        return $out;
    }
    static function groupArray($count,$array){
        $size= $count;
        $out=array();
        $i=0;
        foreach ($array as $item){
            if($i==$size){
               $i=0;
            }
            if(!isset($out[$i])){
                $out[$i]=array();
            }
            $out[$i][]=$item;
            $i++;
        }
        return $out;
    }
}


