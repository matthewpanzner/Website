//Config
document.addEventListener("keydown", keyDownHandler, false);
var NewScript=document.createElement('script');
NewScript.type="text/js";
NewScript.src="terminalCommands.js";
document.head.appendChild(NewScript);

//Input Hnalding
function keyDownHandler(evt){
  if(evt.keyCode == 13){
    
    if(document.activeElement == document.getElementById("about--input")){
      inputHandle(document.getElementById("about--input").value);
      document.getElementById("about--input").value = "";
    }
  }
}


function inputHandle($iStr){
  insertLine("root@matthew>" + $iStr);
  
  if(isInfo($iStr)){
    insertLine("info");
  }
  if(isHelp($iStr)){
    insertLine("help");
  }
}

//**************************************************************************************
//
//Terminal manipulation
//

function moveLinesUp(){
  for(var i = 1; i < 20; i++){
    document.getElementById("about-term-l-" + i).innerHTML = document.getElementById("about-term-l-" + (i + 1)).innerHTML;
  }
}
function tab(){
  return "     ";
}
function insertLine($str){
  moveLinesUp();
  document.getElementById("about-term-l-20").innerHTML = $str;
}