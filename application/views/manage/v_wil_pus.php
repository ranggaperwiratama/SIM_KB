<legend>Daftar Wilayah Pasangan Usia Subur</legend>
	<div class="span5">
	<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>index.php/manage/wil_pus/add/', '_self')">Data Baru</button>
	</div>
	<div class="span5">
	<legend>Laporan Bulanan Kecamatan</legend>
	<form action="<?=base_URL()?>index.php/manage/laporan_pus" method="post" name="f_laporan_pus">
	<select id="selectKec" onchange="changeFuncKec();">
	<?php $kecamatan = $this->db->query("SELECT kode_kecamatan, nama_kecamatan FROM master_kecamatan")->result(); ?>
	<option value="" selected="selected" disabled="disabled">---</option>
	<?php foreach ($kecamatan as $key => $kec): ?>
	<option value="<?php echo $kec->kode_kecamatan ?>"><?php echo $kec->nama_kecamatan ?></option>
	<?php endforeach; ?>
	</select>  
	<script type="text/javascript">
	   function changeFuncKec() {
		var selectBox = document.getElementById("selectKec");
		var selectedValue = selectBox.options[selectBox.selectedIndex].value;
		document.getElementById('kecamatan').value = selectedValue;
	   }
	</script>
	<input id="kecamatan" class="input-small" type="hidden" name="kode_kecamatan" placeholder="" value="" required>
	<select id="selectBul" onchange="changeFuncBul();">
	<?php $bulan = $this->db->query("SELECT * FROM master_bulan")->result(); ?>
	<option value="" selected="selected" disabled="disabled">---</option>
	<?php foreach ($bulan as $key => $bul): ?>
	<option value="<?php echo $bul->KODE_BULAN ?>"><?php echo $bul->NAMA_BULAN ?></option>
	<?php endforeach; ?>
	</select>  
	<script type="text/javascript">
	   function changeFuncBul() {
		var selectBox = document.getElementById("selectBul");
		var selectedValue = selectBox.options[selectBox.selectedIndex].value;
		document.getElementById('bulan').value = selectedValue;
	   }
	</script>
	<input id="bulan" class="input-small" type="hidden" name="kode_bulan" placeholder="" value="" required>
	<input type="submit" class="btn btn-primary" name="Simpan">
	</form>
	</div>
	<br><br>
			
				<?php echo $this->session->flashdata("k");?>
				

				<table width="100%"  class="table table-condensed">
					<tr>
						<th width="20%">No</th>
						<th width="20%">Nama Kelompok</th>
						<th width="20%">Alamat</th>
						<th width="20%">Tahun</th>
						<th width="20%">Control</th>
					</tr>
					
					<?php $i = 0 ?>
					<?php foreach ($data as $b):
					$i++;
					?>
					<tr>
						<td style="text-align: center"><?php echo $i; ?></td>
						<td style="text-align: center"><? echo $b->NAMA_KELOMPOK_KB ?></td>
						<td style="text-align: center">KECAMATAN: <?php echo $b->NAMA_KECAMATAN ?>, 
							KELURAHAN: <?php echo $b->NAMA_KELURAHAN ?>,
							RW: <?php echo $b->NAMA_RW ?>,
							RT: <?php echo $b->ANGKA_RT ?></td>
						<td style="text-align: center"><?=$b->TAHUN_PUS?></td>

						<td style="text-align: center">
						<a href="<?php echo base_URL(); ?>index.php/manage/wil_pus/edit/<?=$b->ID_WILAYAH_PUS?>"><span class="icon-pencil">&nbsp;&nbsp;</span></a>  
						<a href="<?php echo base_URL(); ?>index.php/manage/wil_pus/del/<?=$b->ID_WILAYAH_PUS ?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$b->NAMA_KELOMPOK_KB?>?');"><span class="icon-remove">&nbsp;&nbsp;</span></a>
						<a href="<?=base_URL()?>index.php/manage/pre_register_pus/baca/<?=$b->ID_WILAYAH_PUS?>/<?=getURLFriendly($b->NAMA_KELOMPOK_KB)?>">REGISTER</a>
						</td>
					</tr>	
					<?php endforeach ?>
				</table>
