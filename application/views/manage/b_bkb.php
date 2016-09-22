<legend>KELOMPOK BKB: <?php echo $baca->NAMA_KELOMPOK_BKB ?></legend>
<legend>KETUA: <?php echo $baca->NAMA_KETUA_BKB ?></legend>
<legend>PEMBINA: <?php echo $baca->NAMA_PEMBINA_BKB ?></legend>
<legend>TAHUN: <?php echo $baca->TAHUN_BKB ?></legend>
	
	
			<legend>Register Anggota BKB</legend>
			<?=$this->session->flashdata("k");?>
			<form action="<?=base_URL()?>index.php/manage/register_bkb" method="post"name="f_register_bkb">
			<input type="hidden" name="id" value="<?=$baca->ID_WILAYAH_BKB?>">
			<legend>Daftar Anggota BKB</legend>
			<div id="komentar">
			
			
			<table width="100%"  class="table table-condensed">
			<tr>
				<th width="12%">Nama Keluarga</th>
				<th width="8%">0 - < 1th</th>
				<th width="8%">1 - < 2th</th>
				<th width="8%">2 - < 3th</th>
				<th width="8%">3 - < 4th</th>
				<th width="8%">4 - < 5th</th>
				<th width="8%">5 - < 6th</th>
				<th width="8%">KKA</th>
				<th width="8%">Kesertaam BKB</th>
				<th width="8%">Status PUS</th>
				<th width="8%">Kesertaan KB</th>
				<th width="8%">Tahapan KS</th>
			</tr>
			<?php 
			$q_bkb	= $this->db->query("SELECT * FROM bkb WHERE id_wilayah_bkb = '".$baca->ID_WILAYAH_BKB."'")->result();
			
			foreach ($q_bkb as $data) {
			?>
			<tr>
				<td style="text-align: center"><div class="well-large"><b><?=$data->NAMA_KELUARGA_BALITA?></b></div>
					<a href="<?php echo base_URL(); ?>index.php/manage/pre_register_bkb/hapus/<?=$baca->ID_WILAYAH_BKB?>/<?=$data->ID_BKB?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$data->NAMA_KELUARGA_BALITA?>?');"><span class="icon-remove">&nbsp;&nbsp;</span></a>
				</td>
				<td style="text-align: center"><? echo $data->KATEGORI_UMUR_1; ?></td>
				<td style="text-align: center"><?=$data->KATEGORI_UMUR_2;?></td>
				<td style="text-align: center"><?php echo $data->KATEGORI_UMUR_3; ?></td>
				<td style="text-align: center"><? echo $data->KATEGORI_UMUR_4;?></td>
				<td style="text-align: center"><?=$data->KATEGORI_UMUR_5;?></td>
				<td style="text-align: center"><?=$data->KATEGORI_UMUR_6;?></td>
				<td style="text-align: center"><?=$data->KKA;?></td>
				<td style="text-align: center"><?=$data->KESERTAAN_BKB;?></td>
				<td style="text-align: center"><?=$data->STATUS_PUS_BKB;?></td>
				<td style="text-align: center"><?=$data->KESERTAAN_KB_BKB;?></td>
				<td style="text-align: center"><?=$data->TAHAPAN_KS_BKB;?></td>
			</tr>
			<?php } ?>
			</table>
			<table width="100%">
			<tr>
				<th width="12%">Nama Keluarga</th>
				<th width="8%">0 - < 1th</th>
				<th width="8%">1 - < 2th</th>
				<th width="8%">2 - < 3th</th>
				<th width="8%">3 - < 4th</th>
				<th width="8%">4 - < 5th</th>
				<th width="8%">5 - < 6th</th>
				<th width="8%">KKA</th>
				<th width="8%">Kesertaam BKB</th>
				<th width="8%">Status PUS</th>
				<th width="8%">Kesertaan KB</th>
				<th width="8%">Tahapan KS</th>
			</tr>
			<tr>
				<td><input type="text" class="span12" name="nama_keluarga" placeholder="" required></td>
			<td><input type="checkbox" class="span12" value='false' name="kat_1" placeholder=""></td>
			<td><input type="checkbox" class="span12" value='false' name="kat_2" placeholder=""></td>
			<td><input type="checkbox" class="span12" value='false' name="kat_3" placeholder=""></td>
			<td><input type="checkbox" class="span12" value='false' name="kat_4" placeholder=""></td>
			<td><input type="checkbox" class="span12" value='false' name="kat_5" placeholder=""></td>
			<td><input type="checkbox" class="span12" value='false' name="kat_6" placeholder=""></td>
			<td><input type="checkbox" class="span12" value='false' name="kesertaan_bkb" placeholder=""></td>
			<td><input type="checkbox" class="span12" value='false' name="status_pus" placeholder=""></td>
			<td><input type="checkbox" class="span12" value='false' name="kka" placeholder=""></td>
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
			
			<!-- Pembinaan BKB Bulanan -->
			<legend>Daftar Hadir BKB</legend>
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
			$q_bkb	= $this->db->query("SELECT * FROM bkb WHERE id_wilayah_bkb = '".$baca->ID_WILAYAH_BKB."'")->result();
			
			foreach ($q_bkb as $data) {
			?>
			<tr>
				<td style="text-align: center"><div class="well-large"><b><?=$data->NAMA_KELUARGA_BALITA?></b></div>
				<a href="<?php echo base_URL(); ?>index.php/manage/pre_register_bkb/hapus/<?=$baca->ID_WILAYAH_BKB?>/<?=$data->ID_BKB?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$data->NAMA_KELUARGA_BALITA?>?');"><span class="icon-remove">&nbsp;&nbsp;</span></a></td>
				<? for ($x = 1; $x <= 12; $x++) {?>
				<td style="text-align: center">
				<?php
				$q_ambil_pembinaan = $this->db->query("SELECT * FROM presensi_bkb WHERE kode_bulan = '".$x."' AND id_bkb =  '".$data->ID_BKB."'")->result();
				if(! $q_ambil_pembinaan){ ?> 
					<table width="100%"  class="table table-condensed">
					<tr>
						<th width="50%">HADIR</th>
						<th width="50%">TIDAK</th>
					</tr>
					<tr>
						<td style="text-align: center">
						<form action="<?=base_URL()?>index.php/manage/register_presensi_bkb" method="post" name="f_register_pembinaan_bkb">
						<input type="hidden" name="id" value="<?=$data->ID_BKB?>">
						<input type="hidden" name="id_wilayah" value="<?=$baca->ID_WILAYAH_BKB?>">
						<input type="hidden" name="kode_bulan" value="<?=$x?>">
						<input type="submit" class="btn btn-primary" name="Simpan">
						</form>
						</td>
						<td style="text-align: center">
						<form action="<?=base_URL()?>index.php/manage/register_absensi_bkb" method="post" name="f_register_pembinaan_bkb">
						<input type="hidden" name="id" value="<?=$data->ID_BKB?>">
						<input type="hidden" name="id_wilayah" value="<?=$baca->ID_WILAYAH_BKB?>">
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
							<td style="text-align: center"><?=$q_ambil_pembinaan['0']->KEHADIRAN_BKB?></td>
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
			