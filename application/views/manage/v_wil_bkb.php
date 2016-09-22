<legend>Daftar Wilayah BKB</legend>
	
	<div class="span5">
	<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>index.php/manage/wil_bkb/add/', '_self')">Data Baru</button>
	</div>
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
						<td style="text-align: center"><? echo $b->NAMA_KELOMPOK_BKB ?></td>
						<td style="text-align: center"><?=$b->NAMA_KETUA_BKB?></td>
						<td style="text-align: center"><?=$b->TAHUN_BKB?></td>

						<td style="text-align: center">
						<a href="<?php echo base_URL(); ?>index.php/manage/wil_bkb/edit/<?=$b->ID_WILAYAH_BKB?>"><span class="icon-pencil">&nbsp;&nbsp;</span></a>  
						<a href="<?php echo base_URL(); ?>index.php/manage/wil_bkb/del/<?=$b->ID_WILAYAH_BKB ?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$b->NAMA_KELOMPOK_BKB?>?');"><span class="icon-remove">&nbsp;&nbsp;</span></a>
						<a href="<?=base_URL()?>index.php/manage/pre_register_bkb/baca/<?=$b->ID_WILAYAH_BKB?>/<?=getURLFriendly($b->NAMA_KELOMPOK_BKB)?>">REGISTER</a>
						<td style="text-align: center"><form action="<?=base_URL()?>index.php/manage/rekap_bkb" method="post"name="f_register_pus">
						<input type="hidden" name="id_wilayah_bkb" value="<?=$b->ID_WILAYAH_BKB?>">
						<input type="submit" class="btn btn-primary" name="Laporan"></td>
						<td style="text-align: center"><a href="<?=base_URL()?>index.php/manage/pre_register_potensi_bkb/baca/<?=$b->ID_WILAYAH_BKB?>/<?=getURLFriendly($b->NAMA_KELOMPOK_BKB)?>">REGISTER</a>
						</form>
						</td>
					</tr>	
					<?php endforeach ?>
				</table>
