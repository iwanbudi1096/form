<?php 
session_start();
if (!isset($_SESSION['login'])){
  header ("location: login.php");
  exit;
}

include('config.php'); ?>

		<center><font size="6">Tambah Data Installasi</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			
			$id_pelanggan	= $_POST['id_pelanggan'];
			$nama_teknisi		= $_POST['nama_teknisi'];
			$tgl_pasang	= $_POST['tgl_pasang'];
			$nama_sales		= $_POST['nama_sales'];
			$nama_pelanggan			= $_POST['nama_pelanggan'];
			$pic			= $_POST['pic'];
			$alamat	= $_POST['alamat'];
			$telepon		= $_POST['telepon'];
			$layanan			= $_POST['layanan'];
			$bts		= $_POST['bts'];
			$ip_radio	= $_POST['ip_radio'];
			$ip_publik		= $_POST['ip_publik'];
			$ssid			= $_POST['ssid'];
			$sinyal			= $_POST['sinyal'];
			$bandwidth	= $_POST['bandwidth'];

			$radio_bts		= $_POST['radio_bts'];
			$antena_bts	= $_POST['antena_bts'];
			$adaptor_bts		= $_POST['adaptor_bts'];
			$pole_bts			= $_POST['pole_bts'];
			$kabel_bts			= $_POST['kabel_bts'];
			$radio_klient		= $_POST['radio_klient'];
			$antena_klient	= $_POST['antena_klient'];
			$adaptor_klient		= $_POST['adaptor_klient'];		
			$router_klient		= $_POST['router_klient'];
			$ap_klient		= $_POST['ap_klient'];
			$pole_klient			= $_POST['pole_klient'];
			$kabel_klient			= $_POST['kabel_klient'];
			$keterangan		= $_POST['keterangan'];
				//upload Gambar		
			$nama_gambar1 = $_FILES['gambarsatu']['name'];
			$source		= $_FILES['gambarsatu']['tmp_name'];
			$folder = './images/';

			move_uploaded_file($source,$folder.$nama_gambar1);

			$nama_gambar2 = $_FILES['gambardua']['name'];
			$source		= $_FILES['gambardua']['tmp_name'];
			$folder = './images/';

			move_uploaded_file($source,$folder.$nama_gambar2);
			$nama_gambar3 = $_FILES['gambartiga']['name'];
			$source		= $_FILES['gambartiga']['tmp_name'];
			$folder = './images/';

			move_uploaded_file($source,$folder.$nama_gambar3);
			$nama_gambar4 = $_FILES['gambarempat']['name'];
			$source		= $_FILES['gambarempat']['tmp_name'];
			$folder = './images/';

			move_uploaded_file($source,$folder.$nama_gambar4);
			
			$cek = mysqli_query($koneksi, "SELECT * FROM installasi WHERE id_pelanggan ='$id_pelanggan'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO installasi(id_pelanggan,nama_teknisi,tgl_pasang,nama_sales,nama_pelanggan,pic,alamat,telepon,layanan,bts,ip_radio,ip_publik,ssid,sinyal,bandwidth,radio_bts,antena_bts,adaptor_bts,pole_bts,kabel_bts,radio_klient,antena_klient,adaptor_klient,router_klient,ap_klient,pole_klient,kabel_klient,keterangan,gambarsatu,gambardua,gambartiga,gambarempat) 
				VALUES('$id_pelanggan', '$nama_teknisi', '$tgl_pasang', '$nama_sales','$nama_pelanggan','$pic','$alamat','$telepon','$layanan','$bts','$ip_radio','$ip_publik','$ssid','$sinyal','$bandwidth','$radio_bts','$antena_bts','$adaptor_bts','$pole_bts','$kabel_bts','$radio_klient','$antena_klient','$adaptor_klient','$router_klient','$ap_klient','$pole_klient','$kabel_klient','$keterangan','$nama_gambar1','$nama_gambar2','$nama_gambar3','$nama_gambar4')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="index.php?page=tampil_installasi";</script>';
					
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, ID Pelanggan sudah terdaftar.</div>';
			}
		}
	
		?>

		<form action="index.php?page=tambah_installasi" method="post" enctype="multipart/form-data">
		
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Teknisi</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_teknisi" class="form-control" required>
				</div>
			</div>
		
			<!-- tanggal -->
			<div class="item form-group">
  					 <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Installasi</label>
  				 <div class="input-group date col-md-6 col-sm-6">
				   <div class="input-group-addon">
         		  <span class="glyphicon glyphicon-th"></span>
     		  </div>
     		  <input placeholder="Masukkan tanggal installasi" type="date" class="form-control datepicker" name="tgl_pasang" required>
			   
  		 </div>
			 </div>
 		 
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Sales</label>
				<div class="col-md-6 col-sm-6">
					<select name="nama_sales" class="form-control" required>
						<option value="">Pilih Nama Sales</option>
						<option value="Pak Ganda">Pak Ganda</option>
						<option value="Pak Wijaya">Pak Wijaya</option>
						<option value="Pak Agung">Pak Agung</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4  label-align ">DATA PELANGGAN</label>
			</div>
	
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pelanggan</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_pelanggan" class="form-control" required>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Penanggung Jawab</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="pic" class="form-control" >
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamat" class="form-control" >
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nomor Telepon / HP</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="telepon" class="form-control" >
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Layanan</label>
				<div class="col-md-6 col-sm-6">
					<select name="layanan" class="form-control" required>
						<option value="">Pilih Layanan</option>
						<option value="Wireless">Wireless</option>
						<option value="FO">FO</option>
						<option value="Infrastruktur">Infrastruktur</option>
						<option value="Interkoneksi">Interkoneksi</option>
					</select>
				</div>
				</div>


				<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4  label-align ">HASIL INSTALLASI</label>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">POP</label>
				<div class="col-md-6 col-sm-6">
					<select name="bts" class="form-control" required>
						<option value="">Pilih BTS</option>
						<option value="Jangli">Jangli</option>
						<option value="Manyaran">Manyaran</option>
						<option value="Hubdam">Hubdam</option>
						<option value="Mataram">Mataram</option>
						<option value="TanahMas">Tanah Mas</option>
						<option value="PMD">PMD</option>
						<option value="Ungaran">Ungaran</option>
						<option value="Kendal">Kendal</option>
						<option value="Kurios">Kurios</option>
						<option value="Jepara">Jepara</option>
						<option value="Milan">Milan Kos</option>
						<option value="Bandungan">Bandungan</option>
					</select>
				</div>
				</div>

				<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Network IP Radio</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="ip_radio" class="form-control" required >
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Network IP Public</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="ip_publik" class="form-control" required >
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">SSID</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="ssid" class="form-control" required >
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Signal</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="sinyal" class="form-control" required >
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Bandwidth</label>
				<div class="col-md-6 col-sm-6">
					<select name="bandwidth" class="form-control" >
						<option value="">Pilih Bandwidth</option>
						<option value="Upto 5 Mbps">Upto 5 Mbps</option>
						<option value="Upto 10 Mbps">Upto 10 Mbps</option>
						<option value="Upto 15 Mbps">Upto 15 Mbps</option>
						<option value="Upto 20 Mbps">Upto 20 Mbps</option>
						<option value="Upto 25 Mbps">Upto 25 Mbps</option>
						<option value="Upto 30 Mbps">Upto 30 Mbps</option>
						<option value="Upto 40 Mbps">Upto 40 Mbps</option>
						<option value="Upto 50 Mbps">Upto 50 Mbps</option>
						<option value="Upto 60 Mbps">Upto 60 Mbps</option>
						<option value="Upto 70 Mbps">Upto 70 Mbps</option>
						<option value="Upto 80 Mbps">Upto 80 Mbps</option>
						<option value="Upto 90 Mbps">Upto 90 Mbps</option>
						<option value="Upto 100 Mbps">Upto 100 Mbps</option>
						<option value="Upto di atas 100 Mbps">Upto di atas 100 Mbps</option>
						<option value="Dedicated 5 Mbps">Dedicated 5 Mbps</option>
						<option value="Dedicated 10 Mbps">Dedicated 10 Mbps</option>
						<option value="Dedicated 15 Mbps">Dedicated 15 Mbps</option>
						<option value="Dedicated 20 Mbps">Dedicated 20 Mbps</option>
						<option value="Dedicated 25 Mbps">Dedicated 25 Mbps</option>
						<option value="Dedicated 30 Mbps">Dedicated 30 Mbps</option>
						<option value="Dedicated 40 Mbps">Dedicated 40 Mbps</option>
						<option value="Dedicated 50 Mbps">Dedicated 50 Mbps</option>
						<option value="Dedicated 60 Mbps">Dedicated 60 Mbps</option>
						<option value="Dedicated 70 Mbps">Dedicated 70 Mbps</option>
						<option value="Dedicated 80 Mbps">Dedicated 80 Mbps</option>
						<option value="Dedicated 90 Mbps">Dedicated 90 Mbps</option>
						<option value="Dedicated 100 Mbps">Dedicated 100 Mbps</option>
						<option value="Dedicated di atas 100 Mbps">Dedicated di atas 100 Mbps</option>
					</select>
				</div>
				</div>
				<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4 label-align ">DATA PERANGKAT SISI BTS</label>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align"> Radio</label>
				<div class="col-md-6 col-sm-6">
					<select name="radio_bts" class="form-control" required>
						<option value="">Pilih Radio</option>
						<option value="Groove A52">Groove A52</option>
						<option value="Metal">Metal</option>
						<option value="Netmetal">Netmetal</option>
						<option value="Nanostation M5">Nanostation M5</option>
						<option value="Litebeam M5">Litebeam M5</option>
						<option value="Litebeam AC">Litebeam AC</option>
						<option value="Bullet M5">Bullet M5</option>
						<option value="Bullet AC">Bullet AC</option>
						<option value="Powerbeam AC Gen2">Powerbeam AC Gen 2</option>
						<option value="Rocket AC Lite">Rocket AC Lite</option>
						<option value="Rocket M5">Rocket M5</option>
						<option value="AirFiber 5 XHD">AirFiber 5 XHD</option>
						
					</select>
				</div>
			</div>
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Antena</label>
				<div class="col-md-6 col-sm-6">
					<select name="antena_bts" class="form-control" >
						<option value="">Pilih Antena</option>
						<option value="Antena Grid 27 dBi">Antena Grid 27 dBi</option>
						<option value="Antena Grid 30 dBi">Antena Grid 30 dBi</option>
						<option value="Rocket Dish 30 LW">Rocket Dish 30 LW</option>
						<option value="Rocket Dish 31 AC">Rocket Dish 31 AC</option>			
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Adaptor</label>
				<div class="col-md-6 col-sm-6">
					<select name="adaptor_bts" class="form-control" >
						<option value="">Pilih Adaptor</option>
						<option value="12v">Adaptor 12 Volt</option>
						<option value="24v">Adaptor 24 Volt</option>
						<option value="48v">Adaptor 48 Volt</option>				
					</select>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Pole / Tower</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="pole_bts" class="form-control" required placeholder="pole Z / pole U / pole 3 Meter / tinggi tower">
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kabel</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="kabel_bts" class="form-control" required placeholder="Masukkan panjang kabel">
				</div>
			</div>
				<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4 label-align " style="align=right">DATA PERANGKAT SISI KLIENT</label>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align"> Radio</label>
				<div class="col-md-6 col-sm-6">
					<select name="radio_klient" class="form-control" required>
						<option value="">Pilih Radio</option>
						<option value="Groove A52">Groove A52</option>
						<option value="Metal">Metal</option>
						<option value="Netmetal">Netmetal</option>
						<option value="Nanostation M5">Nanostation M5</option>
						<option value="Litebeam M5">Litebeam M5</option>
						<option value="Litebeam AC">Litebeam AC</option>
						<option value="Bullet M5">Bullet M5</option>
						<option value="Bullet AC">Bullet AC</option>
						<option value="Powerbeam AC Gen2">Powerbeam AC Gen 2</option>
						<option value="Rocket AC Lite">Rocket AC Lite</option>
						<option value="Rocket M5">Rocket M5</option>
						<option value="AirFiber 5 XHD">AirFiber 5 XHD</option>
						
					</select>
				</div>
			</div>
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Antena</label>
				<div class="col-md-6 col-sm-6">
					<select name="antena_klient" class="form-control" >
						<option value="">Pilih Antena</option>
						<option value="Antena Grid 27 dBi">Antena Grid 27 dBi</option>
						<option value="Antena Grid 30 dBi">Antena Grid 30 dBi</option>
						<option value="Rocket Dish 30 LW">Rocket Dish 30 LW</option>
						<option value="Rocket Dish 31 AC">Rocket Dish 31 AC</option>			
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Adaptor</label>
				<div class="col-md-6 col-sm-6">
					<select name="adaptor_klient" class="form-control" >
						<option value="">Pilih Adaptor</option>
						<option value="12v">Adaptor 12 Volt</option>
						<option value="24v">Adaptor 24 Volt</option>
						<option value="48v">Adaptor 48 Volt</option>				
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Router</label>
				<div class="col-md-6 col-sm-6">
					<select name="router_klient" class="form-control" >
						<option value="">Pilih Router</option>
						<option value="RB 941 / HapLite">RB 941 / HapLite</option>
						<option value="RB 750R2">RB 750R2</option>
						<option value="RB 750GR3">RB 750GR3</option>
						<option value="RB 450GX4">RB 450GX4</option>	
						<option value="RB 3011">RB 3011</option>	
						<option value=" RB CCR">RB CCR</option>	
					</select>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">AP</label>
				<div class="col-md-6 col-sm-6">
					<select name="ap_klient" class="form-control" >
						<option value="">Pilih AP</option>
						<option value="TPLINK 840">TPLINK TLWR840N</option>
						<option value="TENDA AC 6">TENDA AC 6</option>
						<option value="UNIFI AC LITE">UNIFI AC LITE</option>		
						<option value="UNIFI AC LR">UNIFI AC LR</option>	
						<option value="UNIFI AC PRO">UNIFI AC PRO</option>	
						<option value="LOCO M2">Loco M2</option>	
						<option value="Nano M2">Nano M2</option>
					</select>
				</div>
			</div>

		
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Pole / Tower</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="pole_klient" class="form-control" required placeholder="pole Z / pole U / pole 3 Meter / tinggi tower">
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kabel</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="kabel_klient" class="form-control" required placeholder="Masukkan panjang kabel">
				</div>
			</div>

			<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4 label-align " style="align=right">KETERANGAN</label>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="keterangan" class="form-control" required placeholder="Masukkan keterangan">
				</div>
			</div>

			<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4 label-align " style="align=right">DOKUMENTASI</label>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gambar 1</label>
				<div class="col-md-6 col-sm-6">
					<input type="file" name="gambarsatu" >
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gambar 2</label>
				<div class="col-md-6 col-sm-6">
					<input type="file" name="gambardua" >
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gambar 3</label>
				<div class="col-md-6 col-sm-6">
					<input type="file" name="gambartiga" >
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gambar 4</label>
				<div class="col-md-6 col-sm-6">
					<input type="file" name="gambarempat" >
				</div>
			</div> 
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>



		

		</div>

<script type="text/javascript">
 $(function(){
  $(".datepicker").datepicker({
      format: 'dd-mm-yyyy',
      autoclose: true,
      todayHighlight: true,
  });
 });
</script>