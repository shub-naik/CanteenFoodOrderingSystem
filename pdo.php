<?php
    $host='localhost';
    $dbname='ip_project';
    $dsn='mysql:host='.$host.';dbname='.$dbname;
    $pdo=new PDO($dsn,'root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
?>