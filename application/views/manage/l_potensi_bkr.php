<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-fgs7{font-style:italic;font-family:"Arial Black", Gadget, sans-serif !important;;text-align:center;vertical-align:top}
.tg .tg-223e{font-family:"Arial Black", Gadget, sans-serif !important;;text-align:center;vertical-align:top}
</style>

<legend>KELOMPOK BKR: <?php echo $baca->NAMA_KELOMPOK_BKR ?></legend>
<legend>KETUA: <?php echo $baca->NAMA_KETUA_BKR ?></legend>
<legend>PEMBINA: <?php echo $baca->NAMA_PEMBINA_BKR ?></legend>
<legend>TAHUN: <?php echo $baca->TAHUN_BKR ?></legend>
	
	
			<legend>Register Potensi BKR</legend>
			<legend>Informasi Kelompok</legend>
			<table class="tg">
			<tr>
				<th class="tg-223e">SK Pengukuhan</th>
				<th class="tg-223e">Sertifikasi Kelompok</th>
				<th class="tg-223e">Keterpaduan Kelompok</th>
				<th class="tg-223e">Buku BKR</th>
				<th class="tg-223e">Sumber Dana</th>
			</tr>
			<?php 
			$q_bkr	= $this->db->query("SELECT * FROM info_kelompok_bkr WHERE id_wilayah_bkr = '".$baca->ID_WILAYAH_BKR."'")->result();
			
			foreach ($q_bkr as $data) {
			?>
			<tr>
				<td class="tg-223e"><?=$data->SK_PENGUKUHAN_BKR?></td>
				<td class="tg-223e"><? echo $data->SERTIFIKASI_BKR; ?></td>
				<td class="tg-223e"><?=$data->KETERPADUAN_BKR;?></td>
				<td class="tg-223e"><?php echo $data->BUKU_BKR; ?></td>
				<td class="tg-223e"><? echo $data->SUMBER_DANA_BKR;?></td>
			</tr>
			<?php } ?>
			</table>
			<br>
			<br>
			
			<!-- Informasi Kader -->
			<legend>Informasi Kader</legend>
			<table class="tg">
			<tr>
				<th class="tg-223e">Jabatan</th>
				<th class="tg-223e">Nama</th>
				<th class="tg-223e">Pendidikan</th>
				<th class="tg-223e">Pernah Pelatihan</th>
				<th class="tg-223e">Pekerjaan</th>
				<th class="tg-223e">Status PUS</th>
				<th class="tg-223e">Kesertaan KB</th>
			</tr>
			<?php 
			$q_bkr	= $this->db->query("SELECT * FROM info_kader_bkr WHERE id_wilayah_bkr = '".$baca->ID_WILAYAH_BKR."'")->result();
			
			foreach ($q_bkr as $data) {
			?>
			<tr>
				<td class="tg-223e"><div class="well-large"><b><?=$data->JABATAN_BKR?></b></div></td>
				<td class="tg-223e"><?=$data->NAMA_KADER_BKR?></td>
				<td class="tg-223e"><?=$data->PENDIDIKAN_BKR?></td>
				<td class="tg-223e"><?=$data->PERNAH_PELATIHAN_BKR?></td>
				<td class="tg-223e"><?=$data->PEKERJAAN_BKR?></td>
				<td class="tg-223e"><?=$data->STATUS_PUS_KADER_BKR?></td>
				<td class="tg-223e"><?=$data->KESERTAAN_KB_KADER_BKR?></td>
			</tr>
			<?php } ?>
			</table>
			<br>
			<br>
			
			<!-- Informasi Kegiatan Penyuluhan -->
			<legend>Informasi Kegiatan Penyuluhan</legend>
			<table class="tg">
			<tr>
				<th class="tg-223e">Materi Pertemuan</th>
				<th class="tg-223e">Pemberian Materi</th>
				<th class="tg-223e">Ada Diskusi</th>
			</tr>
			<?php 
			$q_bkr	= $this->db->query("SELECT * FROM kegiatan_penyuluhan_bkr WHERE id_wilayah_bkr = '".$baca->ID_WILAYAH_BKR."'")->result();
			
			foreach ($q_bkr as $data) {
			?>
			<tr>
				<td class="tg-223e"><div class="well-large"><b><?=$data->JUDUL_PENYULUHAN_BKR?></b></div></td>
				<td class="tg-223e"><?=$data->PEMBERIAN_MATERI_BKR?></td>
				<td class="tg-223e"><?=$data->ADA_DISKUSI_BKR?></td>
			</tr>
			<?php } ?>
			</table>
			<br>
			<br>
			