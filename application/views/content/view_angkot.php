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

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->