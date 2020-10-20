<?php
session_start();
require_once('pdo.php');
if(!isset($_SESSION['admin_email'])){
    die('Invalid Access');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Index Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css" integrity="sha256-JHRpjLIhLC03YGajXw6DoTtjpo64HQbY5Zu6+iiwRIc=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.js" integrity="sha256-apFUVcutYBHTJh5O835gpzGcVk3v6iUxg38lKBpQMDA=" crossorigin="anonymous"></script>
    <?php 
        require_once('bootstrap.php');
        require_once('../week4_jquery/head.php');        
    ?>
</head>
<body>

    <div style='text-align:center;width:90%;margin:auto;margin-top:20px;'>
    <div class="alert alert-success" role="alert">
        <h1>Admin Page Index</h1>
    </div>
        <button class='btn btn-success' id='add'>Add</button>
        <a href='Today_Purchased_Page.php' class='btn btn-primary'>Show Today's Order</a>
        <a href='admin_logout.php' class='btn btn-danger'>Logout</a>
        <div id='table_content'></div>
        <div id="add_dialog" title='Add Products'>
                <form id='add_form'>
                    <div class="form-group">
                        <label for="product_name">Product Name</label>
                        <input type="text" class="form-control" id="product_name" placeholder="Enter Product Name" name='name'>
                    </div>
                    <div class="form-group">
                        <label for="product_price">Product Price</label>
                        <input type="text" class="form-control" id="product_price" placeholder="Enter Product Price" name='price'>
                    </div>
                    <div class="form-group">
                        <label for="product_servings">Servings</label>
                        <input type="text" class="form-control" id="product_servings" placeholder="Enter Product Servings" name='servings'>
                    </div>
                    <div class="form-group">
                        <label for="product_image_url">Product Image Url</label>
                        <input type="text" class="form-control" id="product_image_url" placeholder="Enter Product Image URL" name='url'>
                    </div>
                    <div class="form-group">
                        <button class='btn btn-primary' id='save'>Save</button>
                        <button class='btn btn-danger' id="close">Close</button>
                    </div>

                </form>
        </div>
    </div>

<!-- Update Modal -->
<?php
    $sql_modal='select * from products';
    $stmt_modal=$pdo->prepare($sql_modal);
    $stmt_modal->execute();
    while($row=$stmt_modal->fetch(PDO::FETCH_ASSOC)){
        echo '<div class="modal fade" id="UpdateProduct'.$row['product_id'].'">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Update Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                          <div class="form-group">
                              <label for="update_product_name'.$row['product_id'].'">Product Name</label>
                              <input type="text" class="form-control" id="update_product_name'.$row['product_id'].'" placeholder="Enter Product Name" name="name">
                          </div>
                          <div class="form-group">
                              <label for="update_product_price'.$row['product_id'].'">Product Price</label>
                              <input type="text" class="form-control" id="update_product_price'.$row['product_id'].'" placeholder="Enter Product Price" name="price">
                          </div>
                          <div class="form-group">
                              <label for="update_product_servings'.$row['product_id'].'">Servings</label>
                              <input type="text" class="form-control" id="update_product_servings'.$row['product_id'].'" placeholder="Enter Product Servings" name="servings">
                          </div>
                          <div class="form-group">
                              <label for="update_product_image_url'.$row['product_id'].'">Product Image Url</label>
                              <input type="text" class="form-control" id="update_product_image_url'.$row['product_id'].'" placeholder="Enter Product Image URL" name="url">
                          </div>
                  </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="save'.$row['product_id'].'" onclick="SaveUpdateDetails('.$row['product_id'].')">Save</button>
            </div>
          </div>
        </div>
      </div>';
}
?>
<!-- Update Modal Ends -->
</body>
<script>
$(document).ready(function(){
    $('#add_dialog').dialog({
            autoOpen: false,
            title: 'Add Products',
            draggable:false,
            resizable:false,
            closeOnEscape:false,
            modal:true
    });     
    $('#add').click(function() {
        $('#add_dialog').dialog('open');
    });
    $('#close').click(function(e) {
        e.preventDefault();
        $('#add_dialog').dialog('close');
    });

    $('#save').click(function(e){
        e.preventDefault();
        var name=$('#product_name').val();
        var price=$('#product_price').val();
        var servings=$('#product_servings').val();
        var url=$('#product_image_url').val();
      if(name!='' && price!='' && url!='' && servings!=''){
        $.ajax({
            url:'insert_data.php',
            type:'get',
            data:{'name':name,'url':url,'price':price,'servings':servings},
            success:function(data){
                alert('data successfully inserted');
                $('#add_dialog').dialog('close');
                readRecords();
            }
        })
      }
      else{
        alert('Fill Form Correctly');
      }
    });
});
</script>
<script>
readRecords();
function readRecords(){
        var records='readRecords';
        $.ajax({
            url:'insert_data.php',
            type:'get',
            dataType:'html',
            data:{'readRecords':records},
            success:function(data,status){
                $('#table_content').html(data)
            }
        });
    }
    function Delete(delete_id){
    if(confirm(' Are U Sure ?')){
       $.ajax({
           url:'insert_data.php',
           type:'get',
           data:{'Deleted':delete_id},
           success:function(data,status){
                alert('SuccessFully Deleted');
                readRecords();
           }
       });
    }
    }
    function Edit(edit_id){
        $.ajax({
            url:'insert_data.php',
            data:{'Edit_Id':edit_id},
            type:'get',
            success:function(data,status){
                var data=JSON.parse(data);
                $('#update_product_name'+edit_id).val(data.product_name).css({"color": "red", "font-size": "200%",'font-weight':'bolder'});
                $('#update_product_servings'+edit_id).val(data.servings).css({"color": "red", "font-size": "200%",'font-weight':'bolder'}); 
                $('#update_product_image_url'+edit_id).val(data.product_image_url).css({"color": "red", "font-size": "200%",'font-weight':'bolder'});
                $('#update_product_price'+edit_id).val(data.price).css({"color": "red", "font-size": "200%",'font-weight':'bolder'}) ;
            }
        });
        $('#UpdateProduct'+edit_id).modal("show");      
    }
    function SaveUpdateDetails(id){
        var name=$('#update_product_name'+id).val();
        var price=$('#update_product_price'+id).val();
        var servings=$('#update_product_servings'+id).val();
        var url=$('#update_product_image_url'+id).val();
        $.ajax({
            url:'insert_data.php',
            type:'get',
            data:{'SaveUpdateDetails':id,'name':name,'servings':servings,'price':price,'url':url},
            success:function(data,status){
                Swal.fire(
                    'Edited',
                    'The Product Successfully Updated',
                    'success'
                )
                $('#UpdateProduct'+id).modal("hide");
                readRecords();
            }
        });
    }
</script>
</html>