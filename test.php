<?php

//给的数组
$arr = ['1_2','1_3','1_4','1_5','2_5','2_3','2_9','3_10','3_5','4_8'];

function check($arr){
  $res=[];
    foreach ($arr as $key => $value) {
      // echo $value;
      $value = explode('_',$value);
      echo $value[0];
      $res[$value[0]][]=$value[1];
      echo "<br>";

    }
    return $res;
  }

  var_dump(check($arr));


  asdjhflkajsdf
