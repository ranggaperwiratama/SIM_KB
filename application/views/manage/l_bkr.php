<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-fgs7{font-style:italic;font-family:"Arial Black", Gadget, sans-serif !important;;text-align:center;vertical-align:top}
.tg .tg-223e{font-family:"Arial Black", Gadget, sans-serif !important;;text-align:center;vertical-align:top}
</style>
<?php $q_ambil_kelompok	= $this->db->query("SELECT * FROM wilayah_bkr 
			JOIN master_rt ON wilayah_bkr.kode_rt=master_rt.kode_rt 
			JOIN master_rw ON wilayah_bkr.kode_rw=master_rw.kode_rw 
			JOIN master_kelurahan ON wilayah_bkr.kode_kelurahan=master_kelurahan.kode_kelurahan 
			JOIN master_kecamatan ON wilayah_bkr.kode_kecamatan=master_kecamatan.kode_kecamatan WHERE id_wilayah_bkr = '$id_wilayah_bkr'")->result() ?>

			
<div class="span11">
<legend>CATATAN KELOMPOK BKR</legend>
</div>
<div class="span5">
<legend>KELOMPOK BKR: <?php echo $q_ambil_kelompok['0']->NAMA_KELOMPOK_BKR ?></legend>
<legend>KETUA: <?php echo $q_ambil_kelompok['0']->NAMA_KETUA_BKR ?></legend>
<legend>PEMBINA: <?php echo $q_ambil_kelompok['0']->NAMA_PEMBINA_BKR ?></legend>
<legend>TAHUN: <?php echo $q_ambil_kelompok['0']->TAHUN_BKR ?></legend>
</div>
<div class="span5">
<legend>KECAMATAN: <?php echo $q_ambil_kelompok['0']->NAMA_KECAMATAN ?></legend>
<legend>KELURAHAN: <?php echo $q_ambil_kelompok['0']->NAMA_KELURAHAN ?></legend>
<legend>RW: <?php echo $q_ambil_kelompok['0']->NAMA_RW ?></legend>
<legend>RT: <?php echo $q_ambil_kelompok['0']->ANGKA_RT ?></legend>
</div>
<table class="tg">
  <tr>
    <th class="tg-223e" rowspan="2">no</th>
    <th class="tg-223e" rowspan="2" colspan="2">uraian</th>
    <th class="tg-223e" colspan="12">bulan</th>
  </tr>
  <tr>
    <td class="tg-223e">januari</td>
    <td class="tg-223e">februari</td>
    <td class="tg-223e">maret</td>
    <td class="tg-223e">april</td>
    <td class="tg-223e">mei</td>
    <td class="tg-223e">juni</td>
    <td class="tg-223e">juli</td>
    <td class="tg-223e">agustus</td>
    <td class="tg-223e">september</td>
    <td class="tg-223e">oktober</td>
    <td class="tg-223e">nopember</td>
    <td class="tg-223e">desember</td>
  </tr>
  <tr>
    <td class="tg-223e">1</td>
    <td class="tg-223e" colspan="2">anggota aktif</td>
    <? for ($x = 1; $x <= 12; $x++) {
	$q_ambil_pembinaan = $this->db->query("SELECT COUNT(b.id_bkr) AS tot FROM wilayah_bkr a JOIN bkr b ON a.id_wilayah_bkr = b.id_wilayah_bkr JOIN presensi_bkr c ON b.id_bkr = c.id_bkr WHERE c.kehadiran_bkr='1' AND c.kode_bulan='$x' AND b.id_wilayah_bkr='$id_wilayah_bkr'")->result(); ?>
    <td class="tg-223e"><?=$q_ambil_pembinaan['0']->tot?></td>
	<? } ?>
  </tr>
  <tr>
    <td class="tg-223e" rowspan="3">2</td>
    <td class="tg-fgs7" colspan="2">status pus</td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
  </tr>
  <tr>
    <td class="tg-223e" colspan="2">jumlah bkr yang pus</td>
	<? for ($x = 1; $x <= 12; $x++) {
	$q_ambil_pembinaan = $this->db->query("SELECT COUNT(b.id_bkr) AS tot FROM wilayah_bkr a JOIN bkr b ON a.id_wilayah_bkr = b.id_wilayah_bkr JOIN presensi_bkr c ON b.id_bkr = c.id_bkr WHERE c.kehadiran_bkr='1' AND c.kode_bulan='$x' AND b.id_wilayah_bkr='$id_wilayah_bkr' AND b.status_pus_bkr='1'")->result(); ?>
    <td class="tg-223e"><?=$q_ambil_pembinaan['0']->tot?></td>
	<? } ?>
  </tr>
  <tr>
    <td class="tg-223e" colspan="2">jumlah pus kps/ksi</td>
   <? for ($x = 1; $x <= 12; $x++) {
	$q_ambil_pembinaan = $this->db->query("SELECT COUNT(b.id_bkr) AS tot FROM wilayah_bkr a JOIN bkr b ON a.id_wilayah_bkr = b.id_wilayah_bkr JOIN presensi_bkr c ON b.id_bkr = c.id_bkr WHERE c.kehadiran_bkr='1' AND c.kode_bulan='$x' AND b.id_wilayah_bkr='$id_wilayah_bkr' AND b.status_pus_bkr='1' AND (b.tahapan_ks_bkr='S' OR b.tahapan_ks_bkr='I')")->result(); ?>
    <td class="tg-223e"><?=$q_ambil_pembinaan['0']->tot?></td>
	<? } ?>
  </tr>
  <tr>
    <td class="tg-223e" rowspan="2">3</td>
    <td class="tg-fgs7" colspan="2">kesertaan kb</td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
    <td class="tg-223e"></td>
  </tr>
  <tr>
    <td class="tg-223e" colspan="2">jumlah peserta kb</td>
    <? for ($x = 1; $x <= 12; $x++) {
	$q_ambil_pembinaan = $this->db->query("SELECT COUNT(b.id_bkr) AS tot FROM wilayah_bkr a JOIN bkr b ON a.id_wilayah_bkr = b.id_wilayah_bkr JOIN presensi_bkr c ON b.id_bkr = c.id_bkr WHERE c.kehadiran_bkr='1' AND c.kode_bulan='$x' AND b.id_wilayah_bkr='$id_wilayah_bkr' AND b.kesertaan_kb_bkr!=''")->result(); ?>
    <td class="tg-223e"><?=$q_ambil_pembinaan['0']->tot?></td>
	<? } ?>
  </tr>
</table>