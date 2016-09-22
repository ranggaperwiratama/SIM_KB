<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-fgs7{font-style:italic;font-family:"Arial Black", Gadget, sans-serif !important;;text-align:center;vertical-align:top}
.tg .tg-223e{font-family:"Arial Black", Gadget, sans-serif !important;;text-align:center;vertical-align:top}
</style>

<legend>KELOMPOK BKL: <?php echo $baca->NAMA_KELOMPOK_BKL ?></legend>
<legend>KETUA: <?php echo $baca->NAMA_KETUA_BKL ?></legend>
<legend>PEMBINA: <?php echo $baca->NAMA_PEMBINA_BKL ?></legend>
<legend>TAHUN: <?php echo $baca->TAHUN_BKL ?></legend>
	
	
			<legend>Register Potensi BKL</legend>
			<?=$this->session->flashdata("k");?>
			<legend>Informasi Kelompok</legend>
			<table class="tg">
			<tr>
				<th class="tg-223e">SK Pengukuhan</th>
				<th class="tg-223e">Sertifikasi Kelompok</th>
				<th class="tg-223e">Keterpaduan Kelompok</th>
				<th class="tg-223e">Buku BKL</th>
				<th class="tg-223e">Sumber Dana</th>
			</tr>
			<?php 
			$q_bkl	= $this->db->query("SELECT * FROM info_kelompok_bkl WHERE id_wilayah_bkl = '".$baca->ID_WILAYAH_BKL."'")->result();
			
			foreach ($q_bkl as $data) {
			?>
			<tr>
				<td class="tg-223e"><?=$data->SK_PENGUKUHAN_BKL?></td>
				<td class="tg-223e"><? echo $data->SERTIFIKASI_BKL; ?></td>
				<td class="tg-223e"><?=$data->KETERPADUAN_BKL;?></td>
				<td class="tg-223e"><?php echo $data->BUKU_BKL; ?></td>
				<td class="tg-223e"><? echo $data->SUMBER_DANA_BKL;?></td>
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
			$q_bkl	= $this->db->query("SELECT * FROM info_kader_bkl WHERE id_wilayah_bkl = '".$baca->ID_WILAYAH_BKL."'")->result();
			
			foreach ($q_bkl as $data) {
			?>
			<tr>
				<td class="tg-223e"><div class="well-large"><b><?=$data->JABATAN_BKL?></b></div></td>
				<td class="tg-223e"><?=$data->NAMA_KADER_BKL?></td>
				<td class="tg-223e"><?=$data->PENDIDIKAN_BKL?></td>
				<td class="tg-223e"><?=$data->PERNAH_PELATIHAN_BKL?></td>
				<td class="tg-223e"><?=$data->PEKERJAAN_BKL?></td>
				<td class="tg-223e"><?=$data->STATUS_PUS_KADER_BKL?></td>
				<td class="tg-223e"><?=$data->KESERTAAN_KB_KADER_BKL?></td>
			</tr>
			<?php } ?>
			</table>
			</div>
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
			$q_bkl	= $this->db->query("SELECT * FROM kegiatan_penyuluhan_bkl WHERE id_wilayah_bkl = '".$baca->ID_WILAYAH_BKL."'")->result();
			
			foreach ($q_bkl as $data) {
			?>
			<tr>
				<td class="tg-223e"><div class="well-large"><b><?=$data->JUDUL_PENYULUHAN_BKL?></b></div></td>
				<td class="tg-223e"><?=$data->PEMBERIAN_MATERI_BKL?></td>
				<td class="tg-223e"><?=$data->ADA_DISKUSI_BKL?></td>
			</tr>
			<?php } ?>
			</div>
			<br>
			<br>
			