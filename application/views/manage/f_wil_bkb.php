<?php
$mode	= $this->uri->segment(3);

if ($mode == "edit" || $mode == "act_edit") {
	$act		= "act_edit";
	$idp		= $datpil->ID_WILAYAH_BKB;
	$kode_rt				= $datpil->KODE_RT;
	$kode_rw				= $datpil->KODE_RW;
	$kode_kelurahan			= $datpil->KODE_KELURAHAN;
	$kode_kecamatan			= $datpil->KODE_KECAMATAN;
	$nama_kelompok		= $datpil->NAMA_KELOMPOK_BKB;
	$nama_ketua				= $datpil->NAMA_KETUA_BKB;
	$nama_pembina				= $datpil->NAMA_PEMBINA_BKB;
	$tahun_bkb				= $datpil->TAHUN_BKB;
} else {
	$act		= "act_add";
	$idp		= "";
	$kode_rt				= "";
	$kode_rw				= "";
	$kode_kelurahan			= "";
	$kode_kecamatan			= "";
	$nama_kelompok		= "";
	$nama_ketua				= "";
	$nama_pembina				= "";
	$tahun_bkb				= "";
}
?>
<form action="<?=base_URL()?>index.php/manage/wil_bkb/<?=$act?>" method="post">
<input type="hidden" name="idp" value="<?=$idp?>"></input>
	<fieldset><legend>Form Bina Keluarga Balita</legend>
	
	<br>
<label style="width: 200px; float: left">Kecamatan</label>
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
	<input id="kecamatan" class="input-small" type="hidden" name="kode_kecamatan" placeholder="" value="<?=$kode_kecamatan?>" required>
	<br>	
	<?php $kelurahan = $this->db->query("SELECT kode_kelurahan, nama_kelurahan FROM master_kelurahan")->result(); ?>
	<label style="width: 200px; float: left">Kelurahan</label>
	<select id="selectKel" onchange="changeFuncKel();">
	<option value="" selected="selected" disabled="disabled">---</option>
	<?php foreach ($kelurahan as $key => $kel): ?>
	<option value="<?php echo $kel->kode_kelurahan ?>"><?php echo $kel->nama_kelurahan ?></option>
	<?php endforeach; ?>
	</select>  
	<script type="text/javascript">
	   function changeFuncKel() {
		var selectBox = document.getElementById("selectKel");
		var selectedValue = selectBox.options[selectBox.selectedIndex].value;
		document.getElementById('kelurahan').value = selectedValue;
	   }
	</script>
	<input id="kelurahan" class="input-small" type="hidden" name="kode_kelurahan" placeholder="" value="<?=$kode_kelurahan?>" required>
	<br>
	<label style="width: 200px; float: left">RW</label>
	<select id="selectRW" onchange="changeFuncRW();">
	<?php $rw = $this->db->query("SELECT kode_rw, nama_rw FROM master_rw")->result(); ?>
	<option value="" selected="selected" disabled="disabled">---</option>
	<?php foreach ($rw as $key => $w): ?>
	<option value="<?php echo $w->kode_rw ?>"><?php echo $w->nama_rw ?></option>
	<?php endforeach; ?>
	</select>  
	<script type="text/javascript">
	   function changeFuncRW() {
		var selectBox = document.getElementById("selectRW");
		var selectedValue = selectBox.options[selectBox.selectedIndex].value;
		document.getElementById('rw').value = selectedValue;
	   }
	</script>
	<input id="rw" class="input-small" type="hidden" name="kode_rw" placeholder="" value="<?=$kode_rw?>" required>
	<br>	
	<label style="width: 200px; float: left">RT</label>
	<select id="selectRT" onchange="changeFuncRT();">
	<option value="" selected="selected" disabled="disabled">---</option>
	<?php $rt = $this->db->query("SELECT kode_rt, angka_rt FROM master_rt")->result(); ?>
	<?php foreach ($rt as $key => $t): ?>
	<option value="<?php echo $t->kode_rt ?>"><?php echo $t->angka_rt ?></option>
	<?php endforeach; ?>
	</select>  
	<script type="text/javascript">
	   function changeFuncRT() {
		var selectBox = document.getElementById("selectRT");
		var selectedValue = selectBox.options[selectBox.selectedIndex].value;
		document.getElementById('rt').value = selectedValue;
	   }
	</script>
	<input id="rt" class="input-small" type="hidden" name="kode_rt" placeholder="" value="<?=$kode_rt?>" required>
	<br>
	<label style="width: 200px; float: left">Nama Kelompok BKB</label><input class="input-xxlarge" type="text" name="nama_kelompok" placeholder="" value="<?=$nama_kelompok?>" required>
	<br>	
	<label style="width: 200px; float: left">Nama Ketua BKB</label><input class="input-xxlarge" type="text" name="nama_ketua" placeholder="" value="<?=$nama_ketua?>" required>
	<br>
	<label style="width: 200px; float: left">Nama Pembina BKB</label><input class="input-xxlarge" type="text" name="nama_pembina" placeholder="" value="<?=$nama_pembina?>" required>
	<br>	
	<?php $tahun = array(date("Y"),date('Y', strtotime('+1 year')),date('Y', strtotime('+2 year'))); ?>
	<label style="width: 200px; float: left">Tahun</label>
	<select id="selecttahun" onchange="changeFuncTahun();">
	<option value="" selected="selected" disabled="disabled">---</option>
	<?php foreach ($tahun as $key => $thn): ?>
	<option value="<?php echo $thn ?>"><?php echo $thn ?></option>
	<?php endforeach; ?>
	</select>  
	<script type="text/javascript">
	   function changeFuncTahun() {
		var selectBox = document.getElementById("selecttahun");
		var selectedValue = selectBox.options[selectBox.selectedIndex].value;
		document.getElementById('tahun').value = selectedValue;
	   }
	</script>
	<input id="tahun" class="input-small" type="hidden" name="tahun_bkb" placeholder="" value="<?=$tahun_bkb?>" required>
	<br>
	
	<label style="width: 200px; float: left"></label><button type="submit" class="btn btn-primary">Submit</button>
	</fieldset>
</form>