<?php 

date_default_timezone_set("Asia/Jakarta");

function bikinkode($table,$inisial){
	include "koneksi.php";
	$query = mysqli_query($koneksi,"SELECT * from $table");
	$properties = 	mysqli_fetch_field($query);
	$field = $properties->name; 
	if($table == 'transaksi'){
		$thn = date("y");
		$bln = date("m");
		$w   = "Where id_transaksi like '$inisial".$thn.$bln."%'";
	}else{
		$thn = "";
		$bln = "";
		$w   = "";
	}

	$hasil =mysqli_query($koneksi,"SELECT max(".$field.") from $table $w ");
	$data=mysqli_fetch_array($hasil);
	$panjang = $properties->length;
	$panjang -= 1;
	$no=$data[0];

	$panjanghuruf = strlen($inisial) + strlen($thn) + strlen($bln);
	$panjangnol = $panjang - $panjanghuruf;
	$nol = "";
		if(empty($no)){
			for ($i=2; $i <= $panjangnol ; $i++) { 
				$nol .= "0";
			}
			$no=$inisial.$thn.$bln.$nol."1";
		}else{
			$noterakhir=substr($no,$panjanghuruf); // dimulai dari digit ke dua dan diambil 3 digit
			$nourut=$noterakhir+1;
			$no=$inisial.$thn.$bln.sprintf('%0'.$panjangnol.'s',$nourut);	
		}
	return $no;
}

function msg($msg){
	echo "<script>window.alert('$msg');</script>";
}
function dest($dest){
	echo "<script>document.location='$dest';</script>";	
}
 function msgdest($msg,$dest){
	echo "<script>window.alert('$msg');
	document.location='$dest';</script>";
 }


function rp($parameter,$align = 'right'){ //membuat angka menjadi format rupiah
	$rupiah = "<div style='float:$align;'>Rp.	 " . number_format($parameter,0,',','.')."</div>";
	return $rupiah;
}

function ceksession($dest="index.php?page=home"){
	if(empty($_SESSION['kd_pelanggan'])){
		msgdest("Anda harus login dulu !","$dest&login=true");
	}else{
		return	$_SESSION['kd_pelanggan'];
	}
}
// include "koneksi.php";
// echo bikinkode("pesanan","PaSajaaa");
 ?>



<script type="text/javascript">
//hanya angka
function isNumber(evt)
	{
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 47 && charCode <= 57 || charCode == 13){
			return true;
		}else{
			return false;
		}
	}
//hanya huruf
	function alpha (e)
	{
		var k;
		document.all ? k = e.keyCode:k=e.which;
		return ((k > 31 && k < 91) || (k>96 && k< 123) || k == 8 || (k > 47 && k < 57) || k == 13);

	}

		function cek(claa){
			var valu = $("#"+claa).val();
			if(valu == ""){
				$("[for="+claa+"]").css({
										"font-size" : "16px",
										"top" : "30%"});
			}else{
				$("[for="+claa+"]").css({
										"font-size" : "14px",
										"top" : " -3px"});
			}
		}
		function bleh(claa){
				$("[for="+claa+"]").css({
										"font-size" : "14px",
										"top" : " -3px"})
		}
</script>
