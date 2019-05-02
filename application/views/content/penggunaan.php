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
                    <th>id_penggunaan</th>
					<th>kode_angkot</th>
					<th>nama_supir</th>
					<th>Edit</th>
					<th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  foreach ($data_penggunaan as $key => $val) {
                    echo "
                    <tr>
                        <td>".$val['id_penggunaan']."</td>
                        <td>".$val['kode_angkot']."</td>
                        <td>".$val['nama_supir']."</td>
                        <td><a class='btn' href='?id_edit=".$val['id_penggunaan']."'>Edit</a></td>
                        <td><a class='btn' href='?id_del=".$val['id_penggunaan']."'>Delete</a></td>
                    </tr>
                    ";
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                    <th>id_penggunaan</th>
					<th>kode_angkot</th>
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
      				<h3 class="box-title">Edit Data</h3>
                      <small><?php echo (!empty($form_false)) ? $form_false : '' ?></small>
      			</div>
      			<?php echo form_open('olah_data/penggunaan?id_edit='.$this->input->get('id_edit', TRUE), 'class="form-horizontal"') ?>
	              <div class="box-body">
	              	<?php 
					foreach ($edit as $data) {
					?>
					<div class="form-group" hidden>
	                  <label for="valid_idPenggunaan" class="col-sm-2 control-label">valid_idPenggunaan : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="id_penggunaan" class="form-control" id="valid_idPenggunaan" value="<?=$data['id_penggunaan']?>" >
	                  </div>
	                </div>
	                <div class="form-group" hidden>
	                  <label for="kodeAngkot" class="col-sm-2 control-label">Kode Angkot : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="kode_angkot" class="form-control" id="kodeAngkot" value="<?=$data['kode_angkot']?>">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="kodeAngkot" class="col-sm-2 control-label">Kode Angkot : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="ket_kode_angkot" class="form-control" id="kodeAngkot" value="<?=$data['kode_angkot']?>" disabled>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="Supir" class="col-sm-2 control-label">Supir (nip) : </label>

	                  <div class="col-sm-10">
	                    <input type="number" name="nip" class="form-control" id="Supir" value="<?=$data['nip']?>" >
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
      				<h3 class="box-title">Tambah Data</h3>
                    <small><?php echo (!empty($form_false)) ? $form_false : '' ?></small>
      			</div>
      			<?php echo form_open('olah_data/penggunaan?newData', 'class="form-horizontal"') ?>
	              <div class="box-body">
	              	<div class="form-group">
	                  <label for="KodeAngkot" class="col-sm-2 control-label">KodeAngkot : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="kode_angkot" class="form-control" id="KodeAngkot" value="<?php echo set_value('kode_angkot') ?>" required="">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="Supir" class="col-sm-2 control-label">Supir : </label>

	                  <div class="col-sm-10">
	                    <input type="number" name="nip" class="form-control" id="Supir" value="<?php echo set_value('nip') ?>" required="">
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
        window.location.href='".base_url('olah_data/penggunaan')."'</script>";
    }
    ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->