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
              <h3 class="box-title">Seluruh Data Juragan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="olahJuragan" class="table table-bordered table-striped">
                <thead>
                <tr>
                  	<th>id_juragan</th>
                    <th>nama_juragan</th>
                    <th>umur</th>
                    <th>jenis_kelamin</th>
                    <th>agama</th>
                    <th>kode_pos</th>
                    <th>alamat</th>
                    <th>Detail</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  foreach ($data_juragan as $key => $val) {
                    echo "
                    <tr>
                      <td>".$val['id_juragan']."</td>
                      <td>".$val['nama_juragan']."</td>
                      <td>".$val['umur']."</td>
                      <td>".$val['jenis_kelamin']."</td>
                      <td>".$val['agama']."</td>
                      <td>".$val['kode_pos']."</td>
                      <td>".$val['alamat']."</td>
                      <td><a class='btn' href='?id_detail=".$val['id_juragan']."'>Detail</a></td>
                      <td><a class='btn' href='?id_edit=".$val['id_juragan']."'>Edit</a></td>
                      <td><a class='btn' href='?id_del=".$val['id_juragan']."'>Delete</a></td>
                    </tr>
                    ";
                  }
                ?>
                </tbody>
                <tfoot>
                <tr>
                  	<th>id_juragan</th>
                    <th>nama_juragan</th>
                    <th>umur</th>
                    <th>jenis_kelamin</th>
                    <th>agama</th>
                    <th>kode_pos</th>
                    <th>alamat</th>
                    <th>Detail</th>
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
      if (!empty($detail)) {
      ?>
      <div class="row">
      	<div class="col-xs-12">
      		<div class="box box-info">
      			<div class="box-header with-border">
      				<h3 class="box-title">Detail Data Juragan</h3>
      			</div>
      			<form class="form-horizontal">
	              <div class="box-body">
	              	<?php 
					foreach ($detail as $data) {
					?>
					<div class="form-group">
					  <label for="fotoJuragan" class="col-sm-2 control-label">Foto : </label>
	                  
	                  <div class="col-sm-10">
	                    <img id="fotoJuragan" src="<?php echo base_url('assets/img/users/'.$data['foto_juragan']) ?>" style="width:200px;height:200px;">
	                  </div>
	                </div>
					<div class="form-group">
	                  <label for="idJuragan" class="col-sm-2 control-label">Id : </label>

	                  <div class="col-sm-10">
	                    <input type="text" class="form-control" id="idJuragan" value="<?=$data['id_juragan']?>" disabled>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="namaJuragan" class="col-sm-2 control-label">Nama : </label>

	                  <div class="col-sm-10">
	                    <input type="text" class="form-control" id="namaJuragan" value="<?=$data['nama_juragan']?>" disabled>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="umurJuragan" class="col-sm-2 control-label">Umur : </label>

	                  <div class="col-sm-10">
	                    <input type="text" class="form-control" id="umurJuragan" value="<?=$data['umur']?>" disabled>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="JenisKelamin" class="col-sm-2 control-label">Jenis Kelamin : </label>

	                  <div class="col-sm-10">
	                    <select name="jk" class="form-control" id="JenisKelamin" disabled>
	                    	<option><?=$data['jenis_kelamin']?></option>
	                    	<option>Laki-Laki</option>
	                    	<option>Perempuan</option>
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="agama" class="col-sm-2 control-label">Agama : </label>

	                  <div class="col-sm-10">
	                    <select class="form-control" id="agama" disabled>
	                    	<option><?=$data['agama']?></option>
	                    	<option>Islam</option>
	                    	<option>Kristen</option>
	                    	<option>Hindu</option>
	                    	<option>Budha</option>
	                    	<option>Konghucu</option>
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="kode_pos" class="col-sm-2 control-label">Kode Pos : </label>

	                  <div class="col-sm-10">
	                    <input type="text" class="form-control" id="kode_pos" value="<?=$data['kode_pos']?>" disabled>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="alamat" class="col-sm-2 control-label">Alamat : </label>

	                  <div class="col-sm-10">
	                    <input type="text" class="form-control" id="agama" value="<?=$data['alamat']?>" disabled>
	                  </div>
	                </div>
					<?php 
					}
					?>
	              </div>
	              <!-- /.box-body -->
	              <div class="box-footer">
	                <button type="submit" class="btn btn-default">Tutup</button>
	              </div>
	              <!-- /.box-footer -->
	            </form>
      		</div>
      	</div>
      </div>
      <?php 
  	  } else if(!empty($edit)) {
      ?>
      <div class="row">
      	<div class="col-xs-12">
      		<div class="box box-info">
      			<div class="box-header with-border">
      				<h3 class="box-title">Edit Data Juragan</h3>
							<small>
								<?php if (!empty($form_false))
								{
									echo $form_false;
								}
								else if (!empty($upload_error))
								{
									echo $upload_error;
								} ?>
							</small>
      			</div>
            <?php echo form_open_multipart('olah_data/juragan?id_edit='.$this->input->get('id_edit'), 'class="form-horizontal"') ?>
      			    <div class="box-body">
	              	<?php 
					foreach ($edit as $data) {
					?>
					<div class="form-group">
					  <label for="fotoJuragan" class="col-sm-2 control-label">Foto : </label>
	                  
	                  <div class="col-sm-10">
	                    <img id="fotoJuragan" src="<?php echo base_url('assets/img/users/'.$data['foto_juragan']) ?>" style="width:200px;height:200px;">
	                  </div>
	                </div>
	                <div class="form-group">
					  <label for="gantiFoto" class="col-sm-2 control-label">Ganti Foto (optional) : </label>
	                  
	                  <div class="col-sm-10">
	                    <input type="file" name="foto" id="gantiFoto">
	                  </div>
	                </div>
					<div class="form-group" hidden>
	                  <label for="idJuragan" class="col-sm-2 control-label">Id : </label>

	                  <div class="col-sm-10">
	                    <input type="number" name="id" class="form-control" id="idJuragan" value="<?=$data['id_juragan']?>" >
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="namaJuragan" class="col-sm-2 control-label">Nama : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="nama" class="form-control" id="namaJuragan" value="<?=$data['nama_juragan']?>" >
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="umurJuragan" class="col-sm-2 control-label">Umur : </label>

	                  <div class="col-sm-10">
	                    <input type="number" name="umur" class="form-control" id="umurJuragan" value="<?=$data['umur']?>" >
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="JenisKelamin" class="col-sm-2 control-label">Jenis Kelamin : </label>

	                  <div class="col-sm-10">
	                    <select name="jk" class="form-control" id="JenisKelamin">
	                    	<option><?=$data['jenis_kelamin']?></option>
	                    	<option>Laki-Laki</option>
	                    	<option>Perempuan</option>
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="agama" class="col-sm-2 control-label">Agama : </label>

	                  <div class="col-sm-10">
	                    <select class="form-control" id="agama" name="agama">
	                    	<option><?=$data['agama']?></option>
	                    	<option>Islam</option>
	                    	<option>Kristen</option>
	                    	<option>Hindu</option>
	                    	<option>Budha</option>
	                    	<option>Konghucu</option>
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="kode_pos" class="col-sm-2 control-label">Kode Post : </label>

	                  <div class="col-sm-10">
	                    <input type="number" name="kode_pos" class="form-control" id="kode_pos" value="<?=$data['kode_pos']?>" >
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="alamat" class="col-sm-2 control-label">Alamat : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="alamat" class="form-control" id="alamat" value="<?=$data['alamat']?>" >
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
      				<h3 class="box-title">Tambah Data Juragan</h3>
							<small>
								<?php if (!empty($form_false))
								{
									echo $form_false;
								}
								else if (!empty($upload_error))
								{
									echo $upload_error;
								} ?>
							</small>
      			</div>
            <?php echo form_open_multipart('olah_data/juragan?newData', 'class="form-horizontal"') ?>
      			   <div class="box-body">
	                <div class="form-group">
					  <label for="addFoto" class="col-sm-2 control-label">Foto Supir : </label>
	                  
	                  <div class="col-sm-10">
	                    <input type="file" name="foto" id="addFoto" required="" value="<?php echo set_value('foto') ?>">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="namaJuragan" class="col-sm-2 control-label">Nama : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="nama" class="form-control" id="namaJuragan" required="" value="<?php echo set_value('nama') ?>">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="umurJuragan" class="col-sm-2 control-label">Umur : </label>

	                  <div class="col-sm-10">
	                    <input type="number" name="umur" class="form-control" id="umurJuragan" required="" value="<?php echo set_value('umur') ?>">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="JenisKelamin" class="col-sm-2 control-label">Jenis Kelamin : </label>

	                  <div class="col-sm-10">
	                    <select name="jk" class="form-control" id="JenisKelamin" required="">
                        <option <?php echo set_select('jk','Laki-Laki') ?> >Laki-Laki</option>
                        <option <?php echo set_select('jk','Perempuan') ?> >Perempuan</option>
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="agama" class="col-sm-2 control-label">Agama : </label>

	                  <div class="col-sm-10">
	                    <select class="form-control" id="agama" name="agama" required="">
	                    	<option <?php echo set_select('agama', 'Islam') ?> >Islam</option>
	                    	<option <?php echo set_select('agama', 'Kristen') ?> >Kristen</option>
	                    	<option <?php echo set_select('agama', 'Hindu') ?> >Hindu</option>
	                    	<option <?php echo set_select('agama', 'Budha') ?>> Budha</option>
	                    	<option <?php echo set_select('agama', 'Konghucu') ?> >Konghucu</option>
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="kode_pos" class="col-sm-2 control-label">Kode Pos : </label>

	                  <div class="col-sm-10">
	                    <input type="number" name="kode_pos" class="form-control" id="kode_pos" required="" value="<?php echo set_value('kode_pos') ?>">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="alamat" class="col-sm-2 control-label">Alamat : </label>

	                  <div class="col-sm-10">
	                    <input type="text" name="alamat" class="form-control" id="alamat" required="" value="<?php echo set_value('alamat') ?>">
	                  </div>
	                </div>
	              </div>
	              <!-- /.box-body -->
	              <div class="box-footer">
	                <button type="submit" class="btn btn-default">Cancel</button>
	                <button type="submit" class="btn btn-info pull-right" name="tambah_data" value="tambah_data">Tambah</button>
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
				window.location.href='".base_url('olah_data/juragan')."'</script>";
			}
			?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->