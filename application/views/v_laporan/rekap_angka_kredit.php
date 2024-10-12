	<div class="content">

    	

        <section class="content-header">
        <h2><u>Angka Kredit Personil Kemhan</u></h2>
        <table class="table table-responsive table-striped" id="dtable">
         <thead>
          <tr>
             <th>No</th>
             <!-- <th>Tahun</th> -->
             <th>Nip</th>
             <th>Nama</th>
             <th>Pangkat</th>
			       <th>Jabatan</th>
             <!-- <th>Tingkat</th>
             <th>Unsur</th>
             <th>Sub Unsur</th>
             <th>Butir Kegiatan</th> -->
             <th>Total Angka Kredit</th>
                              
           </tr>
           </thead>
            <tbody>
            <?php
			$no=1;
			$total=0;
			foreach($res->result() as $val) {
				//$total = $total+$val->jumlah;
			?>
             <tr>
               <td><?php echo $no;?></td>
               <!-- <td><?php echo $val->tahun;?></td> -->
               <td><?php echo $val->nip;?></td>
               <td><?php echo $val->nama;?></td> 
               <td><?php echo $val->nama_pangkat;?></td>
               <td><?php echo $val->nama_jabatan;?></td>
               <!-- <td><?php echo $val->tingkat;?></td>
               <td><?php echo $val->unsur;?></td>
               <td><?php echo $val->sub_unsur;?></td>
               <td><?php echo $val->butir_kegiatan;?></td> -->
               <td><?php echo $val->total;?></td>
               
             </tr>
             <?php
			  $no++;
			} ?>
            </tbody>
            <tfoot>
               
             </tfoot>
            </table>
        </div>
        </div>
        <div class="clearfix"></div>
<div style="height: 350px;"></div>