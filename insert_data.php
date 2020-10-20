<?php
    require_once('pdo.php');
    if(isset($_GET['SaveUpdateDetails'])){
        $sql='update products set product_name=:name,price=:price,product_image_url=:url,servings=:servings where product_id=:id';
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array(':name'=>$_GET['name'],':price'=>$_GET['price'],':url'=>$_GET['url'],':servings'=>$_GET['servings'],':id'=>$_GET['SaveUpdateDetails']));
        return;
    }
    if(isset($_GET['readRecords'])){
        $data="<table class='table table-striped table-condensed table-bordered table-hover' style='width:100%'>
        <thead>
            <tr class='bg-warning'>
                <th>Product Id</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Servings</th>
                <th>Product Image URL</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>";
        $sql='select * from products';
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $data.= '<tr><td>'.$row['product_id'].'</td><td>'.$row['product_name'].'</td><td>'.$row['price'].'</td><td>'.$row['servings'].'</td><td>'.$row['product_image_url'].'</td><td><button class="btn btn-primary" style="margin-right:10px" id="UpdateProduct" data-toggle="modal" data-target="#UpdateProduct'.$row['product_id'].'" onclick="Edit('.$row['product_id'].')">Edit</button><button class="btn btn-danger" onclick="Delete('.$row['product_id'].')">Delete</button></td></tr>';
                }
    
        $data.='</tbody></table>';
        echo $data;
    }



if(isset($_GET['name'])&& isset($_GET['price']) &&isset($_GET['servings']) && isset($_GET['url'])){
    $sql='insert into products(product_name,price,servings,product_image_url) values(:name,:price,:servings,:url)';
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(':name'=>$_GET['name'],':price'=>$_GET['price'],':servings'=>$_GET['servings'],':url'=>$_GET['url']));
}

if(isset($_GET['Deleted'])){
    $sql='delete from products where product_id=:product_id';
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(':product_id'=>$_GET['Deleted']));
}

if(isset($_GET['Edit_Id'])){
    $sql='select * from products where product_id=:product_id';
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(':product_id'=>$_GET['Edit_Id']));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($row);
}

?>