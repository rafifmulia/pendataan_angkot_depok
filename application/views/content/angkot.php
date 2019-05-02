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
              <h3 class="box-title">Seluruh Data Angkot</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="olahsupir" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>kode_angkot</th>
					<th>total_angkot</th>
					<th>angkot_tersedia</th>
					<th>angkot_terpakai</th>
					<th>Pemilik</th>
					<th>Edit</th>
					<th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  foreach ($data_angkot as $key => $val) {
                    echo "
                    <tr>
                        <td>".$val['kode_angkot']."</td>
                        <td>".$val['total_angkot']."</td>
                        <td>".$val['angkot_tersedia']."</td>
                        <td>".$val['angkot_terpakai']."</td>
                        <td>".$val['nama_juragan']." (".$val['id_juragan'].")</td>
                        <td><a class='btn' href='?id_edit=".$val['kode_angkot']."'>Edit</a></td>
                        <td><a class='btn' href='?id_del=".$val['kode_angkot']."'>Delete</a></td>
                    </tr>
                    ";
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>kode_angkot</th>
					<th>total_angkot</th>
					<th>angkot_tersedia</th>
					<th>angkot_terpakai</th>
					<th>Pemilik</th>
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
      				<h3 class="box-title">Edit Data Angkot</h3>
							<small><?php echo (!empty($form_false)) ? $form_false : '' ?></small>
      			</div>
      			<?php echo form_open('olah_data/angkot?id_edit='.$this->input->get('id_edit', TRUE), 'class="form_horizontal"') ?>
	              <div class="box-body">
	              	<?php 
					foreach ($edit as $data) {
					?>
					<div class="form-group" hidden>
	                  <label for="KodeAngkot" class="col-sm-2 control-label">KodeAngkot : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="kode_angkot" class="form-control" id="KodeAngkot" value="<?=$data['kode_angkot']?>" >
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="ket_KodeAngkot" class="col-sm-2 control-label">KodeAngkot : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="ket_kode_angkot" class="form-control" id="ket_KodeAngkot" value="<?=$data['kode_angkot']?>" disabled>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="jumlahAngkot" class="col-sm-2 control-label">Jumlah Angkot : </label>

	                  <div class="col-sm-10">
	                    <input type="number" name="jumlah_angkot" class="form-control" id="jumlahAngkot" value="<?=$data['total_angkot']?>" >
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="Pemilik" class="col-sm-2 control-label">Id Juragan : </label>

	                  <div class="col-sm-10">
	                    <input type="number" name="pemilik" class="form-control" id="Pemilik" value="<?=$data['id_juragan']?>" >
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
      				<h3 class="box-title">Tambah Data Angkot</h3>
							<small><?php echo (!empty($form_false)) ? $form_false : '' ?></small>
      			</div>
                  <?php echo form_open('olah_data/angkot?newData', 'class="form_horizontal"') ?>
	              <div class="box-body">
                    <div class="form-group">
	                  <label for="kodeAngkot" class="col-sm-2 control-label">Kode Angkot : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="kode_angkot" class="form-control" id="kodeAngkot" value="<?php echo set_value('kode_angkot') ?>" required="">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="jumlahAngkot" class="col-sm-2 control-label">Jumlah Angkot : </label>

	                  <div class="col-sm-10">
	                    <input type="number" name="jumlah_angkot" class="form-control" id="jumlahAngkot" value="<?php echo set_value('jumlah_angkot') ?>" required="">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="Pemilik" class="col-sm-2 control-label">Pemilik (Id Juragan) : </label>

	                  <div class="col-sm-10">
	                    <input type="number" name="pemilik" class="form-control" id="Pemilik" value="<?php echo set_value('pemilik') ?>" required="">
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
				window.location.href='".base_url('olah_data/angkot')."'</script>";
			}
			?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->