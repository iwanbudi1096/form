<?php 

session_start();
 if (!isset($_SESSION['login'])){
   header ("location: login.php");
   exit;
 }

include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_pelanggan'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_pelanggan = $_GET['id_pelanggan'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM installasi WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
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

			if (isset($_FILES['gambarsatu']['name']) && ($_FILES['gambarsatu']['name']!='')){
				$nama_gambar1 = $_FILES['gambarsatu']['name'];
			$source		= $_FILES['gambarsatu']['tmp_name'];
			$size = $_FILES['gambarsatu']['size'];
			$type= $_FILES['gambarsatu']['type'];


			//del old file
			unlink("images/$old_image");
			//new upload to folder

			move_uploaded_file($source,"images/$nama_gambar1");
			}
			
			else {
				$nama_gambar1=$old_image;
			}
			
			if (isset($_FILES['gambardua']['name']) && ($_FILES['gambardua']['name']!='')){
				$nama_gambar2 = $_FILES['gambardua']['name'];
			$source		= $_FILES['gambardua']['tmp_name'];
			$size = $_FILES['gambardua']['size'];
			$type= $_FILES['gambardua']['type'];


			//del old file
			unlink("images/$old_image");
			//new upload to folder

			move_uploaded_file($source,"images/$nama_gambar2");
			}
			
			else {
				$nama_gambar2=$old_image;
			}
			
			if (isset($_FILES['gambartiga']['name']) && ($_FILES['gambartiga']['name']!='')){
				$nama_gambar3 = $_FILES['gambartiga']['name'];
			$source		= $_FILES['gambartiga']['tmp_name'];
			$size = $_FILES['gambartiga']['size'];
			$type= $_FILES['gambartiga']['type'];


			//del old file
			unlink("images/$old_image");
			//new upload to folder

			move_uploaded_file($source,"images/$nama_gambar3");
			}
			
			else {
				$nama_gambar3=$old_image;
			}
			// $nama_gambar2 = $_FILES['gambardua']['name'];
			// $source		= $_FILES['gambardua']['tmp_name'];
			// $folder = './images/';

			
			
			// $nama_gambar3 = $_FILES['gambartiga']['name'];
			// $source		= $_FILES['gambartiga']['tmp_name'];
			// $folder = './images/';

			
			// $nama_gambar4 = $_FILES['gambarempat']['name'];
			// $source		= $_FILES['gambarempat']['tmp_name'];
			// $folder = './images/';

			



$row= mysqli_fetch_assoc($select);

			$sql = mysqli_query($koneksi, "UPDATE installasi SET nama_teknisi='$nama_teknisi', tgl_pasang='$tgl_pasang', nama_sales='$nama_sales', nama_pelanggan='$nama_pelanggan', pic='$pic',
			alamat = '$alamat',telepon='$telepon', layanan='$layanan', bts='$bts', ip_radio ='$ip_radio', ip_publik='$ip_publik', ssid ='$ssid', sinyal ='$sinyal', bandwidth = '$bandwidth', 
			radio_bts = '$radio_bts', antena_bts='$antena_bts', adaptor_bts='$adaptor_bts', pole_bts='$pole_bts', kabel_bts='$kabel_bts', radio_klient='$radio_klient', antena_klient='$antena_klient',
		 adaptor_klient='$adaptor_klient', router_klient='$router_klient', ap_klient='$ap_klient', pole_klient='$pole_klient', kabel_klient='$kabel_klient',keterangan='$keterangan',
		 gambarsatu='$nama_gambar1',gambardua='$nama_gambar2', gambartiga='$nama_gambar3',gambarempat='$nama_gambar4'
			WHERE id_pelanggan='$id_pelanggan'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="index.php?page=tampil_installasi";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_installasi&id_pelanggan=<?php echo $id_pelanggan; ?>" method="post" enctype="multipart/form-data">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID Pelanggan</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_pelanggan" class="form-control" size="4" value="<?php echo $data['id_pelanggan']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Teknisi</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_teknisi" class="form-control" value="<?php echo $data['nama_teknisi']; ?>" >
				</div>
			</div>
			<div class="item form-group">
  					 <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Installasi</label>
  				 <div class="input-group date col-md-6 col-sm-6">
				   <div class="input-group-addon">
         		  <span class="glyphicon glyphicon-th"></span>
     		  </div>
     		  <input placeholder="Masukkan tanggal installasi" type="date" class="form-control datepicker" name="tgl_pasang" value="<?php echo $data['tgl_pasang']; ?>" >
			   
  		 </div>
			 </div>

			 <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Sales</label>
				<div class="col-md-6 col-sm-6">
					<select name="nama_sales" class="form-control" required>
						<option value="">Pilih Nama Sales</option>
						<option value="Pak Ganda" <?php if($data['nama_sales'] == 'Pak Ganda'){ echo 'selected'; } ?>>Pak Ganda</option>
						<option value="Pak Wijaya" <?php if($data['nama_sales'] == 'Pak Wijaya'){ echo 'selected'; } ?>>Pak Wijaya</option>
						<option value="Pak Agung" <?php if($data['nama_sales'] == 'Pak Agung'){ echo 'selected'; } ?>>Pak Agung</option>
					</select>
				</div>
			</div>

			
			<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4  label-align ">DATA PELANGGAN</label>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pelanggan</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $data['nama_pelanggan']; ?>" >
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Penanggung Jawab</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="pic" class="form-control" value="<?php echo $data['pic']; ?>"  >
				</div>
			</div>


			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" >
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nomor Telepon / HP</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="telepon" class="form-control" value="<?php echo $data['telepon']; ?>" >
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Layanan</label>
				<div class="col-md-6 col-sm-6">
					<select name="layanan" class="form-control" required>
						<option value="">Pilih Layanan</option>
						<option value="Wireless" <?php if($data['layanan'] == 'Wireless'){ echo 'selected'; } ?>>Wireless</option>
						<option value="FO" <?php if($data['layanan'] == 'FO'){ echo 'selected'; } ?>>FO</option>
						<option value="Infrastruktur" <?php if($data['layanan'] == 'Infrastruktur'){ echo 'selected'; } ?>>Infrastruktur</option>
						<option value="Interkoneksi" <?php if($data['layanan'] == 'Interkoneksi'){ echo 'selected'; } ?>>Interkoneksi</option>
					</select>
				</div>
				</div>

				<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4  label-align ">HASIL INSTALLASI</label>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">POP</label>
				<div class="col-md-6 col-sm-6">
					<select name="bts" class="form-control" >
						<option value="">Pilih BTS</option>
						<option value="Jangli" <?php if($data['bts'] == 'Jangli'){ echo 'selected'; } ?>>Jangli</option>
						<option value="Manyaran" <?php if($data['bts'] == 'Manyaran'){ echo 'selected'; } ?>>Manyaran</option>
						<option value="Hubdam" <?php if($data['bts'] == 'Hubdam'){ echo 'selected'; } ?>>Hubdam</option>
						<option value="Mataram" <?php if($data['bts'] == 'Mataram'){ echo 'selected'; } ?>>Mataram</option>
						<option value="TanahMas" <?php if($data['bts'] == 'TanahMas'){ echo 'selected'; } ?>>Tanah Mas</option>
						<option value="PMD" <?php if($data['bts'] == 'PMD'){ echo 'selected'; } ?>>PMD</option>
						<option value="Ungaran" <?php if($data['bts'] == 'Ungaran'){ echo 'selected'; } ?>>Ungaran</option>
						<option value="Kendal" <?php if($data['bts'] == 'Kendal'){ echo 'selected'; } ?>>Kendal</option>
						<option value="Kurios" <?php if($data['bts'] == 'Kurios'){ echo 'selected'; } ?>>Kurios</option>
						<option value="Jepara" <?php if($data['bts'] == 'Jepara'){ echo 'selected'; } ?>>Jepara</option>
						<option value="Milan" <?php if($data['bts'] == 'Milan'){ echo 'selected'; } ?>>Milan Kos</option>
						<option value="Bandungan" <?php if($data['bts'] == 'Bandungan'){ echo 'selected'; } ?>>Bandungan</option>
					</select>
				</div>
				</div>

				<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Network IP Radio</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="ip_radio" class="form-control" value="<?php echo $data['ip_radio']; ?>" required >
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Network IP Public</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="ip_publik" class="form-control" value="<?php echo $data['ip_publik']; ?>" required >
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">SSID</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="ssid" class="form-control" value="<?php echo $data['ssid']; ?>" required >
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Signal</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="sinyal" class="form-control" value="<?php echo $data['sinyal']; ?>" required >
				</div>
			</div>


			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Bandwidth</label>
				<div class="col-md-6 col-sm-6">
					<select name="bandwidth" class="form-control" >
						<option value="">Pilih Bandwidth</option>
						<option value="Upto 5 Mbps" <?php if($data['bandwidth'] == 'Upto 5 Mbps'){ echo 'selected'; } ?>>Upto 5 Mbps</option>
						<option value="Upto 10 Mbps" <?php if($data['bandwidth'] == 'Upto 10 Mbps'){ echo 'selected'; } ?>>Upto 10 Mbps</option>
						<option value="Upto 15 Mbps" <?php if($data['bandwidth'] == 'Upto 15 Mbps'){ echo 'selected'; } ?>>Upto 15 Mbps</option>
						<option value="Upto 20 Mbps" <?php if($data['bandwidth'] == 'Upto 20 Mbps'){ echo 'selected'; } ?>>Upto 20 Mbps</option>
						<option value="Upto 25 Mbps" <?php if($data['bandwidth'] == 'Upto 25 Mbps'){ echo 'selected'; } ?>>Upto 25 Mbps</option>
						<option value="Upto 30 Mbps" <?php if($data['bandwidth'] == 'Upto 30 Mbps'){ echo 'selected'; } ?>>Upto 30 Mbps</option>
						<option value="Upto 40 Mbps" <?php if($data['bandwidth'] == 'Upto 40 Mbps'){ echo 'selected'; } ?>>Upto 40 Mbps</option>
						<option value="Upto 50 Mbps" <?php if($data['bandwidth'] == 'Upto 50 Mbps'){ echo 'selected'; } ?>>Upto 50 Mbps</option>
						<option value="Upto 60 Mbps" <?php if($data['bandwidth'] == 'Upto 60 Mbps'){ echo 'selected'; } ?>>Upto 60 Mbps</option>
						<option value="Upto 70 Mbps" <?php if($data['bandwidth'] == 'Upto 70 Mbps'){ echo 'selected'; } ?>>Upto 70 Mbps</option>
						<option value="Upto 80 Mbps" <?php if($data['bandwidth'] == 'Upto 80 Mbps'){ echo 'selected'; } ?>>Upto 80 Mbps</option>
						<option value="Upto 90 Mbps" <?php if($data['bandwidth'] == 'Upto 90 Mbps'){ echo 'selected'; } ?>>Upto 90 Mbps</option>
						<option value="Upto 100 Mbps" <?php if($data['bandwidth'] == 'Upto 100 Mbps'){ echo 'selected'; } ?>>Upto 100 Mbps</option>
						<option value="Upto di atas 100 Mbps" <?php if($data['bandwidth'] == 'Uptodi atas 100 Mbps'){ echo 'selected'; } ?>>Upto di atas 100 Mbps</option>
						<option value="Dedicated 5 Mbps" <?php if($data['bandwidth'] == 'Dedicated 5 Mbps'){ echo 'selected'; } ?>>Dedicated 5 Mbps</option>
						<option value="Dedicated 10 Mbps" <?php if($data['bandwidth'] == 'Dedicated 10 Mbps'){ echo 'selected'; } ?>>Dedicated 10 Mbps</option>
						<option value="Dedicated 15 Mbps" <?php if($data['bandwidth'] == 'Dedicated 15 Mbps'){ echo 'selected'; } ?>>Dedicated 15 Mbps</option>
						<option value="Dedicated 20 Mbps" <?php if($data['bandwidth'] == 'Dedicated 20 Mbps'){ echo 'selected'; } ?>>Dedicated 20 Mbps</option>
						<option value="Dedicated 25 Mbps" <?php if($data['bandwidth'] == 'Dedicated 25 Mbps'){ echo 'selected'; } ?>>Dedicated 25 Mbps</option>
						<option value="Dedicated 30 Mbps" <?php if($data['bandwidth'] == 'Dedicated 30 Mbps'){ echo 'selected'; } ?>>Dedicated 30 Mbps</option>
						<option value="Dedicated 40 Mbps" <?php if($data['bandwidth'] == 'Dedicated 40 Mbps'){ echo 'selected'; } ?>>Dedicated 40 Mbps</option>
						<option value="Dedicated 50 Mbps" <?php if($data['bandwidth'] == 'Dedicated 50 Mbps'){ echo 'selected'; } ?>>Dedicated 50 Mbps</option>
						<option value="Dedicated 60 Mbps" <?php if($data['bandwidth'] == 'Dedicated 60 Mbps'){ echo 'selected'; } ?>>Dedicated 60 Mbps</option>
						<option value="Dedicated 70 Mbps" <?php if($data['bandwidth'] == 'Dedicated 70 Mbps'){ echo 'selected'; } ?>>Dedicated 70 Mbps</option>
						<option value="Dedicated 80 Mbps" <?php if($data['bandwidth'] == 'Dedicated 80 Mbps'){ echo 'selected'; } ?>>Dedicated 80 Mbps</option>
						<option value="Dedicated 90 Mbps" <?php if($data['bandwidth'] == 'Dedicated 90 Mbps'){ echo 'selected'; } ?>>Dedicated 90 Mbps</option>
						<option value="Dedicated 100 Mbps" <?php if($data['bandwidth'] == 'Dedicated 100 Mbps'){ echo 'selected'; } ?>>Dedicated 100 Mbps</option>
						<option value="Dedicated di atas 100 Mbps" <?php if($data['bandwidth'] == 'Dedicated di atas 100 Mbps'){ echo 'selected'; } ?>>Dedicated di atas 100 Mbps</option>
					</select>
				</div>
				</div>
				<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4 label-align ">DATA PERANGKAT SISI BTS</label>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align"> Radio</label>
				<div class="col-md-6 col-sm-6">
					<select name="radio_bts" class="form-control" >
						<option value="">Pilih Radio</option>
						<option value="Groove A52" <?php if($data['radio_bts'] == 'Groove'){ echo 'selected'; } ?>>Groove A52</option>
						<option value="Metal" <?php if($data['radio_bts'] == 'Metal'){ echo 'selected'; } ?>>Metal</option>
						<option value="Netmetal" <?php if($data['radio_bts'] == 'Netmetal'){ echo 'selected'; } ?>>Netmetal</option>
						<option value="Nanostation M5" <?php if($data['radio_bts'] == 'Nanostation M5'){ echo 'selected'; } ?>>Nanostation M5</option>
						<option value="Litebeam M5" <?php if($data['radio_bts'] == 'Litebeam M5'){ echo 'selected'; } ?>>Litebeam M5</option>
						<option value="Litebeam AC" <?php if($data['radio_bts'] == 'Litebeam AC'){ echo 'selected'; } ?>>Litebeam AC</option>
						<option value="Bullet M5" <?php if($data['radio_bts'] == 'Bullet M5'){ echo 'selected'; } ?>>Bullet M5</option>
						<option value="Bullet AC" <?php if($data['radio_bts'] == 'Bullet AC'){ echo 'selected'; } ?>>Bullet AC</option>
						<option value="Powerbeam AC Gen2" <?php if($data['radio_bts'] == 'Powerbeam AC Gen2'){ echo 'selected'; } ?>>Powerbeam AC Gen 2</option>
						<option value="Rocket AC Lite" <?php if($data['radio_bts'] == 'Rocket AC Lite'){ echo 'selected'; } ?>>Rocket AC Lite</option>
						<option value="Rocket M5" <?php if($data['radio_bts'] == 'Rocket M5'){ echo 'selected'; } ?>>Rocket M5</option>
						<option value="AirFiber 5 XHD" <?php if($data['radio_bts'] == 'AirFiber 5 XHD'){ echo 'selected'; } ?>>AirFiber 5 XHD</option>
						
					</select>
				</div>
			</div>
	
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Antena</label>
				<div class="col-md-6 col-sm-6">
					<select name="antena_bts" class="form-control" >
						<option value="">Pilih Antena</option>
						<option value="Antena Grid 27 dBi" <?php if($data['antena_bts'] == 'Antena Grid 27 dBi'){ echo 'selected'; } ?>>Antena Grid 27 dBi</option>
						<option value="Antena Grid 30 dBi" <?php if($data['antena_bts'] == 'Antena Grid 30 dBi'){ echo 'selected'; } ?>>Antena Grid 30 dBi</option>
						<option value="Rocket Dish 30 LW" <?php if($data['antena_bts'] == 'Rocket Dish 30 LW'){ echo 'selected'; } ?>>Rocket Dish 30 LW</option>
						<option value="Rocket Dish 31 AC" <?php if($data['antena_bts'] == 'Rocket Dish 31 AC'){ echo 'selected'; } ?>>Rocket Dish 31 AC</option>			
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Adaptor</label>
				<div class="col-md-6 col-sm-6">
					<select name="adaptor_bts" class="form-control" >
						<option value="">Pilih Adaptor</option>
						<option value="12v" <?php if($data['adaptor_bts'] == '12v'){ echo 'selected'; } ?>>Adaptor 12 Volt</option>
						<option value="24v" <?php if($data['adaptor_bts'] == '24v'){ echo 'selected'; } ?>>Adaptor 24 Volt</option>
						<option value="48v" <?php if($data['adaptor_bts'] == '48v'){ echo 'selected'; } ?>>Adaptor 48 Volt</option>				
					</select>
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Pole / Tower</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="pole_bts" class="form-control" value="<?php echo $data['pole_bts']; ?>" required >
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kabel</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="kabel_bts" class="form-control" required value="<?php echo $data['kabel_bts']; ?>">
				</div>
			</div>

			<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4 label-align " style="align=right">DATA PERANGKAT SISI KLIENT</label>
			</div>

<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align"> Radio</label>
				<div class="col-md-6 col-sm-6">
					<select name="radio_klient" class="form-control" >
						<option value="">Pilih Radio</option>
						<option value="Groove A52" <?php if($data['radio_klient'] == 'Groove'){ echo 'selected'; } ?>>Groove A52</option>
						<option value="Metal" <?php if($data['radio_klient'] == 'Metal'){ echo 'selected'; } ?>>Metal</option>
						<option value="Netmetal" <?php if($data['radio_klient'] == 'Netmetal'){ echo 'selected'; } ?>>Netmetal</option>
						<option value="Nanostation M5" <?php if($data['radio_klient'] == 'Nanostation M5'){ echo 'selected'; } ?>>Nanostation M5</option>
						<option value="Litebeam M5" <?php if($data['radio_klient'] == 'Litebeam M5'){ echo 'selected'; } ?>>Litebeam M5</option>
						<option value="Litebeam AC" <?php if($data['radio_klient'] == 'Litebeam AC'){ echo 'selected'; } ?>>Litebeam AC</option>
						<option value="Bullet M5" <?php if($data['radio_klient'] == 'Bullet M5'){ echo 'selected'; } ?>>Bullet M5</option>
						<option value="Bullet AC" <?php if($data['radio_klient'] == 'Bullet AC'){ echo 'selected'; } ?>>Bullet AC</option>
						<option value="Powerbeam AC Gen2" <?php if($data['radio_klient'] == 'Powerbeam AC Gen2'){ echo 'selected'; } ?>>Powerbeam AC Gen 2</option>
						<option value="Rocket AC Lite" <?php if($data['radio_klient'] == 'Rocket AC Lite'){ echo 'selected'; } ?>>Rocket AC Lite</option>
						<option value="Rocket M5" <?php if($data['radio_klient'] == 'Rocket M5'){ echo 'selected'; } ?>>Rocket M5</option>
						<option value="AirFiber 5 XHD" <?php if($data['radio_klient'] == 'AirFiber 5 XHD'){ echo 'selected'; } ?>>AirFiber 5 XHD</option>
						
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Antena</label>
				<div class="col-md-6 col-sm-6">
					<select name="antena_klient" class="form-control" >
						<option value="">Pilih Antena</option>
						<option value="Antena Grid 27 dBi" <?php if($data['antena_klient'] == 'Antena Grid 27 dBi'){ echo 'selected'; } ?>>Antena Grid 27 dBi</option>
						<option value="Antena Grid 30 dBi" <?php if($data['antena_klient'] == 'Antena Grid 30 dBi'){ echo 'selected'; } ?>>Antena Grid 30 dBi</option>
						<option value="Rocket Dish 30 LW" <?php if($data['antena_klient'] == 'Rocket Dish 30 LW'){ echo 'selected'; } ?>>Rocket Dish 30 LW</option>
						<option value="Rocket Dish 31 AC" <?php if($data['antena_klient'] == 'Rocket Dish 31 AC'){ echo 'selected'; } ?>>Rocket Dish 31 AC</option>			
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Adaptor</label>
				<div class="col-md-6 col-sm-6">
					<select name="adaptor_klient" class="form-control" >
						<option value="">Pilih Adaptor</option>
						<option value="12v" <?php if($data['adaptor_klient'] == '12v'){ echo 'selected'; } ?>>Adaptor 12 Volt</option>
						<option value="24v" <?php if($data['adaptor_klient'] == '24v'){ echo 'selected'; } ?>>Adaptor 24 Volt</option>
						<option value="48v" <?php if($data['adaptor_klient'] == '48v'){ echo 'selected'; } ?>>Adaptor 48 Volt</option>				
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Router</label>
				<div class="col-md-6 col-sm-6">
					<select name="router_klient" class="form-control" >
						<option value="">Pilih Router</option>
						<option value="RB 941 / HapLite" <?php if($data['router_klient'] == 'RB 941 / HapLite'){ echo 'selected'; } ?>>RB 941 / HapLite</option>
						<option value="RB 750R2" <?php if($data['router_klient'] == 'RB 750R2'){ echo 'selected'; } ?>>RB 750R2</option>
						<option value="RB 750GR3" <?php if($data['router_klient'] == 'RB 750GR3'){ echo 'selected'; } ?>>RB 750GR3</option>	
						<option value="RB 450GX4" <?php if($data['router_klient'] == 'RB 450GX4'){ echo 'selected'; } ?>>RB 450GX4</option>
						<option value="RB 3011" <?php if($data['router_klient'] == 'RB 3011'){ echo 'selected'; } ?>>RB 3011</option>	
						<option value="RB CCR" <?php if($data['router_klient'] == 'RB CCR'){ echo 'selected'; } ?>>RB CCR</option>	
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">AP</label>
				<div class="col-md-6 col-sm-6">
					<select name="ap_klient" class="form-control" >
						<option value="">Pilih AP</option>
						<option value="TPLINK 840"  <?php if($data['ap_klient'] == 'TPLINK 840'){ echo 'selected'; } ?>>TPLINK TLWR840N</option>
						<option value="TENDA AC 6" <?php if($data['ap_klient'] == 'TENDA AC 6'){ echo 'selected'; } ?>>TENDA AC 6</option>
						<option value="UNIFI AC LITE" <?php if($data['ap_klient'] == 'UNIFI AC LITE'){ echo 'selected'; } ?>>UNIFI AC LITE</option>		
						<option value="UNIFI AC LR" <?php if($data['ap_klient'] == 'UNIFI AC LR'){ echo 'selected'; } ?>>UNIFI AC LR</option>	
						<option value="UNIFI AC PRO" <?php if($data['ap_klient'] == 'UNIFI AC PRO'){ echo 'selected'; } ?>>UNIFI AC PRO</option>	
						<option value="LOCO M2" <?php if($data['ap_klient'] == 'LOCO M2'){ echo 'selected'; } ?>>Loco M2</option>	
						<option value="Nano M2"> <?php if($data['ap_klient'] == 'Nano M2'){ echo 'selected'; } ?>Nano M2</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Pole / Tower</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="pole_klient" class="form-control" required value="<?php echo $data['pole_klient']; ?>">
				</div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kabel</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="kabel_klient" class="form-control" required value="<?php echo $data['kabel_klient']; ?>">
				</div>
			</div>
			<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4 label-align " style="align=right">KETERANGAN</label>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="keterangan" class="form-control" required value="<?php echo $data['keterangan']; ?>">
				</div>
			</div>
			<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4 label-align " style="align=right">DOKUMENTASI</label>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gambar 1</label>
				<div class="col-md-6 col-sm-6">
				<img src="images/<?php echo $data['gambarsatu']; ?>"  width=100px>
					<input type="file" name="gambarsatu" value="<?php echo $data['nama_gambar1']; ?>">
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gambar 2</label>
				<div class="col-md-6 col-sm-6">
				<img src="images/<?php echo $data['gambardua']; ?>"  width=100px>
					<input type="file" name="gambardua" value="<?php echo $data['nama_gambar2']; ?>">
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gambar 3</label>
				<div class="col-md-6 col-sm-6">
				<img src="images/<?php echo $data['gambartiga']; ?>"  width=100px>
					<input type="file" name="gambartiga" value="<?php echo $data['nama_gambar3']; ?>">
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gambar 4</label>
				<div class="col-md-6 col-sm-6">
				<img src="images/<?php echo $data['gambarempat']; ?>"  width=100px>
					<input type="file" name="gambarempat" value="<?php echo $data['nama_gambar4']; ?>">
				</div>
			</div>
			



			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="index.php?page=tampil_installasi" class="btn btn-warning">Kembali</a>
				</div>
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