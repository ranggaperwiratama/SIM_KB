<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-gqdk{background-color:#000000;vertical-align:top}
.tg .tg-6un8{background-color:#000000;color:#000000;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
</style>
<table class="tg">
  <tr>
    <th class="tg-yw4l" rowspan="2">NO</th>
    <th class="tg-yw4l" rowspan="2">URAIAN</th>
    <th class="tg-yw4l" colspan="2">JALUR PELAYANAN</th>
    <th class="tg-yw4l" colspan="2">TAHAPAN KS</th>
    <th class="tg-yw4l" colspan="2">JKN</th>
  </tr>
  <tr>
    <td class="tg-yw4l">SWASTA</td>
    <td class="tg-yw4l">PEMERINTAH</td>
    <td class="tg-yw4l">TAHAP KS</td>
    <td class="tg-yw4l">KPS/KSI</td>
    <td class="tg-yw4l">PBI</td>
    <td class="tg-yw4l">NON PBI</td>
  </tr>
  <tr>
    <td class="tg-yw4l">1</td>
    <td class="tg-yw4l">JUMLAH PUS</td>
    <td class="tg-gqdk" colspan="2"></td>
    <td class="tg-yw4l"><?=$tot_ks['0']->tot?></td>
    <td class="tg-yw4l"><?=$tot_kps['0']->tot?></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
  </tr>
  <tr>
    <td class="tg-yw4l">2</td>
    <td class="tg-yw4l">JUMLAH AKTIF</td>
    <td class="tg-yw4l"><?=$total_swasta['0']->tot?></td>
    <td class="tg-yw4l"><?=$total_pemerintah['0']->tot?></td>
    <td class="tg-yw4l"><?=$total_aktif_ks['0']->tot?></td>
    <td class="tg-yw4l"><?=$total_aktif_kps['0']->tot?></td>
    <td class="tg-yw4l"><?=$total_aktif_pbi['0']->tot?></td>
    <td class="tg-yw4l"><?=$total_aktif_nonpbi['0']->tot?></td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l">IUD</td>
    <td class="tg-yw4l"><?=$iud_swasta['0']->tot?></td>
    <td class="tg-yw4l"><?=$iud_pemerintah['0']->tot?></td>
    <td class="tg-yw4l"><?=$iud_ks['0']->tot?></td>
    <td class="tg-yw4l"><?=$iud_kps['0']->tot?></td>
    <td class="tg-yw4l"><?=$iud_pbi['0']->tot?></td>
    <td class="tg-yw4l"><?=$iud_nonpbi['0']->tot?></td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l">MOW</td>
    <td class="tg-yw4l"><?=$mow_swasta['0']->tot?></td>
    <td class="tg-yw4l"><?=$mow_pemerintah['0']->tot?></td>
    <td class="tg-yw4l"><?=$mow_ks['0']->tot?></td>
    <td class="tg-yw4l"><?=$mow_kps['0']->tot?></td>
    <td class="tg-yw4l"><?=$mow_pbi['0']->tot?></td>
    <td class="tg-yw4l"><?=$mow_nonpbi['0']->tot?></td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l">MOP</td>
    <td class="tg-yw4l"><?=$mop_swasta['0']->tot?></td>
    <td class="tg-yw4l"><?=$mop_pemerintah['0']->tot?></td>
    <td class="tg-yw4l"><?=$mop_ks['0']->tot?></td>
    <td class="tg-yw4l"><?=$mop_kps['0']->tot?></td>
    <td class="tg-yw4l"><?=$mop_pbi['0']->tot?></td>
    <td class="tg-yw4l"><?=$mop_nonpbi['0']->tot?></td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l">KONDOM</td>
    <td class="tg-yw4l"><?=$kondom_swasta['0']->tot?></td>
    <td class="tg-yw4l"><?=$kondom_pemerintah['0']->tot?></td>
    <td class="tg-yw4l"><?=$k_ks['0']->tot?></td>
    <td class="tg-yw4l"><?=$k_kps['0']->tot?></td>
    <td class="tg-yw4l"><?=$k_pbi['0']->tot?></td>
    <td class="tg-yw4l"><?=$k_nonpbi['0']->tot?></td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l">IMPLAN</td>
    <td class="tg-yw4l"><?=$implan_swasta['0']->tot?></td>
    <td class="tg-yw4l"><?=$implan_pemerintah['0']->tot?></td>
    <td class="tg-yw4l"><?=$ipn_ks['0']->tot?></td>
    <td class="tg-yw4l"><?=$ipn_kps['0']->tot?></td>
    <td class="tg-yw4l"><?=$ipn_pbi['0']->tot?></td>
    <td class="tg-yw4l"><?=$ipn_nonpbi['0']->tot?></td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l">SUNTIK</td>
    <td class="tg-yw4l"><?=$suntik_swasta['0']->tot?></td>
    <td class="tg-yw4l"><?=$suntik_pemerintah['0']->tot?></td>
    <td class="tg-yw4l"><?=$s_ks['0']->tot?></td>
    <td class="tg-yw4l"><?=$s_kps['0']->tot?></td>
    <td class="tg-yw4l"><?=$s_pbi['0']->tot?></td>
    <td class="tg-yw4l"><?=$s_nonpbi['0']->tot?></td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l">PIL</td>
    <td class="tg-yw4l"><?=$pil_swasta['0']->tot?></td>
    <td class="tg-yw4l"><?=$pil_pemerintah['0']->tot?></td>
    <td class="tg-yw4l"><?=$p_ks['0']->tot?></td>
    <td class="tg-yw4l"><?=$p_kps['0']->tot?></td>
    <td class="tg-yw4l"><?=$p_pbi['0']->tot?></td>
    <td class="tg-yw4l"><?=$p_nonpbi['0']->tot?></td>
  </tr>
  <tr>
    <td class="tg-yw4l">3</td>
    <td class="tg-yw4l">BUKAN PESERTA KB</td>
    <td class="tg-6un8" colspan="2" rowspan="5"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l"></td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l">HAMIL</td>
    <td class="tg-yw4l"><?=$h_ks['0']->tot?></td>
    <td class="tg-yw4l"><?=$h_kps['0']->tot?></td>
    <td class="tg-yw4l"><?=$h_pbi['0']->tot?></td>
    <td class="tg-yw4l"><?=$h_nonpbi['0']->tot?></td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l">INGIN ANAK SEGERA</td>
    <td class="tg-yw4l"><?=$ias_ks['0']->tot?></td>
    <td class="tg-yw4l"><?=$ias_kps['0']->tot?></td>
    <td class="tg-yw4l"><?=$ias_pbi['0']->tot?></td>
    <td class="tg-yw4l"><?=$ias_nonpbi['0']->tot?></td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l">INGIN ANAK DITUNDA</td>
    <td class="tg-yw4l"><?=$iat_ks['0']->tot?></td>
    <td class="tg-yw4l"><?=$iat_kps['0']->tot?></td>
    <td class="tg-yw4l"><?=$iat_pbi['0']->tot?></td>
    <td class="tg-yw4l"><?=$iat_nonpbi['0']->tot?></td>
  </tr>
  <tr>
    <td class="tg-yw4l"></td>
    <td class="tg-yw4l">TIDAK INGIN ANAK LAGI</td>
    <td class="tg-yw4l"><?=$tia_ks['0']->tot?></td>
    <td class="tg-yw4l"><?=$tia_kps['0']->tot?></td>
    <td class="tg-yw4l"><?=$tia_pbi['0']->tot?></td>
    <td class="tg-yw4l"><?=$tia_nonpbi['0']->tot?></td>
  </tr>
</table>

