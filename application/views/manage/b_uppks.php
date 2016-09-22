<div class="span5">
<legend>KELOMPOK: <?php echo $baca->NAMA_KELOMPOK_UPPKS ?></legend>
<legend>KETUA: <?php echo $baca->NAMA_KETUA_UPPKS ?></legend>
<legend>TGL LAHIR KETUA: <?php echo $baca->TGL_LAHIR_KETUA ?></legend>
<legend>JUMLAH MODAL KELOMPOK: <?php echo $baca->TOTAL_MODAL_SAAT_INI ?></legend>
</div>
<div class="span5">
<legend>KECAMATAN: <?php echo $baca->NAMA_KECAMATAN ?></legend>
<legend>KELURAHAN: <?php echo $baca->NAMA_KELURAHAN ?></legend>
<legend>RW: <?php echo $baca->NAMA_RW ?></legend>
<legend>RT: <?php echo $baca->ANGKA_RT ?></legend>
</div>

	
			
			<legend>Daftar Anggota UPPKS</legend>
			<div id="komentar">
			
			
			<form action="<?=base_URL()?>index.php/manage/register_uppks" method="post" name="f_register_uppks">
			<input type="hidden" name="id" value="<?=$baca->ID_WILAYAH_UPPKS?>">
			<table width="100%"  class="table table-condensed">
			<tr>
				<th width="9%" rowspan="2">Nama Anggota</th>
				<th width="9%" rowspan="2">Jabatan</th>
				<th width="18%" colspan="2">Tahapan KS</th>
				<th width="18%" colspan="2">Status PUS</th>
				<th width="18%" colspan="2">Kesertaan KB</th>
				<th width="9%" rowspan="2">Kemandirian KB</th>
				<th width="9%" rowspan="2">Jenis Usaha Sub Sektor</th>
				<th width="9%" rowspan="2">Jumlah Modal Diperoleh (Rp)</th>
			  </tr>
			  <tr>
				<td style="text-align: center">KPS &amp; KSI</td>
				<td style="text-align: center">KSII, KSIII, KSIII+</td>
				<td style="text-align: center">KPS &amp; KSI</td>
				<td style="text-align: center">KSII, KSIII, KSIII+</td>
				<td style="text-align: center">KPS &amp; KSI</td>
				<td style="text-align: center">KSII, KSIII, KSIII+</td>
			  </tr>
			  <?php 
			$q_pus	= $this->db->query("SELECT * FROM anggota_uppks WHERE id_wilayah_uppks = '".$baca->ID_WILAYAH_UPPKS."'")->result();
			
			foreach ($q_pus as $data) {
			?>
			<tr>
				<td style="text-align: center"><div class="well-large"><b><?=$data->NAMA_ANGGOTA_UPPKS?></b></div>
				<a href="<?php echo base_URL(); ?>index.php/manage/pre_register_uppks/hapus/<?=$baca->ID_WILAYAH_UPPKS?>/<?=$data->ID_ANGGOTA_UPPKS?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$data->NAMA_ANGGOTA_UPPKS?>?');"><span class="icon-remove">&nbsp;&nbsp;</span></a></td>
				<td style="text-align: center"><? echo $data->JABATAN_UPPKS; ?></td>
				<td style="text-align: center"><?=$data->TAHAPAN_KS_KPS_KSI;?></td>
				<td style="text-align: center"><?php echo $data->TAHAPAN_KS_KSII_KSIII; ?></td>
				<td style="text-align: center"><? echo $data->STATUS_PUS_KPS_KSI;?></td>
				<td style="text-align: center"><? echo $data->STATUS_PUS_KSII_KSIII;?></td>
				<td style="text-align: center"><?=$data->KESERTAAN_KB_KPS_KSI;?></td>
				<td style="text-align: center"><?=$data->KESERTAAN_KB_KSII_KSIII;?></td>
				<td style="text-align: center"><?=$data->KEMANDIRIAN_KB;?></td>
				<td style="text-align: center"><?=$data->JENIS_USAHA_SUB_SEKTOR;?></td>
				<td style="text-align: center"><?=$data->JUMLAH_MODAL_SAAT_INI;?></td>
				
			</tr>
			<?php } ?>
			</table>
			<table width="100%"  class="table table-condensed">
			<tr>
				<th width="9%" rowspan="2">Nama Anggota</th>
				<th width="9%" rowspan="2">Jabatan</th>
				<th width="18%" colspan="2">Tahapan KS</th>
				<th width="18%" colspan="2">Status PUS</th>
				<th width="18%" colspan="2">Kesertaan KB</th>
				<th width="9%" rowspan="2">Kemandirian KB</th>
				<th width="9%" rowspan="2">Jenis Usaha Sub Sektor</th>
				<th width="9%" rowspan="2">Jumlah Modal Diperoleh (Rp)</th>
			  </tr>
			  <tr>
				<td style="text-align: center">KPS &amp; KSI</td>
				<td style="text-align: center">KSII, KSIII, KSIII+</td>
				<td style="text-align: center">KPS &amp; KSI</td>
				<td style="text-align: center">KSII, KSIII, KSIII+</td>
				<td style="text-align: center">KPS &amp; KSI</td>
				<td style="text-align: center">KSII, KSIII, KSIII+</td>
			  </tr>
			<tr>
				<td style="text-align: center"><input type="text" class="span12" name="nama_anggota" placeholder="" required></td>
				<td style="text-align: center"><input type="text" class="span12" name="jabatan" placeholder="" required></td>
				<td style="text-align: center">
				<?php $ks_kps = array('S','I'); ?>
				<select id="selectks_kps" onchange="changeFuncks_kps();">
				<option value="" selected="selected" disabled="disabled">---</option>
				<?php foreach ($ks_kps as $key => $k): ?>
				<option value="<?php echo $k ?>"><?php echo $k ?></option>
				<?php endforeach; ?>
				</select>  
				<script type="text/javascript">
				   function changeFuncks_kps() {
					var selectBox = document.getElementById("selectks_kps");
					var selectedValue = selectBox.options[selectBox.selectedIndex].value;
					document.getElementById('ks_kps').value = selectedValue;
				   }
				</script>
				<input id="ks_kps" class="input-small" type="hidden" name="ks_kps" placeholder="" value=""></td>
				<td style="text-align: center">
				<?php $ks_ks = array('II', 'III', 'III+'); ?>
				<select id="selectks_ks" onchange="changeFuncks_ks();">
				<option value="" selected="selected" disabled="disabled">---</option>
				<?php foreach ($ks_ks as $key => $k): ?>
				<option value="<?php echo $k ?>"><?php echo $k ?></option>
				<?php endforeach; ?>
				</select>  
				<script type="text/javascript">
				   function changeFuncks_ks() {
					var selectBox = document.getElementById("selectks_ks");
					var selectedValue = selectBox.options[selectBox.selectedIndex].value;
					document.getElementById('ks_ks').value = selectedValue;
				   }
				</script>
				<input id="ks_ks" class="input-small" type="hidden" name="ks_ks" placeholder="" value=""></td>
				<td style="text-align: center"><input type="checkbox" class="span12" value='false' name="pus_kps" placeholder=""></td>
				<td style="text-align: center"><input type="checkbox" class="span12" value='false' name="pus_ks" placeholder=""></td>
				<td style="text-align: center">
				<?php $kb_kps = array('I','MOW','MOP','K','IPN','S','P','H','IAS','IAT', 'TIAL'); ?>
				<select id="selectkb_kps" onchange="changeFunckb_kps();">
				<option value="" selected="selected" disabled="disabled">---</option>
				<?php foreach ($kb_kps as $key => $b): ?>
				<option value="<?php echo $b ?>"><?php echo $b ?></option>
				<?php endforeach; ?>
				</select>  
				<script type="text/javascript">
				   function changeFunckb_kps() {
					var selectBox = document.getElementById("selectkb_kps");
					var selectedValue = selectBox.options[selectBox.selectedIndex].value;
					document.getElementById('kb_kps').value = selectedValue;
				   }
				</script>
				<input id="kb_kps" class="input-small" type="hidden" name="kb_kps" placeholder="" value="" ></td>
				<td style="text-align: center">
				<?php $kb_ks = array('I','MOW','MOP','K','IPN','S','P','H','IAS','IAT', 'TIAL'); ?>
				<select id="selectkb_ks" onchange="changeFunckb_ks();">
				<option value="" selected="selected" disabled="disabled">---</option>
				<?php foreach ($kb_ks as $key => $b): ?>
				<option value="<?php echo $b ?>"><?php echo $b ?></option>
				<?php endforeach; ?>
				</select>  
				<script type="text/javascript">
				   function changeFunckb_ks() {
					var selectBox = document.getElementById("selectkb_ks");
					var selectedValue = selectBox.options[selectBox.selectedIndex].value;
					document.getElementById('kb_ks').value = selectedValue;
				   }
				</script>
				<input id="kb_ks" class="input-small" type="hidden" name="kb_ks" placeholder="" value="" ></td>
				<td style="text-align: center"><input type="checkbox" class="span12" value='false' name="kb_mandiri" placeholder=""></td>
				<td style="text-align: center"><input type="text" class="span12" name="jenis_usaha_sub" placeholder="" required></td>
				<td style="text-align: center"><input type="text" class="span12" name="jumlah_modal" placeholder="" required></td>
				<td><input type="submit" class="btn btn-primary" name="Simpan"></td>
				
			</tr>
			</table>
			</form>
			</div>
			<br>
			<br>
			<div class="span5">
			<legend>Tampil Report</legend>
			<form action="<?=base_URL()?>index.php/manage/laporan_uppks" method="post"name="f_uppks">
			<input type="hidden" name="id" value="<?=$baca->ID_WILAYAH_UPPKS?>">
			<input type="submit" class="btn btn-primary" name="Simpan">
			</form>
			
			</div>