 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <?php echo $title ?>
        <small><?php echo $datapath ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Seluruh Data Perutean</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="olahsupir" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>id_rute</th>
                    <th>kode_angkot</th>
					<th>rute</th>
					<th>Edit</th>
					<th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  foreach ($data_rute as $key => $val) {
                    echo "
                    <tr>
                        <td>".$val['id_rute']."</td>
                        <td>".$val['kode_angkot']."</td>
                        <td>".$val['rute']."</td>
                        <td><a class='btn' href='?id_edit=".$val['id_rute']."'>Edit</a></td>
                        <td><a class='btn' href='?id_del=".$val['id_rute']."'>Delete</a></td>
                    </tr>
                    ";
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>id_rute</th>
                    <th>kode_angkot</th>
					<th>rute</th>
					<th>Edit</th>
					<th>Delete</th>
                </tr>
                </tfoot>
              </table>
              <div class="col-sm-2">
              	<form method="get">
              		<button type="submit" name="newData" class="btn btn-block btn-primary">Tambah Data</button>
              	</form>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <?php 
      if(!empty($edit)) {
      ?>
      <div class="row">
      	<div class="col-xs-12">
      		<div class="box box-info">
      			<div class="box-header with-border">
      				<h3 class="box-title">Edit Rute</h3>
							<small><?php echo (!empty($form_false)) ? $form_false : '' ?></small>
      			</div>
      			<?php echo form_open('olah_data/rute?id_edit='.$this->input->get('id_edit', TRUE), 'class="form-horizontal"') ?>
	              <div class="box-body">
	              	<?php 
					foreach ($edit as $data) {
					?>
					<div class="form-group" hidden>
	                  <label for="idRute" class="col-sm-2 control-label">idRute : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="id_rute" class="form-control" id="idRute" value="<?=$data['id_rute']?>" >
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="ket_idRute" class="col-sm-2 control-label">id rute : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="ket_id_rute" class="form-control" id="ket_idRute" value="<?=$data['id_rute']?>" disabled>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="rute" class="col-sm-2 control-label">rute : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="rute" class="form-control" id="rute" value="<?=$data['rute']?>" required="">
	                  </div>
	                </div>
					<?php 
					}
					?>
	              </div>
	              <!-- /.box-body -->
	              <div class="box-footer">
	                <button type="submit" class="btn btn-default">Cancel</button>
	                <button type="submit" class="btn btn-info pull-right" name="edit_data">Edit</button>
	              </div>
	              <!-- /.box-footer -->
	            </form>
      		</div>
      	</div>
      </div>
      <?php 
  	  } else if(isset($_GET['newData'])) {
      ?>
      <div class="row">
      	<div class="col-xs-12">
      		<div class="box box-info">
      			<div class="box-header with-border">
      				<h3 class="box-title">Buat Rute Baru</h3>
							<small><?php echo (!empty($form_false)) ? $form_false : '' ?></small>
      			</div>
                  <?php echo form_open('olah_data/rute?newData', 'class="form-horizontal"') ?>
	              <div class="box-body">
	              	<div class="form-group">
	                  <label for="KodeAngkot" class="col-sm-2 control-label">KodeAngkot : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="kode_angkot" class="form-control" id="KodeAngkot" value="<?php echo set_value('kode_angkot') ?>">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="Rute" class="col-sm-2 control-label">Rute : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="rute" class="form-control" id="Rute" value="<?php echo set_value('rute') ?>">
	                  </div>
	                </div>
	              </div>
	              <!-- /.box-body -->
	              <div class="box-footer">
	                <button type="submit" class="btn btn-default">Cancel</button>
	                <button type="submit" class="btn btn-info pull-right" name="tambah_data">Tambah</button>
	              </div>
	              <!-- /.box-footer -->
	            </form>
      		</div>
      	</div>
      </div>
      <?php 
      }
      ?>

			<?php
			if (!empty($mistake))
			{
				echo "<script>alert('".$mistake."')</script>";
			}
			else if (!empty($success))
			{
				echo "<script>alert('".$success."');
				window.location.href='".base_url('olah_data/rute')."'</script>";
			}
			?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->