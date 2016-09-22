<legend>Daftar Wilayah UPPKS</legend>
	<div class="span5">
	<button class="btn btn-primary" type="button" onclick="window.open('<?php echo base_URL(); ?>index.php/manage/wil_uppks/add/', '_self')">Data Baru</button>
	</div>
	<br><br>
			
				<?php echo $this->session->flashdata("k");?>
				

				<table width="100%"  class="table table-condensed">
					<tr>
						<th width="25%">No</th>
						<th width="25%">Nama Kelompok</th>
						<th width="25%">Alamat</th>
						<th width="25%">Control</th>
					</tr>
					
					<?php $i = 0 ?>
					<?php foreach ($data as $b):
					$i++;
					?>
					<tr>
						<td style="text-align: center"><?php echo $i; ?></td>
						<td style="text-align: center"><? echo $b->NAMA_KELOMPOK_UPPKS ?></td>
						<td style="text-align: center">KECAMATAN: <?php echo $b->NAMA_KECAMATAN ?>, 
							KELURAHAN: <?php echo $b->NAMA_KELURAHAN ?>,
							RW: <?php echo $b->NAMA_RW ?>,
							RT: <?php echo $b->ANGKA_RT ?></td>

						<td style="text-align: center">
						<a href="<?php echo base_URL(); ?>index.php/manage/wil_pus/edit/<?=$b->ID_WILAYAH_UPPKS?>"><span class="icon-pencil">&nbsp;&nbsp;</span></a>  
						<a href="<?php echo base_URL(); ?>index.php/manage/wil_pus/del/<?=$b->ID_WILAYAH_UPPKS ?>" onclick="return confirm('Anda YAKIN menghapus data \n <?=$b->NAMA_KELOMPOK_UPPKS?>?');"><span class="icon-remove">&nbsp;&nbsp;</span></a>
						<a href="<?=base_URL()?>index.php/manage/pre_register_uppks/baca/<?=$b->ID_WILAYAH_UPPKS?>/<?=getURLFriendly($b->NAMA_KELOMPOK_UPPKS)?>">REGISTER</a>
						</td>
					</tr>	
					<?php endforeach ?>
				</table>
