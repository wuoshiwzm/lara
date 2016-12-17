<script>

function jumpFrame(id){

layer.open({
  type: 2,
  title: '分享得红包啦！',
  shadeClose: true,
  shade: 0.8,
  area: ['475px', '75%'],
  content: '{{url("share2")}}'+'/'+id //iframe的url
});

}

</script>
