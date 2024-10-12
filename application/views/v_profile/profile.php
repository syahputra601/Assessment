  <div class="content">
    <!-- Content Header (Page header) -->
<!--     <section class="content-header">

    </section> -->

    <!-- Main content -->

<?php
foreach($dataProfile as $row_profile){
  $NIP = $row_profile->nip;
  $NAMA_LENGKAP = $row_profile->nama;
  $TANGGAL_LAHIR = $row_profile->tgl_lahir;
  $NO_TELEPON = $row_profile->notelp;
  $ALAMAT = $row_profile->alamat;
  $GENDER = $row_profile->gender;
  $EMAIL = $row_profile->email;
  $NAMA_PANGKAT = $row_profile->nama_pangkat;
  $GOLONGAN = $row_profile->golongan;
  $NAMA_JABATAN = $row_profile->nama_jabatan;
  $BIDANG = $row_profile->bidang;
  $KD_PANGKAT = $row_profile->kd_pangkat;
  $KD_JABATAN = $row_profile->kd_jabatan;
}
?>

    <section class="content-header">
    <table class="table">
      <form id="form1" name="postform" method="post" action="<?php echo base_url('Profile'); ?>" enctype="multipart/form-data">
        <tr>
          <td colspan="1">
            <center>
              <h4>
              Profile
            </h4>
            </center>
          </td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td style="width: 200px;" rowspan="10">
            <?php
            $PICTURE = $this->session->picture;
            if($PICTURE != "" OR $PICTURE != NULL){
            ?>
            <img src="<?php echo base_url('assets/images/'.$this->session->picture);?>" style="max-width: 200px; height: 240px;" alt="Logo">
            <?php
            }else{
            ?>
            <img src="<?php echo base_url('assets/images/user.png');?>" style="max-width: 200px; height: 240px;" alt="Logo">
            <?php
            }
            ?>
          </td>
          <td style="width: 150px;">Nama Lengkap</td>
          <td>:</td>
          <td colspan="2">
            <input type="text" name='nama_lengkap' class="form-control" value="<?php echo @$NAMA_LENGKAP; ?>" readonly>
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">NIP</td>
          <td>:</td>
          <td colspan="2">
            <input type="number" name='nip' class="form-control" value="<?php echo @$NIP; ?>" readonly>
          </td>
        </tr>  
        <tr>
          <td style="width: 150px;" rowspan="1">Tanggal Lahir</td>
          <td>:</td>
          <td colspan="2">
            <input type="text" name='tanggal_lahir' id='tanggal_lahir' class="form-control datepicker" value="<?php echo @$TANGGAL_LAHIR; ?>">
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">No Telepon</td>
          <td>:</td>
          <td colspan="2">
            <input type="number" name='no_telepon' id='no_telepon' class="form-control" required="" value="<?php echo @$NO_TELEPON; ?>">
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">Alamat</td>
          <td>:</td>
          <td colspan="2">
            <textarea style="resize: none; height: 120px;" name="alamat" id="alamat" class="form-control" required=""><?php echo @$ALAMAT; ?></textarea>
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">Jenis Kelamin</td>
          <td>:</td>
          <td colspan="2">
            <select id="gender" name="gender" class="form-control" >
              <?php
              if($GENDER == "M"){
              ?>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="M" selected="">Laki-Laki</option>
                <option value="F">Perempuan</option>
              <?php
              }elseif($GENDER == "F"){
              ?>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="M">Laki-Laki</option>
                <option value="F" selected="">Perempuan</option>
              <?php
              }else{
              ?>
                <option value="" selected="">-- Pilih Jenis Kelamin --</option>
                <option value="M">Laki-Laki</option>
                <option value="F">Perempuan</option>
              <?php
              }
              ?>
          </select>
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">Email</td>
          <td>:</td>
          <td colspan="2">
            <input type="email" name='email' id='email' class="form-control" value="<?php echo @$EMAIL; ?>">
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">Pangkat/Golongan</td>
          <td>:</td>
          <td colspan="2"> 
              <select id="pangkat" name="pangkat" class="form-control">
                <option value="0">-- Pilih Pangkat --</option>
              <?php
              foreach ($selectPangkat as $row_pangkat) {?>
                <option value="<?php echo $row_pangkat->kd_pangkat ?>" <?php if($KD_PANGKAT == $row_pangkat->kd_pangkat){ echo "selected"; } ?> ><?php echo $row_pangkat->nama_pangkat." - ".$row_pangkat->golongan; ?></option>
              <?php
              }
              ?>
              </select>
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">Jabatan</td>
          <td>:</td>
          <td colspan="2">
            <select id="jabatan" name="jabatan" class="form-control">
                <option value="0">-- Pilih Pangkat --</option>
              <?php
              foreach ($selectJabatan as $row_jabatan) {?>
                <option value="<?php echo $row_jabatan->kd_jabatan ?>" <?php if($KD_JABATAN == $row_jabatan->kd_jabatan){ echo "selected"; } ?> ><?php echo $row_jabatan->nama_jabatan; ?></option>
                  <?php
              }
              ?>
              </select>
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">Bidang</td>
          <td>:</td>
          <td colspan="2">
            <input type="text" name='bidang' id='bidang' class="form-control" value="<?php echo @$BIDANG; ?>">
          </td>
        </tr> 
        <tr>
          <td style="width: 120px;">
            
          </td>
          <td style="width: 150px;">
            <button type="submit" name="Update" id="Update" value="UpdateProfile" style="width: 150px;" class="btn btn-success">
              Ubah
            </button>
          </td>
          <td></td>
          <td>
            
          </td>
        </tr> 
      </form>
    </table>

    <hr>

    <!-- </section> -->
    <!-- /.content -->
<!--   </div> -->
  <!-- /.content-wrapper -->
  <script type="text/javascript">

    $('#tanggal_lahir').datepicker({
            dateFormat: 'yy-mm-dd'
    });

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