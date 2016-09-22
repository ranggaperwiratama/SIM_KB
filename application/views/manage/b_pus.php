<div class="span5">
<legend>KELOMPOK KB: <?php echo $baca->NAMA_KELOMPOK_KB ?></legend>
<legend>KETUA: <?php echo $baca->NAMA_KETUA ?></legend>
<legend>PLKB: <?php echo $baca->NAMA_PLKB ?></legend>
<legend>TAHUN: <?php echo $baca->TAHUN_PUS ?></legend>
</div>
<div class="span5">
<legend>KECAMATAN: <?php echo $baca->NAMA_KECAMATAN ?></legend>
<legend>KELURAHAN: <?php echo $baca->NAMA_KELURAHAN ?></legend>
<legend>RW: <?php echo $baca->NAMA_RW ?></legend>
<legend>RT: <?php echo $baca->ANGKA_RT ?></legend>
</div>

	
			
			<legend>Daftar Pasangan Usia Subur</legend>
			<div id="komentar">
			
			
			<table width="100%"  class="table table-condensed">
			<tr>
				<th width="12%">Nama Isteri & Suami</th>
				<th width="9%">Umur Isteri</th>
				<th width="9%">Jumlah Anak</th>
				<th width="9%">Umur Anak Terkecil</th>
				<th width="9%">Tahapan KS</th>
				<th width="9%">JAMKESNAS</th>
				<th width="9%">Keikutsertaan KB</th>
				<th width="9%">Pemerinta/Bukan</th>
				<th width="21%">
				<form action="<?=base_URL()?>index.php/manage/pre_register_pus/baca/<?=$baca->ID_WILAYAH_PUS?>/<?=$baca->NAMA_KELOMPOK_KB?>" method="post" name="f_laporan_pus">
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
				</th>
			</tr>
			<?php 
			$q_pus	= $this->db->query("SELECT * FROM pasangan_usia_subur WHERE id_wilayah_pus = '".$baca->ID_WILAYAH_PUS."'")->result();
			
			foreach ($q_pus as $data) {
			?>
			<tr>
				<td style="text-align: center"><div class="well-large"><b><?=$data->ISTERI_PUS?></b> & <?=$data->SUAMI_PUS?></div>
				<a href="<?php echo base_URL(); ?>index.php/manage/pre_register_pus/hapus/<?=$baca->ID_WILAYAH_PUS?>/<?=$data->ID_PUS?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$data->ISTERI_PUS?>?');"><span class="icon-remove">&nbsp;&nbsp;</span></a></td>
				<td style="text-align: center"><? echo $data->UMUR_ISTERI_PUS; ?></td>
				<td style="text-align: center"><?=$data->JUMLAH_ANAK_PUS;?></td>
				<td style="text-align: center"><?php echo $data->UMUR_ANAK_TERKECIL_PUS; ?></td>
				<td style="text-align: center"><? echo $data->TAHAPAN_KS_PUS;?></td>
				<td style="text-align: center"><?=$data->PESERTA_JAMKESNAS_PUS;?></td>
				<td style="text-align: center"><?=$data->KEIKUTSERTAAN_KB_PUS;?></td>
				<td style="text-align: center"><?=$data->PEMERINTAH_SWASTA;?></td>
				<td style="text-align: center">
				<?php
				$q_ambil_pembinaan = $this->db->query("SELECT * FROM hasil_pembinaan_pus WHERE kode_bulan = '".$kode_bulan."' AND id_pus =  '".$data->ID_PUS."'")->result();
				if(! $q_ambil_pembinaan){ ?> 
					<form action="<?=base_URL()?>index.php/manage/register_pembinaan_pus" method="post"name="f_register_pembinaan_pus">
					<input type="hidden" name="id" value="<?=$data->ID_PUS?>">
					<input type="hidden" name="id_wilayah" value="<?=$baca->ID_WILAYAH_PUS?>">
					<input type="hidden" name="tahun" value="<?=$baca->TAHUN_PUS?>">
					<input type="hidden" name="kode_bulan" value="<?=$kode_bulan?>">
					<table width="100%"  class="table table-condensed">
					<tr>
						<th width="20%">Tahap KS</th>
						<th width="20%">KPS/KSI</th>
						<th width="20%">      PBI</th>
						<th width="20%">Bukan PBI</th>
						<th width="20%">  Non JKN</th>
					</tr>
					<tr>
						<td style="text-align: center"><?php $ks = array('II','III','III+'); ?>
							<select id="selectks<?=$data->ID_PUS?><?=$kode_bulan?>" onchange="changeFuncks<?=$data->ID_PUS?><?=$kode_bulan?>();">
							<option value="" selected="selected" disabled="disabled">---</option>
							<?php foreach ($ks as $key => $k): ?>
							<option value="<?php echo $k ?>"><?php echo $k ?></option>
							<?php endforeach; ?>
							</select>  
							<script type="text/javascript">
							   function changeFuncks<?=$data->ID_PUS?><?=$kode_bulan?>() {
								var selectBox = document.getElementById("selectks<?=$data->ID_PUS?><?=$kode_bulan?>");
								var selectedValue = selectBox.options[selectBox.selectedIndex].value;
								document.getElementById('ks<?=$data->ID_PUS?><?=$kode_bulan?>').value = selectedValue;
							   }
							</script>
							<input id="ks<?=$data->ID_PUS?><?=$kode_bulan?>" class="input-small" type="hidden" name="tahapan_ks" placeholder="" value=""></td>
						<td style="text-align: center"><?php $kps = array('S','I'); ?>
							<select id="selectkps<?=$data->ID_PUS?><?=$kode_bulan?>" onchange="changeFunckps<?=$data->ID_PUS?><?=$kode_bulan?>();">
							<option value="" selected="selected" disabled="disabled">---</option>
							<?php foreach ($kps as $key => $k): ?>
							<option value="<?php echo $k ?>"><?php echo $k ?></option>
							<?php endforeach; ?>
							</select>  
							<script type="text/javascript">
							   function changeFunckps<?=$data->ID_PUS?><?=$kode_bulan?>() {
								var selectBox = document.getElementById("selectkps<?=$data->ID_PUS?><?=$kode_bulan?>");
								var selectedValue = selectBox.options[selectBox.selectedIndex].value;
								document.getElementById('kps<?=$data->ID_PUS?><?=$kode_bulan?>').value = selectedValue;
							   }
							</script>
							<input id="kps<?=$data->ID_PUS?><?=$kode_bulan?>" class="input-small" type="hidden" name="kps_ksi" placeholder="" value=""></td>
						<td style="text-align: center"><?php $kb = array('I','MOW','MOP','K','IPN','S','P','H','IAS','IAT', 'TIAL'); ?>
							<select id="selectpbi<?=$data->ID_PUS?><?=$kode_bulan?>" onchange="changeFuncpbi<?=$data->ID_PUS?><?=$kode_bulan?>();">
							<option value="" selected="selected" disabled="disabled">---</option>
							<?php foreach ($kb as $key => $b): ?>
							<option value="<?php echo $b ?>"><?php echo $b ?></option>
							<?php endforeach; ?>
							</select>  
							<script type="text/javascript">
							   function changeFuncpbi<?=$data->ID_PUS?><?=$kode_bulan?>() {
								var selectBox = document.getElementById("selectpbi<?=$data->ID_PUS?><?=$kode_bulan?>");
								var selectedValue = selectBox.options[selectBox.selectedIndex].value;
								document.getElementById('pbi<?=$data->ID_PUS?><?=$kode_bulan?>').value = selectedValue;
							   }
							</script>
							<input id="pbi<?=$data->ID_PUS?><?=$kode_bulan?>" class="input-small" type="hidden" name="pbi" placeholder="" value="" ></td>
						<td style="text-align: center"><?php $kb = array('I','MOW','MOP','K','IPN','S','P','H','IAS','IAT', 'TIAL'); ?>
							<select id="selectnonpbi<?=$data->ID_PUS?><?=$kode_bulan?>" onchange="changeFuncnonpbi<?=$data->ID_PUS?><?=$kode_bulan?>();">
							<option value="" selected="selected" disabled="disabled">---</option>
				
							<?php foreach ($kb as $key => $b): ?>
							<option value="<?php echo $b ?>"><?php echo $b ?></option>
							<?php endforeach; ?>
							</select>  
							<script type="text/javascript">
							   function changeFuncnonpbi<?=$data->ID_PUS?><?=$kode_bulan?>() {
								var selectBox = document.getElementById("selectnonpbi<?=$data->ID_PUS?><?=$kode_bulan?>");
								var selectedValue = selectBox.options[selectBox.selectedIndex].value;
								document.getElementById('nonpbi<?=$data->ID_PUS?><?=$kode_bulan?>').value = selectedValue;
							   }
							</script>
							<input id="nonpbi<?=$data->ID_PUS?><?=$kode_bulan?>" class="input-small" type="hidden" name="bukan_pbi" placeholder="" value="" ></td>
						<td style="text-align: center"><?php $kb = array('I','MOW','MOP','K','IPN','S','P','H','IAS','IAT', 'TIAL'); ?>
							<select id="selectnonjkn<?=$data->ID_PUS?><?=$kode_bulan?>" onchange="changeFuncnonjkn<?=$data->ID_PUS?><?=$kode_bulan?>();">
							<option value="" selected="selected" disabled="disabled">---</option>
				
							<?php foreach ($kb as $key => $b): ?>
							<option value="<?php echo $b ?>"><?php echo $b ?></option>
							<?php endforeach; ?>
							</select>  
							<script type="text/javascript">
							   function changeFuncnonjkn<?=$data->ID_PUS?><?=$kode_bulan?>() {
								var selectBox = document.getElementById("selectnonjkn<?=$data->ID_PUS?><?=$kode_bulan?>");
								var selectedValue = selectBox.options[selectBox.selectedIndex].value;
								document.getElementById('nonjkn<?=$data->ID_PUS?><?=$kode_bulan?>').value = selectedValue;
							   }
							</script>
							<input id="nonjkn<?=$data->ID_PUS?><?=$kode_bulan?>" class="input-small" type="hidden" name="non_jkn" placeholder="" value="" ></td>
						<td style="text-align: center"><input type="submit" class="btn btn-primary" name="Simpan"></td>
					</tr>
					</table>
					</form>
		<?php } else {  ?>
					<table width="100%"  class="table table-condensed">
						<tr>
							<th width="20%">Tahap KS</th>
							<th width="20%">KPS/KSI</th>
							<th width="20%">PBI</th>
							<th width="20%">Bukan PBI</th>
							<th width="20%">Non JKN</th>
						</tr>
						<tr>
							<td style="text-align: center"><?=$q_ambil_pembinaan['0']->SELURUH_TAHAPAN_KS?></td>
							<td style="text-align: center"><?=$q_ambil_pembinaan['0']->KPS_KSI?></td>
							<td style="text-align: center"><?=$q_ambil_pembinaan['0']->PBI?></td>
							<td style="text-align: center"><?=$q_ambil_pembinaan['0']->BUKAN_PBI?></td>
							<td style="text-align: center"><?=$q_ambil_pembinaan['0']->NON_JKN?></td>
						</tr>
					</table>
<?php		}?>
				</td>
			</tr>
			<?php } ?>
			
			</table>
			<form action="<?=base_URL()?>index.php/manage/register_pus" method="post"name="f_register_pus">
			<input type="hidden" name="id" value="<?=$baca->ID_WILAYAH_PUS?>">
			<table width="100%"  class="table table-condensed">
			<tr>
				<th width="11%">Nama Isteri</th>
				<th width="11%">Suami</th>
				<th width="11%">Umur Isteri</th>
				<th width="11%">Jumlah Anak</th>
				<th width="11%">Umur Anak Terkecil</th>
				<th width="11%">Tahapan KS</th>
				<th width="11%">JAMKESNAS</th>
				<th width="11%">Keikutsertaan KB</th>
				<th width="11%">Pemerinta/Bukan</th>
			</tr>
			<tr>
				<td><input type="text" class="span12" name="isteri" placeholder="" required></td>
				<td><input type="text" class="span12" name="suami"  placeholder="" required></td>
				<td><input type="text" class="span12" name="umur_isteri" placeholder="" required></td>
				<td><input type="text" class="span12" name="jumlah_anak"  placeholder="" required></td>
				<td><label><input type="text" class="span12" name="umur_anak_terkecil" placeholder="" required></td>
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
				<input id="ks" class="input-small" type="hidden" name="tahapan_ks" placeholder="" value=""></td>
				<td><input type="checkbox" class="span12" value='false' name="peserta_jamkesnas" placeholder=""></td>
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
				<input id="kb" class="input-small" type="hidden" name="keikutsertaan_kb" placeholder="" value="" ></td>
				<td><input type="checkbox" class="span12" value='false' name="pemerintah_swasta" placeholder=""></td>
				<td><input type="submit" class="btn btn-primary" name="Simpan"></td>
			</tr>
			</table>
			</form>
			</div>
			<br>
			<br>
			
			<!-- Pembinaan PUS Bulanan -->
			<legend>Hasil Pembinaan PUS</legend>
			<div id="komentar2">
			<table width="100%"  class="table table-condensed">
			<tr>
				<th width="9%">Nama Isteri</th>
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
			$q_pus	= $this->db->query("SELECT * FROM pasangan_usia_subur WHERE id_wilayah_pus = '".$baca->ID_WILAYAH_PUS."'")->result();
			
			foreach ($q_pus as $data) {
			?>
			<tr>
				<td style="text-align: center"><div class="well-large"><b><?=$data->ISTERI_PUS?></b> & <?=$data->SUAMI_PUS?></div>
				<a href="<?php echo base_URL(); ?>index.php/manage/pre_register_pus/hapus/<?=$baca->ID_WILAYAH_PUS?>/<?=$data->ID_PUS?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$data->ISTERI_PUS?>?');"><span class="icon-remove">&nbsp;&nbsp;</span></a></td>
				<? for ($x = 1; $x <= 12; $x++) {?>
				<td style="text-align: center">
				<?php
				$q_ambil_pembinaan = $this->db->query("SELECT * FROM hasil_pembinaan_pus WHERE kode_bulan = '".$x."' AND id_pus =  '".$data->ID_PUS."'")->result();
				if(! $q_ambil_pembinaan){ ?> 
					<form action="<?=base_URL()?>index.php/manage/register_pembinaan_pus" method="post"name="f_register_pembinaan_pus">
					<input type="hidden" name="id" value="<?=$data->ID_PUS?>">
					<input type="hidden" name="id_wilayah" value="<?=$baca->ID_WILAYAH_PUS?>">
					<input type="hidden" name="tahun" value="<?=$baca->TAHUN_PUS?>">
					<input type="hidden" name="kode_bulan" value="<?=$kode_bulan?>">
					<table width="100%"  class="table table-condensed">
					<tr>
						<th width="20%">Tahap KS</th>
						<th width="20%">KPS/KSI</th>
						<th width="20%">      PBI</th>
						<th width="20%">Bukan PBI</th>
						<th width="20%">  Non JKN</th>
					</tr>
					<tr>
						<td style="text-align: center">---</td>
						<td style="text-align: center">---</td>
						<td style="text-align: center">---</td>
						<td style="text-align: center">---</td>
						<td style="text-align: center">---</td>
					</tr>
					</table>
					</form>
		<?php } else {  ?>
					<table width="100%"  class="table table-condensed">
						<tr>
							<th width="20%">Tahap KS</th>
							<th width="20%">KPS/KSI</th>
							<th width="20%">PBI</th>
							<th width="20%">Bukan PBI</th>
							<th width="20%">Non JKN</th>
						</tr>
						<tr>
							<td style="text-align: center"><?=$q_ambil_pembinaan['0']->SELURUH_TAHAPAN_KS?></td>
							<td style="text-align: center"><?=$q_ambil_pembinaan['0']->KPS_KSI?></td>
							<td style="text-align: center"><?=$q_ambil_pembinaan['0']->PBI?></td>
							<td style="text-align: center"><?=$q_ambil_pembinaan['0']->BUKAN_PBI?></td>
							<td style="text-align: center"><?=$q_ambil_pembinaan['0']->NON_JKN?></td>
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
			
			<!-- Rekap -->
			<div class="span5">
			<table width="100%"  class="table table-condensed">
			<legend>Swasta</legend>
			<tr>
				<th width="14%">IUD</th>
				<th width="14%">MOW</th>
				<th width="14%">MOP</th>
				<th width="14%">K</th>
				<th width="14%">IPN</th>
				<th width="14%">S</th>
				<th width="14%">P</th>
			</tr>
			<tr>
				<td style="text-align: center"><?php echo $iud_swasta['0']->tot; ?></td>
				<td style="text-align: center"><? echo $mow_swasta['0']->tot; ?></td>
				<td style="text-align: center"><?=$mop_swasta['0']->tot;?></td>
				<td style="text-align: center"><?php echo $k_swasta['0']->tot; ?></td>
				<td style="text-align: center"><? echo $ipn_swasta['0']->tot;?></td>
				<td style="text-align: center"><?=$s_swasta['0']->tot;?></td>
				<td style="text-align: center"><?=$p_swasta['0']->tot;?></td>
			</tr>
			</table>
			</div>
			<div class="span5">
			<table width="100%"  class="table table-condensed">
			<legend>Pemerintah</legend>
			<tr>
				<th width="14%">IUD</th>
				<th width="14%">MOW</th>
				<th width="14%">MOP</th>
				<th width="14%">K</th>
				<th width="14%">IPN</th>
				<th width="14%">S</th>
				<th width="14%">P</th>
			</tr>
			<tr>
				<td style="text-align: center"><?php echo $iud_pem['0']->tot; ?></td>
				<td style="text-align: center"><? echo $mow_pem['0']->tot; ?></td>
				<td style="text-align: center"><?=$mop_pem['0']->tot;?></td>
				<td style="text-align: center"><?php echo $k_pem['0']->tot; ?></td>
				<td style="text-align: center"><? echo $ipn_pem['0']->tot;?></td>
				<td style="text-align: center"><?=$s_pem['0']->tot;?></td>
				<td style="text-align: center"><?=$p_pem['0']->tot;?></td>
			</tr>
			</table>
			</div>
			<div class="span5">
			<table width="100%"  class="table table-condensed">
			<legend>Total</legend>
			<tr>
				<th width="14%">IUD</th>
				<th width="14%">MOW</th>
				<th width="14%">MOP</th>
				<th width="14%">K</th>
				<th width="14%">IPN</th>
				<th width="14%">S</th>
				<th width="14%">P</th>
			</tr>
			<tr>
				<td style="text-align: center"><?php echo $iud_tot['0']->tot; ?></td>
				<td style="text-align: center"><? echo $mow_tot['0']->tot; ?></td>
				<td style="text-align: center"><?=$mop_tot['0']->tot;?></td>
				<td style="text-align: center"><?php echo $k_tot['0']->tot; ?></td>
				<td style="text-align: center"><? echo $ipn_tot['0']->tot;?></td>
				<td style="text-align: center"><?=$s_tot['0']->tot;?></td>
				<td style="text-align: center"><?=$p_tot['0']->tot;?></td>
			</tr>
			</table>
			</div>
			<div class="span5">
			<legend>Tampil Report</legend>
			<form action="<?=base_URL()?>index.php/manage/laporan_pembinaan_pus" method="post"name="f_register_kader_bkl">
			<input type="hidden" name="id" value="<?=$baca->ID_WILAYAH_PUS?>">
			<input type="submit" class="btn btn-primary" name="Simpan">
			</form>
			
			</div>
		