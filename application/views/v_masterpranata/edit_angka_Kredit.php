  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Angka Kredit
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

          
<?php
foreach($res as $r){
?>			
			<a href="<?php echo base_url('C_angka_kredit'); ?>" class="btn btn-primary">Back<i class="glyphicon glyphicon-arrow-left"></i></a>
          <table class="table">
            <form id="form1" name="postform" method="post" action="<?php echo base_url('C_angka_kredit/update'); ?>" enctype="multipart/form-data">
              <input type="hidden" name="idu" value="<?php echo $r->id; ?>">
              <input type="hidden" name="nipu" value="<?php echo $r->nip; ?>">
               <tr>
                <td>Id</td>
                <td>:</td>
                <td><input type=text name="id" class="form-control" value="<?php echo $r->id ?>" disabled="disabled"></td>
              </tr>
              <tr>
                <td>Nip</td>
                <td>:</td>
                <td><input type=text name="nip" class="form-control" value="<?php echo $r->nip ?>" disabled="disabled"></td>
              </tr>
             
              <tr>
                <td>Tahun</td>
                <td>:</td>
                <td>
                  <select name="thn" size="1" id="thn" class="form-control">
                  <?php
                       for ($i=2016;$i<=2100;$i++)
                     {?>
                       <option value="<?php echo $i; ?>" <?php if($i == $r->tahun){ echo "selected"; } ?> > <?php echo $i; ?> </option>
                  <?php
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
                      <option value="Ahli" <?php if($r->tingkat == "Ahli"){ echo "selected"; } ?>>Ahli</option>
                      <option value="Terampil" <?php if($r->tingkat == "Terampil"){ echo "selected"; } ?>>Terampil</option>
                  </select>
                </td>
              </tr>
        <tr>
                <td>Unsur</td>
                <td>:</td>
                <td>
                  <select id="unsur" name="unsur" class="unsur form-control">
                      <option value="0">-- Pilih Unsur --</option>
                  <?php
                    $tingkat = $r->tingkat;
                    $dataEdit = $this->M_angka_kredit->select_DataUnsur($tingkat);
                    foreach ($dataEdit as $row_unsur) {?>
                      <option value="<?php echo $row_unsur->kd_unsur ?>" <?php if($r->unsur == $row_unsur->unsur){ echo "selected"; } ?> ><?php echo $row_unsur->unsur; ?></option>
                  <?php
                    }
                  ?>
                  </select>
              </td>
              </tr>
              <tr>
              <tr>
        <tr>
                <td>Sub Unsur</td>
                <td>:</td>
                <td>
                  <select id="sub_unsur" name="sub_unsur" class="sub_unsur form-control">
                      <option value="0">-- Pilih Sub Unsur --</option>
                  <?php
                    $sub_unsur = $r->sub_unsur;
                    $dataEditSubUnsur = $this->M_angka_kredit->select_DataSubUnsur($sub_unsur);
                    foreach ($dataEditSubUnsur as $row_subunsur) {?>
                      <option value="<?php echo $row_subunsur->kd_subunsur ?>" <?php if($r->sub_unsur == $row_subunsur->sub_unsur){ echo "selected"; } ?> ><?php echo $row_subunsur->sub_unsur; ?></option>
                  <?php
                    }
                  ?>
                  </select>
        <tr>
                <td>Butir Kegiatan</td>
                <td>:</td>
                <td>
                  <select id="butir_kegiatan" name="butir_kegiatan" class="butir_kegiatan form-control">
                      <option value="0">-- Pilih Butir Kegiatan --</option>
                  <?php
                    $butir_kegiatan = $r->butir_kegiatan;
                    $dataEditButirKegiatan = $this->M_angka_kredit->select_DataButirKegiatan($sub_unsur);
                    foreach ($dataEditButirKegiatan as $row_butirkegiatan) {?>
                      <option value="<?php echo $row_butirkegiatan->kd_butirkegiatan ?>" <?php if($r->butir_kegiatan == $row_butirkegiatan->butir_kegiatan){ echo "selected"; } ?> ><?php echo $row_butirkegiatan->butir_kegiatan; ?></option>
                  <?php
                    }
                  ?>
                  </select>
                </td>
        </tr>
        <tr>
                <td>Angka Kredit</td>
                <td>:</td>
                <td>
                  <input type="text" name='angka_kredit' id='angka_kredit' class="angka_kredit form-control" value="<?php echo $r->angka_kredit; ?>" readonly="">
                </td>
        </tr>
        <tr>
                <td>Sertifikat</td>
                <td>:</td>
                <td>
                  <input type="text" name='sertifikat_old' id='sertifikat_old' class="form-control" value="<?php echo $r->sertifikat; ?>" readonly="">
                  Ganti Sertifikat :
                  <input type="file" name="sertifikat" id="sertifikat" class="form-control">
                </td>
              </tr>
              <tr>
                <td colspan="3">
                    <input name="Submit" type="submit" value="Save" class="btn btn-success" />
                    <input type="reset" name="reset" value="Clear" class="btn btn-danger" />
                    </td>
              </tr>
           </form>
           </table> 
<?php
}
?>
<!--     </section> -->
    <!-- /.content -->
<!--   </div> -->
  <!-- /.content-wrapper -->

  <script type="text/javascript">
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