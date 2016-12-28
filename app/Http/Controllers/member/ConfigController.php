<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Config;
use App\Http\Model\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{

    // GET|HEAD   编辑配置项  | admin/config/{config}/edit
  public function edit($conf_id){
    $field = Config::find($conf_id);
    return view('admin.config.edit',compact('field'));
  }



  //PUT|PATCH     | admin/config/{config}
  public function update($conf_id){
    $input = Input::except('_method','_token');
    $result = Config::where('conf_id',$conf_id)->update($input);
    if($result){
      $this->putFile();
      return redirect('admin/config');
    }else{
      return back()->with('errors','配置项更新失败');
    }

  }


    // 添加配置项提交 POST   admin/config    admin.config.store
      public function store(){
        $input = Input::except('_token');
        if($input){
          $rules=[
            'conf_name'=>'required',
            'conf_title'=>'required',
          ];
          $message=[
            'conf_name.required'=>'配置项名称必填',
            'conf_title.required'=>'配置项標題必填',
          ];
        $validator = Validator::make($input,$rules,$message);
        if($validator->passes()){
          $result =   Config::create($input);
          if($result){$this->putFile();return redirect('admin/config');}
          else{return back()->with('errors','生成分类失败');}
          }else{
            return back()->withErrors($validator);
          }
      }
    }


  //  添加 配置项 GET|HEAD  admin/config/create
  public function create(){
  return view('admin/config/add');
  }




  // 配置项列表GET|HEAD  admin/config
  public function index(){
    $data = Config::orderBy('conf_order','asc')->get();
    foreach($data as $k=>$v){
      switch ($v->field_type) {
        case "input":
          $data[$k]->_html = '<input type="text" class="lg" name="conf_content[]" value="'.$v->conf_content.'">';
          break;
        case "textarea":
          $data[$k]->_html = '<textarea type="text" name="conf_content[]">'.$v->conf_content.'</textarea>';
          break;
          case "radio":
            $peer = explode(',',$v->field_value) ;
            foreach($peer as $a=>$b)
            {
              $c=' ';
              $ra = explode('|',$b);
              if($v->conf_content == $ra[0]){$c=' checked';}
              $data[$k]->_html .= '<input type="radio" name="conf_content[]" value="'.$ra[0].'"'.$c.'>'.$ra[1]."　　";
            }
            break;
      }
    }

    return view('admin.config.index',compact('data'));
  }

  public function changeOrder(){
    $input = Input::except('_token');
    $config = Config::find($input['conf_id']);
    $config->conf_order=$input['conf_order'];
    $result =   $config->update();
    if($result){
      $data=[
        'status'=>0,
        'msg'=>'更改排序 成功！',
      ];
    }else{
      $data=[
        'status'=>1,
        'msg'=>'更改排序 失败！',
      ];
    }
    return $data;
  }
  public function show(){
  }


  public function destroy($conf_id){
    $result = Config::where('conf_id',$conf_id)->delete();
    if($result){
      $this->putFile();
      $data=[
        'status'=>0,
        'msg'=>'删除成功！',
      ];
    }else{
      $data=[
        'status'=>1,
        'msg'=>'删除失败啦！！',
      ];
    }
    return $data;
  }
  public function changeContent(){
  $input = Input::except('_token');
  foreach($input['conf_id'] as $k=>$v){
    Config::where('conf_id',$v)->update(['conf_content'=>$input['conf_content'][$k]]);
  }
  $this->putFile();
  return back()->with('errors','配置更新成功！');
  }

  public function  putFile(){
    // echo \Illuminate\Support\Facades\Config::get('web.web_title');
    $config = Config::pluck('conf_content','conf_name')->all();
    $path = base_path().'\config\web.php';
    $str='<?php return '.var_export($config,true).';';
    file_put_contents($path,$str);
  }



}
