<?php
session_start();
$link = mysql_connect('localhost', 'id13990263_root', 'Farhan1706!N');
            if (!$link) {
                die('Not connected : ' . mysql_error());
            }
            
            $db_selected = mysql_select_db('id13990263_kefe', $link);
            if (!$db_selected) {
                die ('Can\'t use foo : ' . mysql_error());
            }
$no_meja=$_SESSION['Meja'];
$pemesan=$_SESSION['pemesan'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">INVOICE</textarea>
		
		<div id="identity">
		
            <textarea id="address">KeeFe
Jalan - Jalan
Bandung, WI 53719

Phone: (555) 555-5555</textarea>

            <div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
              <img id="image" src="images/gambar.png" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <textarea id="customer-title">A.N. : <?php echo("$pemesan"); ?></textarea>

            <table id="meta">
                <tr>

                    <td class="meta-head">Date</td>
                    <td><textarea id="date">December 15, 2009</textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Total Pembayaran</td>
										<?php 
										$data_sum = mysql_query("select SUM(order_total) as datasum from orderdetails where user_id='$no_meja'"); $bayar = mysql_fetch_assoc($data_sum);
										$pajak = $bayar['datasum'] * (1.5/100);
										$pembayaran_jumlah = $pajak + $bayar['datasum'];
										?>
                    <td><div class="due">Rp <?php echo($pembayaran_jumlah); ?></div></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th width="400">Harga</th>
		      <th colspan="2">Kuantitas</th>
		      <th width="400">Total Harga</th>
		  </tr>
		  <?php

			$query=mysql_query("select * from orderdetails where user_id='$no_meja'");
			while($query2=mysql_fetch_array($query)){
				echo "<tr class='item-row'>";
				echo "<td class='description'><textarea>".$query2['order_name']."</textarea></td>";
				echo "<td><center><textarea class='cost'>".$query2['order_price']."</textarea></center></td>";
				echo "<td colspan='2'><center><textarea class='qty'>".$query2['order_quantity']."</textarea></center></td>";
				echo "<td><center><span class='price'>".$query2['order_total']."</span></center></td>";
				echo "</tr>";
			}
		  ?>
		  <!-- <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
		  </tr> -->
		  
		  <!-- <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal">$875.00</div></td>
		  </tr> -->
		  <?php  ?>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
					<?php $data_sum = mysql_query("select SUM(order_total) as datasum from orderdetails where user_id='$no_meja'"); $bayar = mysql_fetch_assoc($data_sum);?>
					<td class="total-value"><div id="total">Rp <?php echo($bayar['datasum']); ?></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Pajak</td>
					<?php $pajak = $bayar['datasum'] * (1.5/100); ?>
		      <td class="total-value"><textarea id="paid">Rp <?php echo("$pajak"); ?></textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Total Pembayaran</td>
		      <?php $pembayaran_jumlah = $pajak + $bayar['datasum']; ?>
					<td class="total-value balance"><div class="due">Rp <?php echo("$pembayaran_jumlah"); ?></div></td>
		  </tr>
		
		</table>
		<div id="terms">
		  <h5>Ketentuan</h5>
		  <textarea>Dikenakan PPN Sebesar 1.5% dari Total Pembelian</textarea>
		  <button type="button" onclick="myFunction()">Menuju Kasir</button>
		</div>

	
	</div>
	
</body>

</html>
<script>
function myFunction() {
  //window.print();
  location.href="status.php"
}
</script>