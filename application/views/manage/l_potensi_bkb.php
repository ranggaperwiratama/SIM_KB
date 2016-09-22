<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-fgs7{font-style:italic;font-family:"Arial Black", Gadget, sans-serif !important;;text-align:center;vertical-align:top}
.tg .tg-223e{font-family:"Arial Black", Gadget, sans-serif !important;;text-align:center;vertical-align:top}
</style>
<table width="357%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="69"><div align="center" class="style2">REGISTER PEMBINAAN PUS DAN PESERTA KB BAGI SELURUH KELUARGA </div></td>
  </tr>
  <tr>
    <td colspan="69"><div align="center" class="style2">SISTEM INFORMASI KEPENDUDUKAN DAN KELUARGA </div></td>
  </tr>
  <tr>
   <td width="10%"><span class="style3"></span></td>
    <td width="15%"><span class="style3"></span></td>
	 <td colspan="64"><span class="style3"></span></td>
    <td width="10%"><span class="style3"></span></td>
    <td width="15%"><span class="style3"></span></td>
    <td width="10%"><span class="style3">Kode Wilayah</span></td>
  </tr>
  <tr>
    <td><span class="style3"></span></td>
    <td><span class="style3"></span></td>
	 <td colspan="64"><span class="style3"></span></td>
    <td><span class="style3">Propinsi</span></td>
    <td><span class="style3">: Daerah Istimewa Yogyakarta </span></td>
    <td  align="left"><span class="style3" >
    34</span></td>
  </tr>
  <tr>
    <td><span class="style3"></span></td>
	 <td><span class="style3"></span></td>
    <td colspan="64"><span class="style3"></span></td>
    <td><span class="style3">
    Kota</span></td>
    <td><span class="style3">: Yogyakarta</span></td>
    <td  align="left"><span class="style3">
    3471</span></td>
  </tr>
  <tr>
    <td width="10%"><span class="style3">Kelompok KB:</span></td>
    <td width="15%"><span class="style3">: <?php echo $baca->NAMA_KELOMPOK_BKB ?></span></td>
    <td colspan="64"><span class="style3"></span></td>
    <td><span class="style3">
    Kecamatan</span></td>
    <td><span class="style3">: <?php echo $baca->NAMA_KECAMATAN ?></span></td>
    <td  align="left">
      <span class="style3"><?php echo '3471'.$baca->KODE_KECAMATAN ?></span></td>
  </tr>
  <tr>
    <td><span class="style3">
        KETUA</span></td>
    <td><span class="style3">: <?php echo $baca->NAMA_KETUA_BKB ?></span></td>
    <td colspan="64"><span class="style3"></span></td>
    <td><span class="style3">
    Kelurahan</span></td>
    <td><span class="style3">: <?php echo $baca->NAMA_KELURAHAN ?></span></td>
    <td  align="left">
      <span class="style3"><?php echo '3471'.$baca->KODE_KECAMATAN.$baca->KODE_KELURAHAN ?></span></td>
  </tr>
  <tr>
    <td><span class="style3">
        Pembina</span></td>
    <td><span class="style3">: <?php echo $baca->NAMA_PEMBINA_BKB ?></span></td>
    <td colspan="64"><span class="style3"></span></td>
    <td><span class="style3">
    Rw</span></td>
    <td><span class="style3">: <?php echo $baca->KODE_RW ?></span></td>
    <td  align="left">
      <span class="style3"><?php echo $baca->KODE_RW ?></span></td>
  </tr>
  <tr>
    <td><span class="style3">
        TAHUN</span></td>
    <td><span class="span3 style3">
      : <?php echo $baca->TAHUN_BKB ?>
    </span></td>
    <td colspan="64"><span class="style3"></span></td>
    <td><span class="style3">
    Rt</span></td>
    <td><span class="span3 style3">
      : <?php echo $baca->KODE_RT ?>
    </span></td>
    <td  align="left">
      <span class="style3"><?php echo $baca->KODE_RT ?></span></td>
  </tr>
</table>
			Register Potensi BKB
			Informasi Kelompok
			<table class="tg">
			<tr>
				<th class="tg-yw4l">SK Pengukuhan</th>
				<th class="tg-yw4l">Sertifikasi Kelompok</th>
				<th class="tg-yw4l">Keterpaduan Kelompok</th>
				<th class="tg-yw4l">BKB Kit</th>
				<th class="tg-yw4l">Jumlah KKA</th>
				<th class="tg-yw4l">Total Balita</th>
				<th class="tg-yw4l">Sumber Dana</th>
			</tr>
			<?php 
			$q_bkb	= $this->db->query("SELECT * FROM info_kelompok_bkb WHERE id_wilayah_bkb = '".$baca->ID_WILAYAH_BKB."'")->result();
			
			foreach ($q_bkb as $data) {
			?>
			<tr>
				<td class="tg-yw4l"><?=$data->SK_PENGUKUHAN_BKB?></td>
				<td class="tg-yw4l"><? echo $data->SERTIFIKASI_BKB; ?></td>
				<td class="tg-yw4l"><?=$data->KETERPADUAN_BKB;?></td>
				<td class="tg-yw4l"><?php echo $data->BKB_KIT; ?></td>
				<td class="tg-yw4l"><? echo $data->JUMLAH_KKA;?></td>
				<td class="tg-yw4l"><? echo $data->JUMLAH_BALITA;?></td>
				<td class="tg-yw4l"><?=$data->SUMBER_DANA_BKB;?></td>
			</tr>
			<?php } ?>
			</table>
			<br>
			<br>
			
			<!-- Informasi Kader -->
			Informasi Kader
			<table class="tg">
			<tr>
				<th class="tg-yw4l">Jabatan</th>
				<th class="tg-yw4l">Nama</th>
				<th class="tg-yw4l">Pendidikan</th>
				<th class="tg-yw4l">Pernah Pelatihan</th>
				<th class="tg-yw4l">Pekerjaan</th>
				<th class="tg-yw4l">Status PUS</th>
				<th class="tg-yw4l">Kesertaan KB</th>
			</tr>
			<?php 
			$q_bkb	= $this->db->query("SELECT * FROM info_kader_bkb WHERE id_wilayah_bkb = '".$baca->ID_WILAYAH_BKB."'")->result();
			
			foreach ($q_bkb as $data) {
			?>
			<tr>
				<td class="tg-yw4l"><div class="well-large"><b><?=$data->JABATAN_BKB?></b></div></td>
				<td class="tg-yw4l"><?=$data->NAMA_KADER_BKB?></td>
				<td class="tg-yw4l"><?=$data->PENDIDIKAN_BKB?></td>
				<td class="tg-yw4l"><?=$data->PERNAH_PELATIHAN_BKB?></td>
				<td class="tg-yw4l"><?=$data->PEKERJAAN_BKB?></td>
				<td class="tg-yw4l"><?=$data->STATUS_PUS_KADER_BKB?></td>
				<td class="tg-yw4l"><?=$data->KESERTAAN_KB_BKB?></td>
			</tr>
			<?php } ?>
			</table>
			<br>
			<br>
			
				<!-- Informasi Sasaran -->
			Informasi Keluarga Sasaran Dan Peserta BKB
			<table class="tg">
			  <tr>
				<th class="tg-yw4l" rowspan="2">Sasaran Keluarga</th>
				<th class="tg-yw4l" rowspan="2">Jumlah Keluarga Mempunyai Balita</th>
				<th class="tg-yw4l" rowspan="2">Jumlah Yang Menjadi Anggota</th>
				<th class="tg-yw4l" rowspan="2">Jumlah Keluarga Yang PUS</th>
				<th class="tg-yw4l" colspan="7">Anggota BKB Yang Peserta KB</th>
			  </tr>
			  <tr>
				<td class="tg-yw4l">IUD</td>
				<td class="tg-yw4l">MOW</td>
				<td class="tg-yw4l">MOP</td>
				<td class="tg-yw4l">KONDOM</td>
				<td class="tg-yw4l">IMPLAN</td>
				<td class="tg-yw4l">SUNTIK</td>
				<td class="tg-yw4l">PIL</td>
			  </tr>
			  <tr>
				<td class="tg-yw4l">KPS/KSI</td>
				<td class="tg-yw4l"><?php echo $kps_ksi['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $anggota_kps['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $pus_kps['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $iud_kps['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $mow_kps['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $mop_kps['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $k_kps['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $ipn_kps['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $s_kps['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $p_kps['0']->tot; ?></td>
			  </tr>
			  <tr>
				<td class="tg-yw4l">Seluruh Tahap KS</td>
				<td class="tg-yw4l"><?php echo $seluruh_tahap_ks['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $anggota_ks['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $pus_ks['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $iud_ks['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $mow_ks['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $mop_ks['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $k_ks['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $ipn_ks['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $s_ks['0']->tot; ?></td>
				<td class="tg-yw4l"><?php echo $p_ks['0']->tot; ?></td>
			  </tr>
			</table>
			<br>
			<br>
			
			<!-- Informasi Kegiatan Penyuluhan -->
			Informasi Kegiatan Penyuluhan
			<table class="tg">
			<tr>
				<th class="tg-yw4l">Materi Pertemuan</th>
				<th class="tg-yw4l">Pemberian Materi</th>
				<th class="tg-yw4l">Ada Diskusi</th>
			</tr>
			<?php 
			$q_bkb	= $this->db->query("SELECT * FROM kegiatan_penyuluhan_bkb WHERE id_wilayah_bkb = '".$baca->ID_WILAYAH_BKB."'")->result();
			
			foreach ($q_bkb as $data) {
			?>
			<tr>
				<td class="tg-yw4l"><div class="well-large"><b><?=$data->JUDUL_PENYULUHAN_BKB?></b></div></td>
				<td class="tg-yw4l"><?=$data->PEMBERIAN_MATERI_BKB?></td>
				<td class="tg-yw4l"><?=$data->ADA_DISKUSI_BKB?></td>
			</tr>
			<?php } ?>
			</table>
			<br>
			<br>
			