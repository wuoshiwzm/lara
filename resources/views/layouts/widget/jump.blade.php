<script>

function jumpFrame(id){

$.post('{{url('share/content')}}',{'_token':"{{csrf_token()}}",'id':id}, function(data) {
  /*optional stuff to do after success */

});


layer.open({
  type: 2,
  title: '分享得红包啦！',
  shadeClose: true,
  shade: 0.8,
  area: ['500px', '75%'],
  content: '{{url('share')}}' //iframe的url
});



}

</script>
