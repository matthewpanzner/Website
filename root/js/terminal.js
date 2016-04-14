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

function init(){
  insertLine(",,,,,,,                             ");
  insertLine(" ,,,,,,,                           ,");
  insertLine("  ,,,,,,,                         ,,");
  insertLine("   ,,,,,,,                       ,,,                  Author: Matthew Panzner");
  insertLine("    ,,,,,,,                     ,,,,                  v0.2");
  insertLine("     ,,,,,,,                   ,,,,,                  type 'info' for more information");
  insertLine("      ,,,,,,,                 ,,,,,,");
  insertLine("       .............................");
  insertLine("       ....       ...........       ");
  insertLine("       ...    =    .........     =  ");
  insertLine("       ...         ..........       ");
  insertLine("");
}

function inputHandle($iStr){
  insertLine("root@matthew>" + $iStr);
  
  if(isInfo($iStr)){
    insertLine("Name: Matthew Panzner");
    insertLine("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~");
    insertLine("Duration: Mixture of use in hobby and professional.  See resume ");
    insertLine("            for more in-depth professional experiences.");
    insertLine("");
    insertLine(" +------------------+-------------+---------------------------+");
    insertLine(" | Skill            | Duration    |  More-Info                |");
    insertLine(" +------------------+-------------+---------------------------+");
    insertLine(" | Mathematics      |  Too Long   |  B.S Degree               |");
    insertLine(" | Education        |  5 years    |  2010 - 2015 Proffesional |")
    insertLine(" | C++ and C        |  5 years    |  Academic and Hobby       |");
    insertLine(" | Java             |  3 years    |  Hobby, Professional      |");
    insertLine(" | Php              |  1 year     |  This Website             |");
    insertLine(" | HTML5/Javascript |  2 years    |  Work (.5yr prof)         |");
    insertLine(" | CSS3             |  .5 years   |  This Website             |");
    insertLine(" | Shell Scripting  |  1 year     |  Work and Academic        |");
    insertLine(" |                  |             |   Powershell + Bash       |");
    insertLine(" | SQL              |  3 years    |  Academic, Work, and      |");
    insertLine(" |                  |             |  some professional        |");
    insertLine(" +------------------+-------------+---------------------------+");
  }
  else if(isHelp($iStr)){
    insertLine("help");
  }
  else if(isInit($iStr)){
    for(var i = 0; i < 20; i++)
      insertLine("");
    init();
  }
 
  //Change these when parameter system is implemented
  if(isGreen($iStr)){
    document.getElementById("about--input").style.color = "green";
    document.getElementById("about--input-label").style.color = "green";
   
    var arr = document.getElementsByClassName("about-grid_cell--content")
    for(var i = 0; i < arr.length; i++){
      if(arr[i].nodeName !== "#text") arr[i].style.color = "green";
    }
  }
  if(isWhite($iStr)){
    document.getElementById("about--input").style.color = "white";
    document.getElementById("about--input-label").style.color = "white";
   
    var arr = document.getElementsByClassName("about-grid_cell--content")
    for(var i = 0; i < arr.length; i++){
      if(arr[i].nodeName !== "#text") arr[i].style.color = "white";
    }
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

function insertLine($str){
  moveLinesUp();
  
  $newLine = "";
  if($str.length === 0) $newLine = "&nbsp";
  for(var i = 0; i < $str.length; i ++){
    if($str[i] === ' '){
      $newLine += "&nbsp;";
    }
    else{
      $newLine += $str[i];
    }  
  }
  
  document.getElementById("about-term-l-20").innerHTML = $newLine;
}