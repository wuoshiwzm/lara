<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


    @foreach($categorys as $v)


    <ul>

        <!-- <td class="tc">{{$v->cate_id}}</td> -->
        <li>

            <a href="{{url('admin/article2/cre/'.$v->cate_id)}}">{{$v->_cate_name}}</a>
        </li>
    </ul>
    @endforeach




  </body>
</html>
