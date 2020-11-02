<?php

session_start();
 if (!isset($_SESSION['login'])){
   header ("location: login.php");
   exit;
 }


include('config.php'); ?>


	<div class="container" style="margin-top:20px">
    <center><img src="du.jpg" width=250px style="margin-bottom:15px"></center>
		<center><font size="6">LAPORAN INSTALLASI</font></center>
        
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


		<form action="index.php?page=lihat_installasi&id_pelanggan=<?php echo $id_pelanggan; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID Pelanggan</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['id_pelanggan']; ?>
                </div>
				
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Teknisi</label>
				
                <div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['nama_teknisi']; ?>
                </div>
				
			</div>
			<div class="item form-group">
  					 <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Installasi</label>
                       <div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['tgl_pasang']; ?>
                </div>
			 </div>
 		 
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Sales</label>
                <div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['nama_sales']; ?>
                </div>
			</div>
			<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4  label-align ">DATA PELANGGAN</label>
			</div>
	
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pelanggan</label>
                <div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['nama_pelanggan']; ?>
                </div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Penanggung Jawab</label>
                <div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['pic']; ?>
                </div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
                <div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['alamat']; ?>
                </div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nomor Telepon / HP</label>
                <div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['telepon']; ?>
                </div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Layanan</label>
                <div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['layanan']; ?>
                </div>
				</div>


				<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4  label-align ">HASIL INSTALLASI</label>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">POP</label>
                <div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['bts']; ?>
                </div>
				</div>

				<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Network IP Radio</label>
                <div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['ip_radio']; ?>
                </div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Network IP Public</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['ip_publik']; ?>
                </div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">SSID</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['ssid']; ?>
                </div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Signal</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['sinyal']; ?>
                </div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Bandwidth</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['bandwidth']; ?>
                </div>
				</div>
				<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4 label-align ">DATA PERANGKAT SISI BTS</label>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align"> Radio</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['radio_bts']; ?>
                </div>
			</div>
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Antena</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['antena_bts']; ?>
                </div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Adaptor</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['adaptor_bts']; ?>
                </div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Pole / Tower</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['pole_bts']; ?>
                </div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kabel</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['kabel_bts']; ?>
                </div>
			</div>
				<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4 label-align " style="align=right">DATA PERANGKAT SISI KLIENT</label>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align"> Radio</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['radio_klient']; ?>
                </div>
			</div>
			
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Antena</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['antena_klient']; ?>
                </div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Adaptor</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['adaptor_klient']; ?>
                </div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Router</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['router_klient']; ?>
                </div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">AP</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['ap_klient']; ?>
                </div>
			</div>

		
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Pole / Tower</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['pole_klient']; ?>
                </div>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kabel</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['kabel_klient']; ?>
                </div>
			</div>

			<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4 label-align " style="align=right">KETERANGAN</label>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Keterangan</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<?php echo $data['keterangan']; ?>
                </div>
			</div>

			<div class="item form-group">
			<label class="col-form-label col-md-4 col-sm-4 label-align " style="align=right">DOKUMENTASI</label>
			</div>

			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gambar 1</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<img src="images/<?php echo $data['gambarsatu']; ?>"  width=500px>
                </div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gambar 2</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<img src="images/<?php echo $data['gambardua']; ?>"  width=500px>
                </div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gambar 3</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<img src="images/<?php echo $data['gambartiga']; ?>"  width=500px>
                </div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gambar 4</label>
				<div class="col-form-label col-md-3 col-sm-3 ">
				<img src="images/<?php echo $data['gambarempat']; ?>"  width=500px>
                </div>
			</div> 
			
			
		</form>
	</div>
