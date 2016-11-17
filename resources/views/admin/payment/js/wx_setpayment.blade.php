<script>

function pay(a){

  $.post('{{url('set_payment')}}',{'_token':"{{csrf_token()}}",'amount':a}, function(data) {

    layer.open({
        type: 1,
        itle: '付款请扫描以下二维码！',
        shadeClose: true,
        shade: 0.8,
        area: ['500px', '50%'],
        content: data //注意，如果str是object，那么需要字符拼接。
      });
   });

}
</script>
