<?php

require('head_c.php');
$_SESSION['menu']='product';

if(isset($_POST['quantity'])){
 $obj->edit_stock_in($_POST);
}
 $d=$_GET['id'];
 $r=$obj->get_stock_in_update($d);
 $p=$obj->getData('product','id='.$r['product_id'])->fetch(PDO::FETCH_ASSOC);


?>
<div class="wrapper">
<?php require('leftMenu.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Edit Stock In
     </h1>
     <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="stock_in.php">Edit Stock In </a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="box">
          <div class="box-body">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" >
              <div class="col-xs-12 col-md-12">
               <input type="hidden" name="id" value="<?php echo $r['id']; ?>">
               <div class="col-xs-12 col-md-12">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Product</label>
                    <input type="text" readonly  class="form-control" value="<?php echo $p['name'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="text" readonly id="price" class="form-control" value="<?php echo  $p['price']?>">
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="text" onkeyup="calculate()" name="quantity" id="quantity" class="form-control" value="<?php echo $r['quantity'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Sub-Total</label>
                    <input type="text" readonly name="sub_total" id="st" class="form-control" value="<?php echo $r['sub_total'] ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                 <div class="form-group">
                  <label>Discount</label>
                  <input type="text" onkeyup="calculate()" id="d" name="discount" class="form-control" value="<?php echo $r['discount'] ?>">
                </div>
                <div class="form-group">
                  <label>Total</label>
                  <input type="text" readonly id="t" name="total" class="form-control" value="<?php echo $r['sub_total'] ?>" required>
                </div>
                <div class="form-group">
                  <label>Date</label>
                  <input type="text"  id="" name="date" class="form-control" value="<?php echo $r['date'] ?>" required>
                </div>
                <div class="form-group">
                  <label></label>
                  <input type="submit" class="btn btn-primary btn-block" value="Submit">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> 
  </section>
  <!-- /.content -->
</div>
</div> 
<!-- ./wrapper --> 
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
<script>


  function calculate() {
    var price=parseFloat($('#price').val())
    var qty=parseFloat($('#quantity').val())
    var sub_total=price*qty
    $('#st').val(sub_total)
    var d
    var d=parseFloat($('#d').val())
    var discounted=sub_total-(sub_total*d)/100
    $('#t').val(discounted) 
  } 
</script>
<?php require('footer_c.php');?>