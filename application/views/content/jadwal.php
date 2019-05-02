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
              <h3 class="box-title">Seluruh Data Penjadwalan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="olahsupir" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>id_jadwal</th>
					<th>awal_narik</th>
					<th>akhir_narik</th>
					<th>nama_supir</th>
					<th>Edit</th>
					<th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  foreach ($data_jadwal as $key => $val) {
                    echo "
                    <tr>
                        <td>".$val['id_jadwal']."</td>
                        <td>".$val['awal_narik']."</td>
                        <td>".$val['akhir_narik']."</td>
                        <td>".$val['nama_supir']."</td>
                        <td><a class='btn' href='?id_edit=".$val['id_jadwal']."'>Edit</a></td>
                        <td><a class='btn' href='?id_del=".$val['id_jadwal']."'>Delete</a></td>
                    </tr>
                    ";
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>id_jadwal</th>
					<th>awal_narik</th>
					<th>akhir_narik</th>
					<th>nama_supir</th>
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
      				<h3 class="box-title">Edit Tugas</h3>
                      <small><?php echo (!empty($form_false)) ? $form_false : '' ?></small>
      			</div>
      			<?php echo form_open('olah_data/jadwal?id_edit='.$this->input->get('id_edit', TRUE), 'class="form-horizontal"') ?>
	              <div class="box-body">
	              	<?php 
					foreach ($edit as $data) {
					?>
					<div class="form-group" hidden>
	                  <label for="idJadwal" class="col-sm-2 control-label">idJadwal : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="id_jadwal" class="form-control" id="idJadwal" value="<?=$data['id_jadwal']?>" >
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="awal_narik" class="col-sm-2 control-label">awal_narik : </label>

	                  <div class="col-sm-10">
	                    <input type="time" name="awal_narik" class="form-control" id="awal_narik" value="<?=$data['awal_narik']?>">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="akhir_narik" class="col-sm-2 control-label">akhir_narik : </label>

	                  <div class="col-sm-10">
	                    <input type="time" name="akhir_narik" class="form-control" id="akhir_narik" value="<?=$data['akhir_narik']?>">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="supir" class="col-sm-2 control-label">supir (nip) : </label>

	                  <div class="col-sm-10">
	                    <input type="number" name="nip" class="form-control" id="supir" value="<?=$data['nip']?>">
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
      				<h3 class="box-title">Buat Tugas Baru</h3>
                    <small><?php echo (!empty($form_false)) ? $form_false : '' ?></small>
      			</div>
      			<?php echo form_open('olah_data/jadwal?newData', 'class="form-horizontal"') ?>
	              <div class="form-group">
	                  <label for="awal_narik" class="col-sm-2 control-label">awal_narik : </label>

	                  <div class="col-sm-10">
	                    <input type="time" name="awal_narik" class="form-control" id="awal_narik" value="<?php echo set_value('awal_narik') ?>" required="">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="akhir_narik" class="col-sm-2 control-label">akhir_narik : </label>

	                  <div class="col-sm-10">
	                    <input type="time" name="akhir_narik" class="form-control" id="akhir_narik" value="<?php echo set_value('akhir_narik') ?>" required="">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="supir" class="col-sm-2 control-label">supir (nip) : </label>

	                  <div class="col-sm-10">
	                    <input type="number" name="nip" class="form-control" id="supir" value="<?php echo set_value('nip') ?>" required="">
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
        window.location.href='".base_url('olah_data/jadwal')."'</script>";
    }
    ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->