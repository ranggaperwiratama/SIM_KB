<legend>Daftar Wilayah BKL</legend>
	
	<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>index.php/manage/wil_bkl/add/', '_self')">Data Baru</button>
	
	<br><br>
			
				<?php echo $this->session->flashdata("k");?>
				

				<table width="100%"  class="table table-condensed">
					<tr>
						<th width="14%">No</th>
						<th width="14%">Nama Kelompok</th>
						<th width="14%">Ketua</th>
						<th width="14%">Tahun</th>
						<th width="14%">Control</th>
						<th width="14%">Laporan Setahun</th>
						<th width="14%">Kartu Data Potensi</th>
					</tr>
					
					<?php $i = 0 ?>
					<?php foreach ($data as $b):
					$i++;
					?>
					<tr>
						<td style="text-align: center"><?php echo $i; ?></td>
						<td style="text-align: center"><? echo $b->NAMA_KELOMPOK_BKL ?></td>
						<td style="text-align: center"><?=$b->NAMA_KETUA_BKL?></td>
						<td style="text-align: center"><?=$b->TAHUN_BKL?></td>

						<td style="text-align: center">
						<a href="<?php echo base_URL(); ?>index.php/manage/wil_bkl/edit/<?=$b->ID_WILAYAH_BKL?>"><span class="icon-pencil">&nbsp;&nbsp;</span></a>  
						<a href="<?php echo base_URL(); ?>index.php/manage/wil_bkl/del/<?=$b->ID_WILAYAH_BKL ?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$b->NAMA_KELOMPOK_BKL?>?');"><span class="icon-remove">&nbsp;&nbsp;</span></a>
						<a href="<?=base_URL()?>index.php/manage/pre_register_bkl/baca/<?=$b->ID_WILAYAH_BKL?>/<?=getURLFriendly($b->NAMA_KELOMPOK_BKL)?>">REGISTER</a>
						</td>
						<td style="text-align: center"><form action="<?=base_URL()?>index.php/manage/rekap_bkl" method="post"name="f_register_bkl">
						<input type="hidden" name="id_wilayah_bkl" value="<?=$b->ID_WILAYAH_BKL?>">
						<input type="submit" class="btn btn-primary" name="Laporan"></td>
						<td style="text-align: center"><a href="<?=base_URL()?>index.php/manage/pre_register_potensi_bkl/baca/<?=$b->ID_WILAYAH_BKL?>/<?=getURLFriendly($b->NAMA_KELOMPOK_BKL)?>">REGISTER</a>
					</tr>	
					<?php endforeach ?>
				</table>
