<legend>KELOMPOK BKL: <?php echo $baca->NAMA_KELOMPOK_BKL ?></legend>
<legend>KETUA: <?php echo $baca->NAMA_KETUA_BKL ?></legend>
<legend>PEMBINA: <?php echo $baca->NAMA_PEMBINA_BKL ?></legend>
<legend>TAHUN: <?php echo $baca->TAHUN_BKL ?></legend>
	
	<legend>Register Anggota BKL</legend>
			<?=$this->session->flashdata("k");?>
			<form action="<?=base_URL()?>index.php/manage/register_bkl" method="post"name="f_register_bkl">
			<input type="hidden" name="id" value="<?=$baca->ID_WILAYAH_BKL?>">
			<legend>Daftar Anggota BKL</legend>
			<div id="komentar">
			
			
			<table width="100%"  class="table table-condensed">
			<tr>
				<th width="20%">Nama Keluarga</th>
				<th width="20%">Kesertaam BKL</th>
				<th width="20%">Status PUS</th>
				<th width="20%">Kesertaan KB</th>
				<th width="20%">Tahapan KS</th>
			</tr>
			<?php 
			$q_bkl	= $this->db->query("SELECT * FROM bkl WHERE id_wilayah_bkl = '".$baca->ID_WILAYAH_BKL."'")->result();
			
			foreach ($q_bkl as $data) {
			?>
			<tr>
				<td style="text-align: center"><div class="well-large"><b><?=$data->NAMA_KELUARGA_LANSIA?></b></div>
					<a href="<?php echo base_URL(); ?>index.php/manage/pre_register_bkl/hapus/<?=$baca->ID_WILAYAH_BKL?>/<?=$data->ID_BKL?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$data->NAMA_KELUARGA_LANSIA?>?');"><span class="icon-remove">&nbsp;&nbsp;</span></a>
				</td>
				<td style="text-align: center"><?=$data->KESERTAAN_BKL;?></td>
				<td style="text-align: center"><?=$data->STATUS_PUS_BKL;?></td>
				<td style="text-align: center"><?=$data->KESERTAAN_KB_BKL;?></td>
				<td style="text-align: center"><?=$data->TAHAPAN_KS_BKL;?></td>
			</tr>
			<?php } ?>
			</table>
			<table width="100%">
			<tr>
				<th width="20%">Nama Keluarga</th>
				<th width="20%">Kesertaam BKL</th>
				<th width="20%">Status PUS</th>
				<th width="20%">Kesertaan KB</th>
				<th width="20%">Tahapan KS</th>
			</tr>
			<tr>
				<td><input type="text" class="span12" name="nama_keluarga" placeholder="" required></td>
			<td><input type="checkbox" class="span12" value='false' name="kesertaan_bkl" placeholder=""></td>
			<td><input type="checkbox" class="span12" value='false' name="status_pus" placeholder=""></td>
			<td>
				<?php $kb = array('I','MOW','MOP','K','IPN','S','P','H','IAS','IAT', 'TIAL'); ?>
				<select id="selectkb" onchange="changeFunckb();">
				<option value="" selected="selected" disabled="disabled">---</option>
				<?php foreach ($kb as $key => $b): ?>
				<option value="<?php echo $b ?>"><?php echo $b ?></option>
				<?php endforeach; ?>
				</select>  
				<script type="text/javascript">
				   function changeFunckb() {
					var selectBox = document.getElementById("selectkb");
					var selectedValue = selectBox.options[selectBox.selectedIndex].value;
					document.getElementById('kb').value = selectedValue;
				   }
				</script>
				<input id="kb" class="input-small" type="hidden" name="keikutsertaan_kb" placeholder="" value="" required></td>
			<td>
			<?php $ks = array('S','I','II','III','III+'); ?>
			<select id="selectks" onchange="changeFuncks();">
			<option value="" selected="selected" disabled="disabled">---</option>
			<?php foreach ($ks as $key => $k): ?>
			<option value="<?php echo $k ?>"><?php echo $k ?></option>
			<?php endforeach; ?>
			</select>  
			<script type="text/javascript">
			   function changeFuncks() {
				var selectBox = document.getElementById("selectks");
				var selectedValue = selectBox.options[selectBox.selectedIndex].value;
				document.getElementById('ks').value = selectedValue;
			   }
			</script>
			<input id="ks" class="input-small" type="hidden" name="tahapan_ks" placeholder="" value="" required></td>
			<td><input type="submit" class="btn btn-primary" name="Simpan"></td>			
			</div>
			
			</form>		
			</table>
			<br>
			<br>
			
			<!-- Pembinaan BKL Bulanan -->
			<legend>Daftar Hadir BKL</legend>
			<div id="komentar2">
			<table width="100%">
			<tr>
				<th width="9%">Nama Keluarga</th>
				<th width="8%">Januari</th>
				<th width="8%">Februari</th>
				<th width="8%">Maret</th>
				<th width="8%">April</th>
				<th width="8%">Mei</th>
				<th width="8%">Juni</th>
				<th width="8%">Juli</th>
				<th width="8%">Agustus</th>
				<th width="8%">September</th>
				<th width="8%">Oktober</th>
				<th width="8%">November</th>
				<th width="8%">Desember</th>
			</tr>
			<?php 
			$q_bkl	= $this->db->query("SELECT * FROM bkl WHERE id_wilayah_bkl = '".$baca->ID_WILAYAH_BKL."'")->result();
			
			foreach ($q_bkl as $data) {
			?>
			<tr>
				<td style="text-align: center"><div class="well-large"><b><?=$data->NAMA_KELUARGA_LANSIA?></b></div>
				<a href="<?php echo base_URL(); ?>index.php/manage/pre_register_bkl/hapus/<?=$baca->ID_WILAYAH_BKL?>/<?=$data->ID_BKL?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$data->NAMA_KELUARGA_LANSIA?>?');"><span class="icon-remove">&nbsp;&nbsp;</span></a></td>
				<? for ($x = 1; $x <= 12; $x++) {?>
				<td style="text-align: center">
				<?php
				$q_ambil_pembinaan = $this->db->query("SELECT * FROM presensi_bkl WHERE kode_bulan = '".$x."' AND id_bkl =  '".$data->ID_BKL."'")->result();
				if(! $q_ambil_pembinaan){ ?> 
					<table width="100%"  class="table table-condensed">
					<tr>
						<th width="50%">HADIR</th>
						<th width="50%">TIDAK</th>
					</tr>
					<tr>
						<td style="text-align: center">
						<form action="<?=base_URL()?>index.php/manage/register_presensi_bkl" method="post" name="f_register_pembinaan_bkl">
						<input type="hidden" name="id" value="<?=$data->ID_BKL?>">
						<input type="hidden" name="id_wilayah" value="<?=$baca->ID_WILAYAH_BKL?>">
						<input type="hidden" name="kode_bulan" value="<?=$x?>">
						<input type="submit" class="btn btn-primary" name="Simpan">
						</form>
						</td>
						<td style="text-align: center">
						<form action="<?=base_URL()?>index.php/manage/register_absensi_bkl" method="post" name="f_register_pembinaan_bkl">
						<input type="hidden" name="id" value="<?=$data->ID_BKL?>">
						<input type="hidden" name="id_wilayah" value="<?=$baca->ID_WILAYAH_BKL?>">
						<input type="hidden" name="kode_bulan" value="<?=$x?>">
						<input type="submit" class="btn btn-primary" name="Simpan">
						</form>
						</td>
					</tr>
					</table>
		<?php } else {  ?>
					<table width="100%"  class="table table-condensed">
						<tr>
							<th width="100%">Kehadiran</th>
						</tr>
						<tr>
							<td style="text-align: center"><?=$q_ambil_pembinaan['0']->KEHADIRAN_BKL?></td>
						</tr>
					</table>
<?php		}?>
				</td>
				<?php } ?>
				</tr>
			<? } ?>
			</table>
			</div>
			<br>
			<br>
			