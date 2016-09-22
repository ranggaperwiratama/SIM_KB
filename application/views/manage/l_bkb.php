<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-fgs7{font-style:italic;font-family:"Arial Black", Gadget, sans-serif !important;;text-align:center;vertical-align:top}
.tg .tg-223e{font-family:"Arial Black", Gadget, sans-serif !important;;text-align:center;vertical-align:top}
</style>

<?php $q_ambil_kelompok	= $this->db->query("SELECT * FROM wilayah_bkb 
			JOIN master_rt ON wilayah_bkb.kode_rt=master_rt.kode_rt 
			JOIN master_rw ON wilayah_bkb.kode_rw=master_rw.kode_rw 
			JOIN master_kelurahan ON wilayah_bkb.kode_kelurahan=master_kelurahan.kode_kelurahan 
			JOIN master_kecamatan ON wilayah_bkb.kode_kecamatan=master_kecamatan.kode_kecamatan WHERE id_wilayah_bkb = '$id_wilayah_bkb'")->result() ?>

			
<div class="span11">
<legend>CATATAN KELOMPOK BKB</legend>
</div>
<div class="span5">
<legend>KELOMPOK BKB: <?php echo $q_ambil_kelompok['0']->NAMA_KELOMPOK_BKB ?></legend>
<legend>KETUA: <?php echo $q_ambil_kelompok['0']->NAMA_KETUA_BKB ?></legend>
<legend>PEMBINA: <?php echo $q_ambil_kelompok['0']->NAMA_PEMBINA_BKB ?></legend>
<legend>TAHUN: <?php echo $q_ambil_kelompok['0']->TAHUN_BKB ?></legend>
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
    <th class="tg-223e" rowspan="2">uraian</th>
    <th class="tg-223e" rowspan="2">kelompok umur anak</th>
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
    <td class="tg-223e" rowspan="6">1</td>
    <td class="tg-223e" rowspan="6">jumlah balita</td>
    <td class="tg-223e">0 -&lt; 1</td>
	<? for ($x = 1; $x <= 12; $x++) {
	$q_ambil_pembinaan = $this->db->query("SELECT COUNT(b.id_bkb) AS tot FROM wilayah_bkb a JOIN bkb b ON a.id_wilayah_bkb = b.id_wilayah_bkb JOIN presensi_bkb c ON b.id_bkb = c.id_bkb WHERE c.kehadiran_bkb='1' AND c.kode_bulan='$x' AND b.id_wilayah_bkb='$id_wilayah_bkb' AND b.KATEGORI_UMUR_1='1'")->result(); ?>
    <td class="tg-223e"><?=$q_ambil_pembinaan['0']->tot?></td>
	<? } ?>
  </tr>
  <tr>
    <td class="tg-223e">1 -&lt; 2</td>
    <? for ($x = 1; $x <= 12; $x++) {
	$q_ambil_pembinaan = $this->db->query("SELECT COUNT(b.id_bkb) AS tot FROM wilayah_bkb a JOIN bkb b ON a.id_wilayah_bkb = b.id_wilayah_bkb JOIN presensi_bkb c ON b.id_bkb = c.id_bkb WHERE c.kehadiran_bkb='1' AND c.kode_bulan='$x' AND b.id_wilayah_bkb='$id_wilayah_bkb' AND b.KATEGORI_UMUR_2='1'")->result(); ?>
    <td class="tg-223e"><?=$q_ambil_pembinaan['0']->tot?></td>
	<? } ?>
  </tr>
  <tr>
    <td class="tg-223e">2 -&lt; 3</td>
    <? for ($x = 1; $x <= 12; $x++) {
	$q_ambil_pembinaan = $this->db->query("SELECT COUNT(b.id_bkb) AS tot FROM wilayah_bkb a JOIN bkb b ON a.id_wilayah_bkb = b.id_wilayah_bkb JOIN presensi_bkb c ON b.id_bkb = c.id_bkb WHERE c.kehadiran_bkb='1' AND c.kode_bulan='$x' AND b.id_wilayah_bkb='$id_wilayah_bkb' AND b.KATEGORI_UMUR_3='1'")->result(); ?>
    <td class="tg-223e"><?=$q_ambil_pembinaan['0']->tot?></td>
	<? } ?>
  </tr>
  <tr>
    <td class="tg-223e">3 -&lt; 4</td>
    <? for ($x = 1; $x <= 12; $x++) {
	$q_ambil_pembinaan = $this->db->query("SELECT COUNT(b.id_bkb) AS tot FROM wilayah_bkb a JOIN bkb b ON a.id_wilayah_bkb = b.id_wilayah_bkb JOIN presensi_bkb c ON b.id_bkb = c.id_bkb WHERE c.kehadiran_bkb='1' AND c.kode_bulan='$x' AND b.id_wilayah_bkb='$id_wilayah_bkb' AND b.KATEGORI_UMUR_4='1'")->result(); ?>
    <td class="tg-223e"><?=$q_ambil_pembinaan['0']->tot?></td>
	<? } ?>
  </tr>
  <tr>
    <td class="tg-223e">4 -&lt; 5</td>
    <? for ($x = 1; $x <= 12; $x++) {
	$q_ambil_pembinaan = $this->db->query("SELECT COUNT(b.id_bkb) AS tot FROM wilayah_bkb a JOIN bkb b ON a.id_wilayah_bkb = b.id_wilayah_bkb JOIN presensi_bkb c ON b.id_bkb = c.id_bkb WHERE c.kehadiran_bkb='1' AND c.kode_bulan='$x' AND b.id_wilayah_bkb='$id_wilayah_bkb' AND b.KATEGORI_UMUR_5='1'")->result(); ?>
    <td class="tg-223e"><?=$q_ambil_pembinaan['0']->tot?></td>
	<? } ?>
  </tr>
  <tr>
    <td class="tg-223e">5 -&lt; 6</td>
    <? for ($x = 1; $x <= 12; $x++) {
	$q_ambil_pembinaan = $this->db->query("SELECT COUNT(b.id_bkb) AS tot FROM wilayah_bkb a JOIN bkb b ON a.id_wilayah_bkb = b.id_wilayah_bkb JOIN presensi_bkb c ON b.id_bkb = c.id_bkb WHERE c.kehadiran_bkb='1' AND c.kode_bulan='$x' AND b.id_wilayah_bkb='$id_wilayah_bkb' AND b.KATEGORI_UMUR_6='1'")->result(); ?>
    <td class="tg-223e"><?=$q_ambil_pembinaan['0']->tot?></td>
	<? } ?>
  </tr>
  <tr>
    <td class="tg-223e">3</td>
    <td class="tg-223e" colspan="2">anggota aktif</td>
    <? for ($x = 1; $x <= 12; $x++) {
	$q_ambil_pembinaan = $this->db->query("SELECT COUNT(b.id_bkb) AS tot FROM wilayah_bkb a JOIN bkb b ON a.id_wilayah_bkb = b.id_wilayah_bkb JOIN presensi_bkb c ON b.id_bkb = c.id_bkb WHERE c.kehadiran_bkb='1' AND c.kode_bulan='$x' AND b.id_wilayah_bkb='$id_wilayah_bkb'")->result(); ?>
    <td class="tg-223e"><?=$q_ambil_pembinaan['0']->tot?></td>
	<? } ?>
  </tr>
  <tr>
    <td class="tg-223e" rowspan="3">4</td>
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
    <td class="tg-223e" colspan="2">jumlah bkb yang pus</td>
	<? for ($x = 1; $x <= 12; $x++) {
	$q_ambil_pembinaan = $this->db->query("SELECT COUNT(b.id_bkb) AS tot FROM wilayah_bkb a JOIN bkb b ON a.id_wilayah_bkb = b.id_wilayah_bkb JOIN presensi_bkb c ON b.id_bkb = c.id_bkb WHERE c.kehadiran_bkb='1' AND c.kode_bulan='$x' AND b.id_wilayah_bkb='$id_wilayah_bkb' AND b.status_pus_bkb='1'")->result(); ?>
    <td class="tg-223e"><?=$q_ambil_pembinaan['0']->tot?></td>
	<? } ?>
  </tr>
  <tr>
    <td class="tg-223e" colspan="2">jumlah pus kps/ksi</td>
   <? for ($x = 1; $x <= 12; $x++) {
	$q_ambil_pembinaan = $this->db->query("SELECT COUNT(b.id_bkb) AS tot FROM wilayah_bkb a JOIN bkb b ON a.id_wilayah_bkb = b.id_wilayah_bkb JOIN presensi_bkb c ON b.id_bkb = c.id_bkb WHERE c.kehadiran_bkb='1' AND c.kode_bulan='$x' AND b.id_wilayah_bkb='$id_wilayah_bkb' AND b.status_pus_bkb='1' AND (b.tahapan_ks_bkb='S' OR b.tahapan_ks_bkb='I')")->result(); ?>
    <td class="tg-223e"><?=$q_ambil_pembinaan['0']->tot?></td>
	<? } ?>
  </tr>
  <tr>
    <td class="tg-223e" rowspan="2">5</td>
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
	$q_ambil_pembinaan = $this->db->query("SELECT COUNT(b.id_bkb) AS tot FROM wilayah_bkb a JOIN bkb b ON a.id_wilayah_bkb = b.id_wilayah_bkb JOIN presensi_bkb c ON b.id_bkb = c.id_bkb WHERE c.kehadiran_bkb='1' AND c.kode_bulan='$x' AND b.id_wilayah_bkb='$id_wilayah_bkb' AND b.kesertaan_kb_bkb!=''")->result(); ?>
    <td class="tg-223e"><?=$q_ambil_pembinaan['0']->tot?></td>
	<? } ?>
  </tr>
</table>