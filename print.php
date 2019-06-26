<?php
$txt='
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta http-equiv="x-ua-compatible" content="IE=edge" />
  <meta charset="utf-8">
  <title>rep5</title>
<style>
body {
  font-family: "B Zar", Times, serif;
}
table {
  border: 1px solid black;
  border-spacing: 1;
  border-collapse: collapse;
  background: white;
  overflow: hidden;
  width: 100%;
  margin: 0 auto;
  position: relative;
}
table th {	
  border: 1px solid black;
  padding-left: 2px;
  text-align: center;
  vertical-align: center;
}
table td {	
  border: 1px solid black;  
  padding-left: 2px;
  text-align: center;
  vertical-align: center;
}
table thead tr {
  height: 40px;
  background: #36304a;
}
table tbody tr {
  height: 30px;
}
table th{
  font-size: 18px;
  color: #fff;
  line-height: 1.2;
  font-weight: unset;
}
tbody tr:nth-child(even) {
  background-color: #f5f5f5;
}
tbody tr {
  font-size: 15px;
  color: #808080;
  line-height: 1.2;
  font-weight: unset;
}


</style>  
</head>
<body> ';

   //print_r($_POST);
   $xml=$_POST['xml']; 
    
	$xml2= new SimpleXMLElement($xml) or die("Error: Cannot create object");
	
	$txt.= "<table><thead><tr>";
	foreach($xml2->REGION->ROWSET->ROW[0]->Children() as $a) 
		$txt.=  "<th>".$a->getName()."</th>";
	$txt.=  "</tr></thead><tbody>";
	foreach($xml2->REGION->ROWSET->ROW as $b){
		$txt.=  "<tr>";
		foreach($b->Children() as $c ){ 
			$txt.=  "<td>".$c->__toString()."</td>";
		}
		$txt.=  "</tr>";		
	}	
	$txt.=  "</tbody></table>";
	
	
  
   
$txt.= '</body></html>';
if($_POST['_xf']=='html')
	echo $txt;
if($_POST['_xf']=='pdf')
{
	$f=fopen("txt.htm","w"); 
    //fwrite($f, pack("CCC",0xef,0xbb,0xbf)); 
    fwrite($f,$txt); 
    fclose($f); 
	exec('wkhtmltopdf.exe txt.htm txt.pdf');
	$file = file_get_contents('txt.pdf');
	echo $file;
}
	

?> 