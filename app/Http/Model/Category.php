<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table='category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;
    protected $guarded = [];
    // public $pointer = 0;
    protected $round = 0;
    protected $res = [];
    protected $frontCate = [];

//return all the categorys
public function ccates(){
  $catess = $this->orderBy('cate_order','asc')->get();
  return $catess;
}


public function tree(){
  $categorys = $this->orderBy('cate_order','asc')->get();
  return $this->getTree($categorys,'cate_name','cate_id','cate_pid',0);
}


public function getTree($data,$field_name,$field_id='cate_id',$field_pid='cate_pid',$pid=0){

  $arr = array();
  foreach($data as $k=>$v){
    if($v->$field_pid==$pid){
      $arr[]=$data[$k];
      foreach ($data as $m=>$n) {
        if($v->$field_id == $n->$field_pid){
          $data[$m]["_".$field_name] = '└─────'.$data[$m][$field_name];
          $arr[]=$data[$m];
          $data[$k]["_".$field_name] = $data[$k][$field_name];
        }
      }
    }
  }
return $arr;
}



//always check move in one class, if is parent, move the child class and loop again
//cate_id cate_pid cate_name
//check if the cate_id has child  if yes,loop the child each by each, if no return false
//$ele the element you wanna check, $dataArr the Arr this element in
function isChild($ele){

  //get the obj of category
  $dataArr = $this->get();
  // dd($dataArr);
  foreach($dataArr as $k=>$v){
    if($v['cate_pid'] == $ele['cate_id'] || $ele['cate_pid']==0)
    {
      return true;
    }
    // echo "not parent";
  }
  return false;
}


// function scanChild(){} for parent , use this function to scan all children under that parent
public function scanChild($cate_id){
    //find the element with the cate_id as passed
    $cate_ele = $this->where('cate_id',$cate_id)->first();

    for($i=0;$i<$this->round;$i++){
      $cate_ele['prefix'].="--->";
    }
    // dd($cate_ele);
    $cate_ele['_cate_name']=$cate_ele['prefix'].$cate_ele['cate_name'];
    // echo $cate_ele['_cate_name'];

    $this->res[]=$cate_ele;
    //initialize the model
    $cates = $this->where('cate_pid',$cate_id)->orderBy('cate_order')->get();

    // return;
    //loop to find Child on
    foreach($cates as $k=>$v){
        // judge if the element is parent
        if($this->isChild($v))
        {
          // move to the first child
          $this->round++;
          $this->scanChild($v['cate_id']);
        }
        // it is not a parent element
        else{
          // echo "found single"."<br>";
          $v['_cate_name']=$cate_ele['prefix']."--->".$v['cate_name'];
          // echo $v['_cate_name'];
          $this->res[]=$v;
        }
    }
    return $this->res;
   // dd($this->res);
}


public function adminCate(){
  $cates = $this->where('cate_pid',0)->orderBy('cate_order','asc')->get();
  foreach($cates as $a=>$b){
      $this->scanChild($b['cate_id']);
      $this->round = 0;
    }
  return $this->res;
  }


public function findChildOnly($data){
  $arr = [];
  $cates = $this->ccates();
  foreach($data as $k=>$v){
    foreach($cates as $a=>$b){
      if($v['cate_id'] == $b['cate_pid']){
        $arr[]=$b;
        // echo "fond one child::".$b['cate_name']."<br>";

      }

    }

  }


if($arr){
  $this->frontCate[]=$arr ;
  $this->findChildOnly($arr);
}
// dd($this->frontCate);
return $this->frontCate;
}



//get all the children categorys
public function frontCate(){
  $arr=[];
  $cates = $this->where('cate_pid',0)->orderBy('cate_order','asc')->get();
  $cates_parent = $this->where('cate_pid',0)->orderBy('cate_order','asc')->get();

  foreach ($cates_parent as $k=>$v){
     $arr_m[]=$v;
  }

  $children = $this->findChildOnly($cates_parent);
  array_unshift($children,$arr_m);
  return $children;


}









}
