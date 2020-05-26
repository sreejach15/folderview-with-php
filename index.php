
<?php
function addtn($v){
    $p=strpos($v,".");
    $ext=substr($v,$p+1);
    if($ext=="pdf")
        {
            //add pdf thumbnail
            return "pdf.png";
            
        }
    if(in_array($ext,array("PNG","JPG","JPEG","png","jpg","jpeg"))){
        //add image thumbnail
        return $v;

        
    }
    if(in_array($ext,array("mp4","mpg","mpeg","MP4","MPG","MPEG","avi"))){
        //add video thumbnail 
        return "video.png";
        
    }
    if (in_array($ext,array("mp3","m4a","MP3","M4A"))){
        //add audio thumbnail
        return "audio.png";
        
    }
}

$t='<html><head><link rel="stylesheet" type="text/css" href="style.css"><script src="js.js"></script></head><body><table style=""; border="1"; cellpadding="10px";>';
$i=0;
$dir=getcwd();
$files1 = scandir($dir);
$del=array("index.php",".","..","style.css","audio.png","video.png","pdf.png");
foreach($del as &$del_val){
if (($key = array_search($del_val, $files1)) !== false) {
    unset($files1[$key]);
}}
$f=array_values($files1);
#print_r($f);
echo "<br>";

foreach($f as $key=>$value)
{
    if($key%5==0){
    $tn=addtn($value);
    
    $t.='<tr><td><a target="_blank" href="'.$value.'"><img src='.$tn.' alt="Capture.PNG"></a><br><br><a target="_blank" href="'.$value.'">'.$value.'</a></td>';
    #echo $value."\n";
    
    }
    else{
        $tn=addtn($value);
        $t.='<td><a target="_blank" href="'.$value.'"><img src='.$tn.' alt="Capture.PNG"></a><br><br><a target="_blank" href="'.$value.'">'.$value.'</a></td>';
        #echo $value."\n";
        $i++;
        if($i==4){
            $t.='</tr>';
            $i=0;
            
        }
    }
      
}
if($i!=4)
$t.='</tr>';
$t.='</table></body></html>';
print($t);
?>

