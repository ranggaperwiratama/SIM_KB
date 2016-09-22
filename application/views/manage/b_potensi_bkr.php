<legend>KELOMPOK BKR: <?php echo $baca->NAMA_KELOMPOK_BKR ?></legend>
<legend>KETUA: <?php echo $baca->NAMA_KETUA_BKR ?></legend>
<legend>PEMBINA: <?php echo $baca->NAMA_PEMBINA_BKR ?></legend>
<legend>TAHUN: <?php echo $baca->TAHUN_BKR ?></legend>
	
	
			<legend>Register Potensi BKR</legend>
			<?=$this->session->flashdata("k");?>
			<form action="<?=base_URL()?>index.php/manage/register_info_bkr" method="post"name="f_register_kader_bkr">
			<input type="hidden" name="id" value="<?=$baca->ID_WILAYAH_BKR?>">
			<legend>Informasi Kelompok</legend>
			<div id="komentar">
			
			
			<table width="100%"  class="table table-condensed">
			<tr>
				<th width="20%">SK Pengukuhan</th>
				<th width="20%">Sertifikasi Kelompok</th>
				<th width="20%">Keterpaduan Kelompok</th>
				<th width="20%">Buku BKR</th>
				<th width="20%">Sumber Dana</th>
			</tr>
			<?php 
			$q_bkr	= $this->db->query("SELECT * FROM info_kelompok_bkr WHERE id_wilayah_bkr = '".$baca->ID_WILAYAH_BKR."'")->result();
			
			foreach ($q_bkr as $data) {
			?>
			<tr>
				<td style="text-align: center"><?=$data->SK_PENGUKUHAN_BKR?></td>
				<td style="text-align: center"><? echo $data->SERTIFIKASI_BKR; ?></td>
				<td style="text-align: center"><?=$data->KETERPADUAN_BKR;?></td>
				<td style="text-align: center"><?php echo $data->BUKU_BKR; ?></td>
				<td style="text-align: center"><? echo $data->SUMBER_DANA_BKR;?></td>
			</tr>
			<?php } ?>
			</table>
			<table width="100%">
			<tr>
				<th width="14%">SK Pengukuhan</th>
				<th width="14%">Sertifikasi Kelompok</th>
				<th width="14%">Keterpaduan Kelompok</th>
				<th width="14%">Buku BKR</th>
				<th width="14%">Sumber Dana</th>
			</tr>
			<tr>
			<td style="text-align: center"><input type="checkbox" class="span12" value='false' name="sk" placeholder=""></td>
			<td>
				<?php $sertifikasi = array('Dasar','Berkembang','Paripurna'); ?>
				<select id="selectsertifikasi" onchange="changeFuncsertifikasi();">
				<option value="" selected="selected" disabled="disabled">---</option>
				<?php foreach ($sertifikasi as $key => $b): ?>
				<option value="<?php echo $b ?>"><?php echo $b ?></option>
				<?php endforeach; ?>
				</select>  
				<script type="text/javascript">
				   function changeFuncsertifikasi() {
					var selectBox = document.getElementById("selectsertifikasi");
					var selectedValue = selectBox.options[selectBox.selectedIndex].value;
					document.getElementById('sertifikasi').value = selectedValue;
				   }
				</script>
				<input id="sertifikasi" class="input-small" type="hidden" name="sertifikasi" placeholder="" value="" required></td>
			<td style="text-align: center">
				<?php $keterpaduan = array('Ekonomi Produktif','Lainnya'); ?>
				<select id="selectketerpaduan" onchange="changeFuncketerpaduan();">
				<option value="" selected="selected" disabled="disabled">---</option>
				<?php foreach ($keterpaduan as $key => $b): ?>
				<option value="<?php echo $b ?>"><?php echo $b ?></option>
				<?php endforeach; ?>
				</select>  
				<script type="text/javascript">
				   function changeFuncketerpaduan() {
					var selectBox = document.getElementById("selectketerpaduan");
					var selectedValue = selectBox.options[selectBox.selectedIndex].value;
					document.getElementById('keterpaduan').value = selectedValue;
				   }
				</script>
				<input id="keterpaduan" class="input-small" type="hidden" name="keterpaduan" placeholder="" value="" required></td>
				<td style="text-align: center"><input type="checkbox" class="span12" value='false' name="buku_bkr" placeholder=""></td>
				<td style="text-align: center">
				<?php $sumber_dana = array('APBN','APBD','Swadaya','Lainnya'); ?>
				<select id="selectsumber_dana" onchange="changeFuncsumber_dana();">
				<option value="" selected="selected" disabled="disabled">---</option>
				<?php foreach ($sumber_dana as $key => $b): ?>
				<option value="<?php echo $b ?>"><?php echo $b ?></option>
				<?php endforeach; ?>
				</select>  
				<script type="text/javascript">
				   function changeFuncsumber_dana() {
					var selectBox = document.getElementById("selectsumber_dana");
					var selectedValue = selectBox.options[selectBox.selectedIndex].value;
					document.getElementById('sumber_dana').value = selectedValue;
				   }
				</script>
				<input id="sumber_dana" class="input-small" type="hidden" name="sumber_dana" placeholder="" value="" required></td>
			<td><input type="submit" class="btn btn-primary" name="Simpan"></td>			
			</div>
			
			</form>		
			</table>
			<br>
			<br>
			
			<!-- Informasi Kader -->
			<legend>Informasi Kader</legend>
			<div id="komentar2">
			<table width="100%">
			<tr>
				<th width="14%">Jabatan</th>
				<th width="14%">Nama</th>
				<th width="14%">Pendidikan</th>
				<th width="14%">Pernah Pelatihan</th>
				<th width="14%">Pekerjaan</th>
				<th width="14%">Status PUS</th>
				<th width="14%">Kesertaan KB</th>
			</tr>
			<?php 
			$q_bkr	= $this->db->query("SELECT * FROM info_kader_bkr WHERE id_wilayah_bkr = '".$baca->ID_WILAYAH_BKR."'")->result();
			
			foreach ($q_bkr as $data) {
			?>
			<tr>
				<td style="text-align: center"><div class="well-large"><b><?=$data->JABATAN_BKR?></b></div></td>
				<td style="text-align: center"><?=$data->NAMA_KADER_BKR?></td>
				<td style="text-align: center"><?=$data->PENDIDIKAN_BKR?></td>
				<td style="text-align: center"><?=$data->PERNAH_PELATIHAN_BKR?></td>
				<td style="text-align: center"><?=$data->PEKERJAAN_BKR?></td>
				<td style="text-align: center"><?=$data->STATUS_PUS_KADER_BKR?></td>
				<td style="text-align: center"><?=$data->KESERTAAN_KB_KADER_BKR?></td>
			</tr>
			<?php } ?>
			</table>
			<form action="<?=base_URL()?>index.php/manage/register_kader_bkr" method="post"name="f_register_kader_bkr">
			<input type="hidden" name="id" value="<?=$baca->ID_WILAYAH_BKR?>">
			<table width="100%">
			<tr>
				<th width="14%">Jabatan</th>
				<th width="14%">Nama</th>
				<th width="14%">Pendidikan</th>
				<th width="14%">Pernah Pelatihan</th>
				<th width="14%">Pekerjaan</th>
				<th width="14%">Status PUS</th>
				<th width="14%">Kesertaan KB</th>
			</tr>
			<tr>
				<td style="text-align: center"><input type="text" class="span12" name="jabatan" placeholder="" required></td>
				<td style="text-align: center"><input type="text" class="span12" name="nama" placeholder="" required></td>
				<td style="text-align: center"><input type="text" class="span12" name="pendidikan" placeholder="" ></td>
				<td style="text-align: center"><input type="checkbox" class="span12" value='false' name="pelatihan" placeholder=""></td>
				<td style="text-align: center"><input type="text" class="span12" name="pekerjaan" placeholder="" ></td>
				<td style="text-align: center"><input type="checkbox" class="span12" value='false' name="pus" placeholder=""></td>
				<td style="text-align: center"><input type="checkbox" class="span12" value='false' name="kb" placeholder=""></td>
				<td><input type="submit" class="btn btn-primary" name="Simpan"></td>
			</tr>
			</table>
			</form>
			</div>
			<br>
			<br>
			
			<!-- Informasi Kegiatan Penyuluhan -->
			<legend>Informasi Kegiatan Penyuluhan</legend>
			<div id="komentar4">
			<table width="100%">
			<tr>
				<th width="50%">Materi Pertemuan</th>
				<th width="25%">Pemberian Materi</th>
				<th width="25%">Ada Diskusi</th>
			</tr>
			<?php 
			$q_bkr	= $this->db->query("SELECT * FROM kegiatan_penyuluhan_bkr WHERE id_wilayah_bkr = '".$baca->ID_WILAYAH_BKR."'")->result();
			
			foreach ($q_bkr as $data) {
			?>
			<tr>
				<td style="text-align: center"><div class="well-large"><b><?=$data->JUDUL_PENYULUHAN_BKR?></b></div></td>
				<td style="text-align: center"><?=$data->PEMBERIAN_MATERI_BKR?></td>
				<td style="text-align: center"><?=$data->ADA_DISKUSI_BKR?></td>
			</tr>
			<?php } ?>
			</table>
			<form action="<?=base_URL()?>index.php/manage/register_penyuluhan_bkr" method="post"name="f_register_penyuluhan_bkr">
			<input type="hidden" name="id" value="<?=$baca->ID_WILAYAH_BKR?>">
			<table width="100%">
			<tr>
				<th width="50%">Materi Pertemuan</th>
				<th width="25%">Pemberian Materi</th>
				<th width="25%">Ada Diskusi</th>
			</tr>
			<tr>
				<td style="text-align: center"><div class="well-large"><input type="text" class="span12" name="judul" placeholder="" required></div></td>
				<td style="text-align: center"><input type="checkbox" class="span12" value='false' name="materi" placeholder=""></td>
				<td style="text-align: center"><input type="checkbox" class="span12" value='false' name="diskusi" placeholder=""></td>
				<td><input type="submit" class="btn btn-primary" name="Simpan"></td>
			</tr>
			</table>
			</form>
			</div>
			<br>
			<br>
			<div class="span5">
			<legend>Tampil Report</legend>
			<form action="<?=base_URL()?>index.php/manage/laporan_potensi_bkr" method="post"name="f_register_kader_bkl">
			<input type="hidden" name="id" value="<?=$baca->ID_WILAYAH_BKR?>">
			<input type="submit" class="btn btn-primary" name="Simpan">
			</form>
			
			</div>
			