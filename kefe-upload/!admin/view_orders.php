<?php
session_start();
?>
 
<?php

	error_reporting( ~E_NOTICE );
	
	require_once 'config.php';
	
	if(isset($_GET['view_id']) && !empty($_GET['view_id']))
	{
		$view_id = $_GET['view_id'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM orderdetails WHERE user_id=:user_id');
		$stmt_edit->execute(array(':user_id'=>$view_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: customers.php");
	}
	
	include("config.php");
		 $stmt_edit = $DB_con->prepare("select sum(order_total) as totalx from orderdetails where user_id=:user_id");
		$stmt_edit->execute(array(':user_id'=>$user_id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
		$_SESSION['user_id'];
?>

<!-- Midtrans Start -->
<?php
 require_once(dirname(__FILE__) . '/midtrans/vendor/autoload.php');
 
 Veritrans_Config::$serverKey = "SB-Mid-server-JyBIr1T-w4HUwWBdqDEhpXDn";

 Veritrans_Config::$isSanitized = true;

 Veritrans_Config::$is3ds = true;

 $transaction_details = array(
   'order_id' => rand(),
   'gross_amount' => 40000, 
 );

// Start Masukan Data Barang Midtrans

//     while($row=$stmt->fetch(PDO::FETCH_ASSOC))
//     {
//     extract($row);
//     $item_detail
//     }

 $item1_details = array(
   'id' => 'a1',
   'price' => "$totalx",
   'quantity' => 1,
   'name' => "Pembayaran KeFee",
 );

//  $item2_details = array(
//     'id' => 'a2',
//     'price' => 150000,
//     'quantity' => 1,
//     'name' => "Babi"
//  );

 $item_details = array ($item1_details);

 $billing_address = array(
   'first_name'    => "Farhan Naufal",
   'last_name'     => "Naufal",
   'address'       => "Cimahi",
   'city'          => "Cimahi",
   'postal_code'   => "40521",
   'phone'         => "081234567891",
   'country_code'  => 'IDN'
 );

 // $shipping_address = array(
 //   'first_name'    => "Muhammad",
 //   'last_name'     => "Tanwir",
 //   'address'       => "Lombok Timur",
 //   'city'          => "Mataram",
 //   'postal_code'   => "83354",
 //   'phone'         => "081234567892",
 //   'country_code'  => 'IDN'
 // );

 $customer_details = array(
   'first_name'    => "",
   'last_name'     => "",
   'email'         => "nori876bg@gmail.com",
   'phone'         => "081234567891",
   'billing_address'  => $billing_address
   // 'shipping_address' => $shipping_address
 );

 $enable_payments = array('credit_card', 'cimb_clicks', 'echannel', 'bca_klikpay', 'bank_transfer','gopay','akulaku');

 $transaction = array(
   'enabled_payments' => $enable_payments,
   'transaction_details' => $transaction_details,
   'customer_details' => $customer_details,
   'item_details' => $item_details,
 );

 $snapToken = Veritrans_Snap::getSnapToken($transaction);

?>
<!-- Midtrans Stop -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="wrapper">
<body id="page-top">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#page-top">Keefe</a><button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarResponsive" type="button" data-toogle="collapse" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto mt-0 p-1 text-uppercase">
				    <li class="nav-item dropdown">
			        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			          ADMIN
			        </a>
			        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			          <a class="dropdown-item" href="logout.php">log out</a>
			        </div>
			        </li>
                </ul>
            </div>
        </div>
	</div>
    </nav>
    <header class="masthead" style="background-image:url('assets/img/header-bg.jpg');">
        <div class="container"></div>
    </header>
    <body>
        <div class="row mt-5 pt-5 mr-5">
        <div class="col-md-2 bg-dark op-4 p-5 pt-5">
			<ul class="nav flex-column ml-1 mb-5 md-3">
			  
			  <li class="nav-item">
			    <a class="nav-link text-white" href="ondex.php">Dashboard</a><hr class="bg-secondary">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" data-toggle="modal" href="#portfolioModal1">Tambah Item</a><hr class="bg-secondary">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="items.php">Kelola Item</a><hr class="bg-secondary">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="customers.php">Status Pemesanan</a><hr class="bg-secondary">
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-white" href="orderdetails.php">Detail Pemesanan</a><hr class="bg-secondary">
			  </li>
			  <li class="nav-item">
			    <hr class="bg">
			  </li>
              <li class="nav-item">
			    <hr class="bg">
			  </li>
              <li class="nav-item">
			    <hr class="bg">
			  </li>
              <li class="nav-item">
			    <hr class="bg">
			  </li>
			</ul>
        </div>
    	<div class="col-md-10 p-2 pt-5 pl-5">
        <div id="page-wrapper">
	
			 <div class="alert alert-danger">
                        
                          <center> <h3><strong>Customer Order Details </strong> </h3></center>
						  
						  </div>
						  
						  <br />
						  
						  <div class="table-responsive">
            <table class="display table table-bordered" id="example" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Price</th>
				  <th>Quantity</th>
                  <th>Total</th>
				  <th>Date Ordered</th>
                 
                </tr>
              </thead>
              <tbody>
			  <?php
include("config.php");
	$stmt = $DB_con->prepare("SELECT * FROM orderdetails where user_id='$user_id'");
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			
			
			?>
                <tr>
                  
                 <td><?php echo $order_name; ?></td>
				 <td>Rp <?php echo $order_price; ?> </td>
				 <td><?php echo $order_quantity; ?></td>
				 <td>Rp <?php echo $order_total; ?></td>
				  <td><?php echo $order_date; ?></td>
				 
				 
                </tr>
               
              <?php
		}
		
		
		
		
		echo "<tr>";
		echo "<td colspan='3' align='right' style='font-size:20px;'>Customer: ".$user_firstname." ".$user_lastname." | <span style='color:red'>Total Price Ordered:</span>";
		echo "</td>";
		
		echo "<td style='font-size:18px;'><span style='color:red;'>Rp ".$totalx."</span>";
		echo "</td>";
		
		 echo "<td>";
		 echo "<a class='btn btn-danger' href='customers.php'><span class='glyphicon glyphicon-backward'></span> Back<a/>";
		 echo "<span>  </span>";
		 echo "<a class='btn btn-warning' data-toggle='modal' data-target='#exampleModalCenter'><span class='glyphicon glyphicon-backward'></span> Cetak Struk<a/>";
		 echo "</td>";
		
		
		echo "</tr>";
		
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
		echo "<br />";
	
		echo "</div>";
	}
	else
	{
		?>
		
			
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No ordered items yet...
            </div>
        </div>
        <?php
	}
	
?>
		
	</div>
	</div>
	
	<br />
	<br />
           

           
        </div>
		
		
		
    </div>
    <!-- /#wrapper -->

	
	<!-- Mediul Modal -->
        <div class="modal fade portfolio-modal text-center" role="dialog" tabindex="-1" id="portfolioModal1">
	        <div class="modal-dialog modal-lg" role="document">
	            <div class="modal-content">
	                <div class="modal-body">
	                    <div class="container">
	                        <div class="row">
	                            <div class="col-lg-8 mx-auto">
	                                <div class="modal-body">
	                                    <form enctype="multipart/form-data" method="post" action="additem.php">
	                                       <fieldset>
	                                        
	                                            
	                                                <p>Name of Item:</p>
	                                                <div class="form-group">
	                                                
	                                                    <input class="form-control" placeholder="Name of Item" name="item_name" type="text" required>
	                                               
	                                                 
	                                                </div>
	                                            
	                                                
	                                                <p>Price:</p>
	                                                <div class="form-group">
	                                                
	                                                    <input id="priceinput" class="form-control" placeholder="Price" name="item_price" type="text" required>
	                                               
	                                                 
	                                                </div>
	                                                
	                                                
	                                                <p>Choose Image:</p>
	                                                <div class="form-group">     
	                                                    <input class="form-control"  type="file" name="item_image" accept="image/*" required/>
	                                               
	                                                </div>
	                                       
	                                       
	                                         </fieldset>
	                                      
	                                
	                                  </div>
	                                  <div class="modal-footer">
	                                   
	                                    <button class="btn btn-success btn-md" name="item_save">Save</button>
	                                    
	                                     <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
	                                    
	                                    
	                                       </form>
	                                  </div>    
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
    	</div>


		<!-- Modal Pembayaran -->
		<!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Proses Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Pilih Proses Pembayaran Yang Diinginkan
            </div>
            <div class="modal-footer">
			<a class="btn btn-success col" href="invoce?view_id=<?php echo $user_id; ?>"><span class='glyphicon glyphicon-shopping-cart'></span>Bayar di Tempat</a> 
                <button type="button" id="pay-button" class="btn btn-primary col">Transfer Online</button>
            </div>
            </div>
        </div>
        </div>
		<?php
		?>
		<!-- END Pembayaran -->
	  	  <script>
   
    $(document).ready(function() {
        $('#priceinput').keypress(function (event) {
            return isNumber(event, this)
        });
    });
  
    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&      
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }    
</script>

<!-- JS Midtrans Start -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-18qsaBv_sl9FnwWJ"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        snap.pay('<?=$snapToken?>', {
          onSuccess: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          onPending: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          onError: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>
    <!-- JS Midtrans Stop -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>
</html>
