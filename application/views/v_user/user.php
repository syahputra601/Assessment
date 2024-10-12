  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
      </h1>
      <?php echo @$error;?>
    </section>

    <!-- Main content -->
    <section class="content">
<?php
	if($permit['w']){
?>
    	<table class="table">
            <form id="form1" name="postform" method="post" action="<?php echo base_url('User'); ?>">
			<tr>
              <tr>
                <td>Nip</td>
                <td>:</td>
                <td><input type="number" name='nip' autofocus="autofocus" class="form-control" required=""></td>
              </tr> 
              <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" class="form-control" required=""></td>
              </tr> 
              <tr>
                <td>User Full Name</td>
                <td>:</td>
                <td><input type="text" name="full_name" class="form-control" required=""></td>
              </tr>
              <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="text" name="password" class="form-control" required=""></td>
              </tr> 
              <tr>
                <td>User</td>
                <td>:</td>
                <td>
                  <select id="user" name="user" class="user form-control">
                      <option value="0">-- Pilih User --</option>
                      <option value="1">Admin</option>
                      <option value="2">Pimpinan</option>
                      <option value="3">Pegawai</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                  <select id="status" name="status" class="statusa form-control">
                      <option value="0">-- Pilih Status --</option>
                      <option value="1">Aktif</option>
                      <option value="2">Tidak Aktif</option>
                      <option value="3">Di Blokir</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                	<button type="submit" name="Add_User" id="Add_User" value="AddUser" class="btn btn-success">
                		Add
                	</button>
                    <input type="reset" name="reset" value="Clear" class="btn btn-danger" />
                </td>
              </tr>
            </form>
          </table>
          <hr>
    <?php 
	}
	?>
          <h2><u>Data User</u></h2>
              <table class="table table-responsive table-striped" id="dtable">
				<thead>
                <tr>
                  <th>No</th>
                  <th>Nip</th>
                  <th>Username</th>
                  <th>User Full Name</th>
				  <th>User</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
        <?php
        $no = 0;
		foreach($list_user as $row){
          $no++;
          if($row->role_id == 1){
          	$user = "Admin";
          }elseif($row->role_id == 2){
          	$user = "Pimpinan";
          }elseif ($row->role_id == 3) {
          	$user = "Pegawai";
          }else{
          	$user = "Unknow";
          }
          if($row->active == 1){
          	$status = "Aktif";
          }elseif($row->active == 2){
          	$status = "Tidak Aktif";
          }elseif($row->active == 3){
          	$status = "Di Blokir";
          }else{
          	$status = "Unknow";
          }
		  echo 
          '<tr>
              <td>'.$no.'</td>
              <td>'.$row->nip.'</td>
        	  <td>'.$row->user_name.'</td>
        	  <td>'.$row->user_fullname.'</td>
        	  <td>'.$user.'</td>
        	  <td>'.$status.'</td>
              <td>';
    	echo '<a href="'.base_url('User/edit/'.$row->user_id).'" class="text text-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> ';
    	echo ' <a href="'.base_url('User/delete/'.$row->user_id).'" class="text text-danger" onclick="return confirm(\'Are you sure to delete this data?\');"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
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