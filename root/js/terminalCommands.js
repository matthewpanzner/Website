function isHelp($str){
  if($str == "help")
    return true;
  return false;
}
function isInfo($str){
  if($str == "getInfo" || $str == "matthew.getInfo()" || $str == "matthew->getInfo()" || $str == "info")
    return true;
  return false;
}
function isInit($str){
  if($str == "init" || $str == "init()" || $str == "home")
    return true;
  return false;
}
function isGreen($str){
  if($str == "green")
    return true;
  return false;
}
function isWhite($str){
  if($str == "white")
    return true;
  return false;
}