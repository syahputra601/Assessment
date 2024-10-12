  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Angka Kredit
      </h1>
      <?php echo @$error;?>
    </section>

    <!-- Main content -->
    <section class="content">
<?php
	if($permit['w']){
?>
    	<table class="table">
            <form id="form1" name="postform" method="post" action="<?php echo base_url('C_angka_kredit/insert'); ?>" enctype="multipart/form-data">
			<tr>
              <tr>
                <td>Nip</td>
                <td>:</td>
                <td>
                  <?php
                  $NIP = $this->session->nip;
                  if($this->session->role == 3){
                  ?>
                  <input type=number name='nip' class="form-control" value="<?php echo $NIP; ?>" required="" readonly>
                  <?php
                  }else{
                  ?>
                  <input type=number name='nip' class="form-control" required="">
                  <?php
                  }
                  ?>
                </td>
              </tr> 
              <tr>
                <td>Tahun</td>
                <td>:</td>
                <td>
                  <select name="thn" size="1" id="thn" class="form-control">
              		  <?php
              		     for ($i=2016;$i<=2100;$i++)
              			 {
              			   echo "<option value=".$i.">".$i."</option>";
              			 }
              		  ?>
              		</select>
                </td>
              </tr>
              <tr>
                <td>Tingkat </td>
                <td>:</td>
                <td>
                  <select id="tingkat" name="tingkat" class="form-control">
                      <option value="">-- Pilih Tingkat --</option>
                      <option value="Ahli">Ahli</option>
                      <option value="Terampil">Terampil</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Unsur</td>
                <td>:</td>
                <td>
                  <select id="unsur" name="unsur" class="unsur form-control">
                      <option value="0">-- Pilih Unsur --</option>
                  </select>
                </td>
              </tr>
			        <tr>
                <td>Sub Unsur</td>
                <td>:</td>
                <td>
                  <select id="sub_unsur" name="sub_unsur" class="sub_unsur form-control">
                      <option value="0">-- Pilih Sub Unsur --</option>
                  </select>
                </td>
              </tr>
			        <tr>
                <td>Butir Kegiatan</td>
                <td>:</td>
                <td>
                  <!-- <input type="text" name='pd2' class="form-control"> -->
                  <select id="butir_kegiatan" name="butir_kegiatan" class="butir_kegiatan form-control">
                      <option value="0">-- Pilih Butir Kegiatan --</option>
                  </select>
                </td>
              </tr>
			        <tr>
                <td>Angka Kredit</td>
                <td>:</td>
                <td>
                  <input type="text" name='angka_kredit' id='angka_kredit' class="angka_kredit form-control" readonly="">
                </td>
              </tr>
			        <tr>
                <td>Sertifikat</td>
                <td>:</td>
                <td><input type="file" name="sertifikat" id="sertifikat" class="form-control"></td>
              </tr>
              <tr>
                <td colspan="3">
                    <input name="Submit" type="submit" value="Save" class="btn btn-success" />
                    <input type="reset" name="reset" value="Clear" class="btn btn-danger" required="" />
                    </td>
              </tr>
            </form>
          </table>
          <hr>
    <?php 
	}
	?>
          <h2><u>Data Angka Kredit</u></h2>
              <table class="table table-responsive table-striped" id="dtable">
				<thead>
                <tr>
                  <th>No</th>
                  <th>Nip </th>
                  <th>Tahun</th>
                  <th>Tingkat</th>
				          <th>Unsur</th>
                  <th>Sub Unsur</th>
                  <th>Butir Kegiatan</th>
				          <th>Angka Kredit</th>
                  <th>Sertifikat</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
				//$list_ = $this->M_angka_kredit->list_angka_kredit();
        $no = 0;
				foreach($list_angka_kredit as $row){
          $no++;
          $Url_sertifikat = base_url().'sertifikat/'.$row->sertifikat;
					echo 
          '<tr>
              <td>'.$no.'</td>
              <td>'.$row->nip.'</td>
        		  <td>'.$row->tahun.'</td>
        		  <td>'.$row->tingkat.'</td>
        		  <td>'.$row->unsur.'</td>
              <td>'.$row->sub_unsur.'</td>
              <td>'.$row->butir_kegiatan.'</td>
        		  <td>'.$row->angka_kredit.'</td>
              <td>
                  <a href="'.$Url_sertifikat.'" target="blank">'.$row->sertifikat.'</a>
              </td>
              <td>';
    				  if($permit['w']==1){
    				  	echo '<a href="'.base_url('C_angka_kredit/edit/'.$row->id).'" class="text text-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> ';
    				  }
    				  if($permit['d']==1){
    				  echo ' <a href="'.base_url('C_angka_kredit/delete/'.$row->id).'" class="text text-danger" onclick="return confirm(\'are you sure?\');"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
    				  }
    				  echo '</td>
          </tr>';
				}
				?>
                </tbody>


              </table>

    <!-- </section> -->
    <!-- /.content -->
<!--   </div> -->
  <!-- /.content-wrapper -->
  <script type="text/javascript">

    // var $sel = $('#sel option').detach(); // global variable

    // $('a').on('click', function (e) {
    //     e.preventDefault();
    //     var c = $(this).data('sel');
    //     $('#sel').empty().append( $sel.filter('.'+c) );
    // });

    //START CODING UNTUK MENDAPATKAN DATA SESUAI PERUBAHAN PADA PILIHAN YANG ADA PADA TINGKAT
    $('#tingkat').change(function(){
      var tingkat=$(this).val();
      $.ajax({
        url : "<?php echo base_url();?>C_angka_kredit/get_unsur",
        method : "POST",
        data : {tingkat: tingkat},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                var empty = 0;
                html += '<option value='+empty+'>-- Pilih Data Unsur --</option>';
                for(i=0; i<data.length; i++){
                    var kdunsur = data[i].kd_unsur;
                    html += '<option value='+kdunsur+'>'+data[i].unsur+'</option>';
                }
                $('.unsur').html(html);
        }
      });
    });
    //END CODING UNTUK MENDAPATKAN DATA SESUAI PERUBAHAN PADA PILIHAN YANG ADA PADA TINGKAT

    //START CODING UNTUK MENDAPATKAN DATA SESUAI PERUBAHAN PADA PILIHAN YANG ADA PADA UNSUR
    $('#unsur').change(function(){
      var unsur=$(this).val();
      $.ajax({
        url : "<?php echo base_url();?>C_angka_kredit/get_sub_unsur",
        method : "POST",
        data : {unsur: unsur},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                var empty = 0;
                html += '<option value='+empty+'>-- Pilih Data Sub Unsur --</option>';
                for(i=0; i<data.length; i++){
                    var kdsubunsur = data[i].kd_subunsur;
                    html += '<option value='+kdsubunsur+'>'+data[i].sub_unsur+'</option>';
                }
                $('.sub_unsur').html(html);
        }
      });
    });
    //END CODING UNTUK MENDAPATKAN DATA SESUAI PERUBAHAN PADA PILIHAN YANG ADA PADA UNSUR

    //START CODING UNTUK MENDAPATKAN DATA SESUAI PERUBAHAN PADA PILIHAN YANG ADA PADA SUB UNSUR
    $('#sub_unsur').change(function(){
      var sub_unsur=$(this).val();
      $.ajax({
        url : "<?php echo base_url();?>C_angka_kredit/get_butir_kegiatan",
        method : "POST",
        data : {sub_unsur: sub_unsur},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                var empty = 0;
                html += '<option value='+empty+'>-- Pilih Data Butir Kegiatan --</option>';
                for(i=0; i<data.length; i++){
                    var kdbutirkegiatan = data[i].kd_butirkegiatan;
                    var angkaKredit = data[i].angka_kredit;
                    html += '<option value='+kdbutirkegiatan+'>'+data[i].butir_kegiatan+'</option>';
                }
                $('.butir_kegiatan').html(html);
                //$('.angka_kredit').html(data[i].angka_kredit);
                //document.getElementById("angka_kredit").innerHTML=data[i].angka_kredit;
        }
      });
    });
    //END CODING UNTUK MENDAPATKAN DATA SESUAI PERUBAHAN PADA PILIHAN YANG ADA PADA SUB UNSUR

    //START CODING UNTUK MENDAPATKAN DATA SESUAI PERUBAHAN PADA PILIHAN YANG ADA PADA SUB UNSUR
    $('#butir_kegiatan').change(function(){
      var butir_kegiatan=$(this).val();
      $.ajax({
        url : "<?php echo base_url();?>C_angka_kredit/get_angka_kredit",
        method : "POST",
        data : {butir_kegiatan: butir_kegiatan},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                var empty = 0;
                //html += '<option value='+empty+'>-- Pilih Data Butir Kegiatan --</option>';
                for(i=0; i<data.length; i++){
                    var kdbutirkegiatan = data[i].kd_butirkegiatan;
                    var angkaKredit = data[i].angka_kredit;
                    //html += '<option value='+kdbutirkegiatan+'>'+data[i].butir_kegiatan+'</option>';
                }
                //$('.butir_kegiatan').html(html);
                //$('.angka_kredit').html(data[i].angka_kredit);
                $('#angka_kredit').val(angkaKredit);
                //document.getElementById("angka_kredit").innerHTML=data[i].angka_kredit;
        }
      });
    });
    //END CODING UNTUK MENDAPATKAN DATA SESUAI PERUBAHAN PADA PILIHAN YANG ADA PADA SUB UNSUR

</script>