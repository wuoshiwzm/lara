<script>

function jumpFrame(id){

$.post('{{url('share/test')}}',{'_token':"{{csrf_token()}}",'id':id}, function(data) {
  /*optional stuff to do after success */
  // echo data;
});

/*
layer.open({
  type: 2,
  title: 'layer mobile页',
  shadeClose: true,
  shade: 0.8,
  area: ['500px', '75%'],
  content: 'share' //iframe的url
});
*/


}

</script>
