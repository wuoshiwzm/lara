var oChai = document.getElementById("chai");
var oClose = document.getElementById("close");
var oContainer = document.getElementById("container");

oChai.onclick = function (){
    oChai.setAttribute("class", "rotate");
}
oClose.onclick = function (){
    oContainer.style.display = "none";
}
