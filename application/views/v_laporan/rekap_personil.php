	<div class="content">
    	
           <div class="col-md-9"> 
            
          <h2><u>Personil Kemhan</u></h2>
          <!-- <a href="https://www.mbtech.info/e-assessment/C_laporan_pdf" class="btn btn-info" role="button">Cetak Laporan</a> -->
          <a href="<?php echo base_url('C_laporan_pdf'); ?>" class="btn btn-info" role="button">Cetak Laporan</a>

          <br />
        <table class="table table-responsive table-striped" id="dtable">
         <thead>
          <tr>
             <th>No</th>
             <th>Nip</th>
             <th>Nama</th>
             <th>Pangkat</th>
			       <th>Jabatan</th>
            
                              
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
               <td><?php echo $val->nip;?></td>
               <td><?php echo $val->nama;?></td>
               <td><?php echo $val->nama_pangkat;?></td>
               <td><?php echo $val->nama_jabatan;?></td>
              
               
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
    </div>  
	
