<?php
require 'connection.php';
$sql="SELECT `s`.lattitude,`s`.longitude,`s`.place,`s`.read_status,`s`.id, (((acos(sin(($lattitude*pi()/180)) * sin((s.lattitude*pi()/180))+cos(($lattitude*pi()/180)) * cos((s.lattitude*pi()/180)) * cos((($longitude - s.longitude)*pi()/180))))*180/pi())*60*1.1515*1.609344) AS distance FROM (`emergency` as s) where read_status=0 HAVING distance <= 5 ORDER BY `s`.id DESC";
$result=$con->query($sql);
$count=$result->num_rows;
if($count>0){
	echo 1;

}
else{
	echo 0;
}

?>