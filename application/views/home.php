<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script>
var j = jQuery.noConflict();
j(document).ready(function () {
  Highcharts.setOptions({
   colors: ['#50B432', '#ED561B', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
  });



});
</script>

<?php
// print_r($this->session);
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     <!--
      <h1>
       Grafik Keadaan Prakom Kemhan
      </h1>
      -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div id="rekap_tingkat" style="width:100%;float:left;padding-left:1%;padding-right:1%;"></div>  
    <div class="clearfix"></div>
<?php if ($this->session->role == "1"):?>
    <div class="container">
        <div class="row">
            <h2>Jumlah Angka Kredit Kumulatiif minimal untuk pengangkatan dan kenaikan Jabatan/Pangkat :<h2>
            <ol>
                <li>
                    <div class="alert alert-success">
                        <strong>300</strong> Points.
                    </div>
                </li>
                
            </ol>
        </div>
        <hr>
         <div class="row">
            <h2>Daftar Pegawai Naik Pangkat Tahun Ini<h2>
            <ol>
                <li>
                    <div class="alert alert-success">
                        <strong>Success!</strong> Indicates a successful or positive action.
                    </div>
                </li>
                <li>
                    <div class="alert alert-success">
                        <strong>Success!</strong> Indicates a successful or positive action2.
                    </div>
                </li>
            </ol>
        </div>
        <hr>
        <div class="row">
            <h2>Daftar Pegawai Pensiun Tahun Ini<h2>
            <ol>
                <?php
                foreach($res->result() as $item):
                $biday = new DateTime($item->tgl_lahir);
                $today = new DateTime();
                $diff = $today->diff($biday);
                if($diff->y >= 50)
                {
                    ?>
                    <li>
                    <div class="alert alert-warning">
                        <strong><?php echo $item->nama;?></strong> Akan Memasuki Pensiun Tahun ini.
                    </div>
                <?php
                }
                endforeach;
                ?>
                
            </ol>
        </div>
        <hr>
    </div>
<?php endif;?>


<?php if ($this->session->role == "3" OR $this->session->role == "2")://PEGAWAI OR PIMPINAN?>
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
            <p><?php echo @$NAMA_LENGKAP; ?></p>
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">NIP</td>
          <td>:</td>
          <td colspan="2">
            <p><?php echo @$NIP; ?></p>
          </td>
        </tr>  
        <tr>
          <td style="width: 150px;" rowspan="1">Tanggal Lahir</td>
          <td>:</td>
          <td colspan="2">
            <p><?php echo @$TANGGAL_LAHIR; ?></p>
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">No Telepon</td>
          <td>:</td>
          <td colspan="2">
            <?php
            if($NO_TELEPON != ""){
            ?>
            <p><?php echo @$NO_TELEPON; ?></p>
            <?php
            }else{
            ?>
            <p>-</p>
            <?php
            }
            ?>
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">Alamat</td>
          <td>:</td>
          <td colspan="2">
            <?php
            if($ALAMAT != ""){
            ?>
            <p><?php echo @$ALAMAT; ?></p>
            <?php
            }else{
            ?>
            <p>-</p>
            <?php
            }
            ?>
            <!-- <textarea style="resize: none; height: 120px;" name="alamat" id="alamat" class="form-control" required=""><?php echo @$ALAMAT; ?></textarea> -->
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">Jenis Kelamin</td>
          <td>:</td>
          <td colspan="2">
            <?php
            if($GENDER == "M"){
            ?>
            <p>Laki-Laki</p>
            <?php
            }elseif($GENDER == "F"){
            ?>
            <p>Perempuan</p>
            <?php
            }else{
            ?>
            <p>-</p>
            <?php
            }
            ?>
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">Email</td>
          <td>:</td>
          <td colspan="2">
            <?php
            if($EMAIL != ""){
            ?>
            <p><?php echo @$EMAIL; ?></p>
            <?php
            }else{
            ?>
            <p>-</p>
            <?php
            }
            ?>
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">Pangkat/Golongan</td>
          <td>:</td>
          <td colspan="2"> 
            <?php
            $getPangkat = "SELECT nama_pangkat FROM pangkat WHERE kd_pangkat = '" . $KD_PANGKAT . "' ";
            $query = $this->db->query($getPangkat);
            $getPangkat = $query->result();

            foreach ($getPangkat as $valuePangkat) {
                $namaPangkat = $valuePangkat->nama_pangkat;
            }
            ?>
            <p><?php echo @$namaPangkat; ?></p>
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">Jabatan</td>
          <td>:</td>
          <td colspan="2">
            <?php
            $getJabatan = "SELECT nama_jabatan FROM jabatan WHERE kd_jabatan = '" . $KD_JABATAN . "' ";
            $query = $this->db->query($getJabatan);
            $getJabatan = $query->result();

            foreach ($getJabatan as $valueJabatan) {
                $namaJabatan = $valueJabatan->nama_jabatan;
            }
            ?>
            <p><?php echo @$namaJabatan; ?></p>
          </td>
        </tr> 
        <tr>
          <td style="width: 150px;" rowspan="1">Bidang</td>
          <td>:</td>
          <td colspan="2">
            <?php
            if($BIDANG != ""){
            ?>
            <p><?php echo @$BIDANG; ?></p>
            <?php
            }else{
            ?>
            <p>-</p>
            <?php
            }
            ?>
          </td>
        </tr> 
        <tr>
          <td style="width: 120px;">
            
          </td>
          <td style="width: 150px;">

          </td>
          <td></td>
          <td>
            
          </td>
        </tr> 
    </table>

    <hr>

    <!-- </section> -->
    <!-- /.content -->
<!--   </div> -->
  <!-- /.content-wrapper -->

<?php endif;?>

<!-- </section> -->
    <!-- /.content -->
<!--   </div> -->
  <!-- /.content-wrapper -->

<script type="text/javascript">

    $('#tanggal_lahir').datepicker({
            dateFormat: 'yy-mm-dd'
    });

</script>