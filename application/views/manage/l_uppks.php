<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-yw4l{vertical-align:top}
</style>
<div class="span5">
<legend>KELOMPOK: <?php echo $baca['0']->NAMA_KELOMPOK_UPPKS ?></legend>
<legend>KETUA: <?php echo $baca['0']->NAMA_KETUA_UPPKS ?></legend>
<legend>TGL LAHIR KETUA: <?php echo $baca['0']->TGL_LAHIR_KETUA ?></legend>
<legend>JUMLAH MODAL KELOMPOK: <?php echo $baca['0']->TOTAL_MODAL_SAAT_INI ?></legend>
</div>
<div class="span5">
<legend>KECAMATAN: <?php echo $baca['0']->NAMA_KECAMATAN ?></legend>
<legend>KELURAHAN: <?php echo $baca['0']->NAMA_KELURAHAN ?></legend>
<legend>RW: <?php echo $baca['0']->NAMA_RW ?></legend>
<legend>RT: <?php echo $baca['0']->ANGKA_RT ?></legend>
</div>
<table class="tg">
  <tr>
    <th class="tg-yw4l" rowspan="2">nama</th>
    <th class="tg-yw4l" rowspan="2">jabatan</th>
    <th class="tg-yw4l" colspan="2">tahapan ks</th>
    <th class="tg-yw4l" colspan="2">status pus</th>
    <th class="tg-yw4l" colspan="2">kesertaan kb</th>
    <th class="tg-yw4l" rowspan="2">kemandirian kb</th>
    <th class="tg-yw4l" rowspan="2">jenis usaha sub sektor</th>
    <th class="tg-yw4l" rowspan="2">jumlah modal diperoleh (rp)</th>
  </tr>
  <tr>
    <td class="tg-yw4l">kps,ksi</td>
    <td class="tg-yw4l">ksii,ksiii,ksiii+</td>
    <td class="tg-yw4l">kps,ksi</td>
    <td class="tg-yw4l">ksii,ksiii,ksiii+</td>
    <td class="tg-yw4l">kps,ksi</td>
    <td class="tg-yw4l">ksii,ksiii,ksiii+</td>
  </tr>
  <?php
	foreach ($data as $b) {
	?>			
  <tr>
    <td class="tg-yw4l"><?=$b->NAMA_ANGGOTA_UPPKS?></td>
    <td class="tg-yw4l"><? echo $b->JABATAN_UPPKS; ?></td>
    <td class="tg-yw4l"><?=$b->TAHAPAN_KS_KPS_KSI;?></td>
    <td class="tg-yw4l"><?php echo $b->TAHAPAN_KS_KSII_KSIII; ?></td>
    <td class="tg-yw4l"><? echo $b->STATUS_PUS_KPS_KSI;?></td>
    <td class="tg-yw4l"><? echo $b->STATUS_PUS_KSII_KSIII;?></td>
    <td class="tg-yw4l"><?=$b->KESERTAAN_KB_KPS_KSI;?></td>
    <td class="tg-yw4l"><?=$b->KESERTAAN_KB_KSII_KSIII;?></td>
    <td class="tg-yw4l"><?=$b->KEMANDIRIAN_KB;?></td>
    <td class="tg-yw4l"><?=$b->JENIS_USAHA_SUB_SEKTOR;?></td>
    <td class="tg-yw4l"><?=$b->JUMLAH_MODAL_SAAT_INI;?></td>
  </tr>
	<? } ?>
</table>
