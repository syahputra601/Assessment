  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit User
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

          
<?php
foreach($res as $r){
?>			
		<a href="<?php echo base_url('User'); ?>" class="btn btn-primary">Back<i class="glyphicon glyphicon-arrow-left"></i></a>
          <table class="table">
            <form id="form1" name="postform" method="post" action="<?php echo base_url('User'); ?>">
              <input type="hidden" name="idu" value="<?php echo $r->user_id; ?>">
              <input type="hidden" name="nipu" value="<?php echo $r->nip; ?>">
               <tr>
                <td>User Id</td>
                <td>:</td>
                <td><input type="text" name="id" class="form-control" value="<?php echo $r->user_id ?>" disabled="disabled"></td>
              </tr>
              <tr>
                <td>Nip</td>
                <td>:</td>
                <td><input type="text" name="nip" class="form-control" value="<?php echo $r->nip ?>" disabled="disabled"></td>
              </tr>
              <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" class="form-control" value="<?php echo $r->user_name ?>"></td>
              </tr>
 			  <tr>
                <td>Full Name</td>
                <td>:</td>
                <td><input type="text" name="full_name" class="form-control" value="<?php echo $r->user_fullname ?>"></td>
              </tr>
              <tr>
                <td>New Password</td>
                <td>:</td>
                <td>
                	<input type="text" name="new_password" class="form-control" value="">
                </td>
              </tr>
              <tr>
                <td>User</td>
                <td>:</td>
                <td>
                  <select id="user" name="user" class="form-control">
                      <option value="">-- Pilih User --</option>
                      <option value="1" <?php if($r->role_id == "1"){ echo "selected"; } ?>>Admin</option>
                      <option value="2" <?php if($r->role_id == "2"){ echo "selected"; } ?>>Pegawai</option>
                      <option value="3" <?php if($r->role_id == "3"){ echo "selected"; } ?>>Pimpinan</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td>Status</td>
                <td>:</td>
                <td>
                  <select id="status" name="status" class="form-control">
                      <option value="">-- Pilih Status --</option>
                      <option value="1" <?php if($r->active == "1"){ echo "selected"; } ?>>Aktif</option>
                      <option value="2" <?php if($r->active == "2"){ echo "selected"; } ?>>Tidak Aktif</option>
                      <option value="3" <?php if($r->active == "3"){ echo "selected"; } ?>>Di Blokir</option>
                  </select>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                	<button type="submit" name="Update_User" id="Update_User" value="UpdateUser" class="btn btn-success">
                		Update
                	</button>
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

</script>