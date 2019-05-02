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
                </tr>
                </tfoot>
              </table>
              <div class="col-sm-2">
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
      }
      ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->