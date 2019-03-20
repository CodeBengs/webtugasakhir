<?php
	// include "../pengaturan/koneksi.php";

	$str = "SELECT * FROM kota WHERE idprop='".$_POST["prov"]."';";
	$qry=mysqli_query($conn, $str);
	while($row=mysqli_fetch_array($qry)){		
		//$rinci[]=$row;
		
		?>
        <option value="<?php echo $row["idkota"]."|".$row["nm_kota"];?>"><?php echo $row["nm_kota"]; ?></option><br>
    
    <?php
	}
	
	//print_r($rinci);
	
	//$dtjason= json_encode($rinci);
	//echo json_encode($rinci);
	//echo " Test";
	
?>