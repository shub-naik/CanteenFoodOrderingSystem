<?php
$host='localhost';
$dbname='ip_project';
$dsn='mysql:host='.$host.';dbname='.$dbname;
$pdo=new PDO($dsn,'root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
$term=$_REQUEST['term'];
$sql='select product_name from products where product_name LIKE :prefix';
$stmt=$pdo->prepare($sql);
$stmt->execute(array(':prefix'=>$term.'%'));
while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    $retval[]=$row['product_name'];
}
echo json_encode($retval);
?>