<?php
session_start();

// if(!$_SESSION['admin_username'])
// {

// }
$link = mysql_connect('localhost','id13990263_root','Farhan1706!N');
            if (!$link) {
                die('Not connected : ' . mysql_error());
            }
            
            $db_selected = mysql_select_db('id13990263_kefe', $link);
            if (!$db_selected) {
                die ('Can\'t use foo : ' . mysql_error());
            }
?>

<?php

if(isset($_POST['item_save']))
{
$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];
$item_explain = $_POST['item_explain'];
$item_date = $_POST['item_date'];

 
 $check_item="select * from items WHERE item_name='$item_name'";
 $run_query=mysql_query($check_item);

    if(mysql_num_rows($run_query)>0)
    {
echo "<script>alert('Item is already exist, Please try another one!')</script>";
echo"<script>window.open('ondex.php','_self')</script>";
exit();
    }
 
$imgFile = $_FILES['item_image']['name'];
$tmp_dir = $_FILES['item_image']['tmp_name'];
$imgSize = $_FILES['item_image']['size'];

$upload_dir = 'item_images/';
$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); 
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
$itempic = rand(1000,1000000).".".$imgExt;


				
	
			if(in_array($imgExt, $valid_extensions)){			
		
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$itempic);
					$saveitem="insert into items (item_name,item_price,item_image,item_date,item_explain) VALUE ('$item_name','$item_price','$itempic','$item_date','$item_explain')";
					mysql_query($saveitem);
					 echo "<script>alert('Data berhasil disimpan!')</script>";				
					 echo"<script>location.href='items.php'</script>";
				}
				else{
					
					 echo "<script>alert('Maaf, ukuran gambar tidak sesuai')</script>";				
					 echo"<script>location.href='items.php'</script>";
				}
			}
			else{
				
				 echo "<script>alert('Maaf, hanya JPG, JPEG, PNG & GIF files yang diperbolehkan.')</script>";				
					 echo"<script>location.href='items.php'</script>";
				
			}
		
	
		

}

?>