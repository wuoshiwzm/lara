alert("test");
function jumpFrame(){
  layer.open({
  type: 2,
  title: 'layer mobile页',
  shadeClose: true,
  shade: 0.8,
  area: ['380px', '90%'],
  content: 'http://layer.layui.com/mobile/' //iframe的url
});
}
