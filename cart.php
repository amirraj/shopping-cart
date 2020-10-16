<?php
include_once 'contenConnection.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shopping Cart </title>
		<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script> 
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <link rel="stylesheet" href="cart.css" />
		<link rel="stylesheet" href="footer.css" />
		
		
    </head>
	
    <body>
	  
		 
		  
		<?php
		
		 include_once 'header.php';
		?>  
	
        <div class="container" style="padding-top: 60px" >
		
		 <nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Shopping Cart</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="cart.php">Home</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Electronics</a></li>
          <li><a href="#">Clothing</a></li>
          <li><a href="#">Toy</a></li>
		  <li><a href="#">Computers</a></li>
		  <li><a href="#">Accessories</a></li>
		  <li><a href="#">Others</a></li>
        </ul>
      </li>
      <li><a href="contact.html">Contact</a></li>
      <li><a href="#">Current Offers</a></li>
    </ul>
	<form class="navbar-form navbar-left" action="/action_page.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
</nav> 
		
        <?php

        $connect = mysqli_connect('localhost', 'root', '', 'cart');
        $query = 'SELECT * FROM products ORDER by id ASC';
        $result = mysqli_query($connect, $query);

        if ($result):
            if(mysqli_num_rows($result)>0):
                while($product = mysqli_fetch_assoc($result)):
                //print_r($product);
                ?>
				
                <div class="col-sm-4 col-md-3" >
                    <form method="post" action="cart.php?action=add&id=<?php echo $product['id']; ?>">
                        <div class="products">
                            <img src="<?php echo $product['image']; ?>" class="img-responsive" />
                            <h4 class="text-info"><?php echo $product['name']; ?></h4>
                            <h4>$ <?php echo $product['price']; ?></h4>
                            <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
                            <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-info"
                                   value="Add to Cart" />
                        </div>
                    </form>
                </div>
                <?php
                endwhile;
            endif;
        endif;   
        ?>
        <div style="clear:both"></div>  
        <br />  
        <div class="table-responsive">  
        <table class="table">  
            <tr><th colspan="5"><h3>Order Details</h3></th></tr>   
        <tr>  
             <th width="40%">Product Name</th>  
             <th width="10%">Quantity</th>  
             <th width="20%">Price</th>  
             <th width="15%">Total</th>  
             <th width="5%">Action</th>  
        </tr>  
        <?php   
        if(!empty($_SESSION['shopping_cart'])):  
            
             $total = 0;  
        
             foreach($_SESSION['shopping_cart'] as $key => $product): 
        ?>  
        <tr>  
           <td><?php echo $product['name']; ?></td>  
           <td><?php echo $product['quantity']; ?></td>  
           <td>$ <?php echo $product['price']; ?></td>  
           <td>$ <?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>  
           <td>
               <a href="cart.php?action=delete&id=<?php echo $product['id']; ?>">
                    <div class="btn-danger">Remove</div>
               </a>
           </td>  
        </tr>  
        <?php  
                  $total = $total + ($product['quantity'] * $product['price']);  
             endforeach;  
        ?>  
        <tr>  
             <td colspan="3" align="right">Total</td>  
             <td align="right">$ <?php echo number_format($total, 2); ?></td>  
             <td></td>  
        </tr>  
        <tr>
            <!-- Show checkout button only if the shopping cart is not empty -->
            <td colspan="5">
             <?php 
                if (isset($_SESSION['shopping_cart'])):
                if (count($_SESSION['shopping_cart']) > 0):
             ?>
                <a href="#" class="button">Checkout</a>
             <?php endif; endif; ?>
            </td>
        </tr>
        <?php  
        endif;
        ?>  
        </table>  
         </div>
        </div>
		
		
		
		<div class="container-fluid"  style="background-color: black; height: 50px;" >
		<div class="row" >
		<div class="footeradd" style="padding-left:50px; padding-top:15px; color:white;">copyright &copy ZaiRaj University.All right reserved.
		
		<div class="rightb" style="color:white; float:right; padding-right:50px;">FIND US : <a href="https://www.facebook.com/" class="fa fa-facebook" style="
  padding: 5px;
  font-size: 15px;
  width: 25px;
  text-align: center;
  margin: 1px 1px;
border-radius: 50%;  
  background: #3B5998;
  color: white;"></a> 
			<a href="https://twitter.com/" class="fa fa-twitter" style=" padding: 5px;
  font-size: 15px;
  width: 25px;
  text-align: center;
  margin: 1px 1px;border-radius: 50%; 
  background: #55ACEE;
  color: white;"></a> 
			<a href="https://www.google.com/" class="fa fa-google" style=" padding: 5px;
  font-size: 15px;
  width: 25px;
  text-align: center;
  margin: 1px 1px; border-radius: 50%;
  background: #dd4b39;
  color: white;"></a>	
			</div>
		
		</div>



		
	
    </body>
</html>
