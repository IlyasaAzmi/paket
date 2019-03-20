<div class="page-header">
	<h3>Dashboard</h3>
</div>

<div class="row">
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-folder-open"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							<?php echo $this->m_paket->get_data('paket')->num_rows(); ?>
						</div>
						<div>Jumlah Paket</div>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url().'admin/paket' ?>">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-user"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							<?php echo $this->m_paket->get_data('santri')->num_rows(); ?>
						</div>
						<div>Jumlah Santri</div>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url().'admin/santri' ?>">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-sort"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							<?php echo $this->m_paket->edit_data(array('status_paket'=>0),'paket')->num_rows(); ?>
						</div>
						<div>Paket Belum Diambil</div>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url().'admin/paket'; ?>">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-ok"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							<?php echo $this->m_paket->edit_data(array('status_paket'=>1),'paket')->num_rows(); ?>
						</div>
						<div>Paket Sudah Diambil</div>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url().'admin/paket' ?>">
				<div class="panel-footer">
					<span class="pull-left">View Details</span>
					<span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a>
		</div>
	</div>
</div>
<hr>
<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="glyphicon glyphicon-random arrow-right"></i> Paket</h3>
			</div>
			<div class="panel-body">
				<div class="list-group">
					<?php foreach($paket as $p){ ?>
					<a href="#" class="list-group-item">
						<span class="badge">
							<?php if($p->status_paket == 1){
								echo "Sudah Diambil";
							}else{
								echo "Belum Diambil";
							} ?>
						</span>
						<i class="glyphicon glyphicon-user"></i> <?php echo $p->nama_paket; ?>
					</a>
					<?php } ?>
				</div>
				<div class="text-right">
					<a href="<?php echo base_url().'admin/paket' ?>">Lihat Semua Paket <i class="glyphicon glyphicon-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="glyphicon glyphicon-user o"></i> Paket Terbaru</h3>
			</div>
			<div class="panel-body">
				<div class="list-group">
					<?php foreach($paket as $p){ ?>
					<a href="#" class="list-group-item">
						<span class="badge"><?php echo $p->penerima_paket ?></span>
						<i class="glyphicon glyphicon-user"></i> <?php echo $p->pengirim_paket; ?>
					</a>
					<?php } ?>
				</div>
				<div class="text-right">
					<a href="<?php echo base_url().'admin/paket' ?>">Lihat Semua Paket <i class="glyphicon glyphicon-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-5">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><i class="glyphicon glyphicon-sort"></i> Paket Terbaru</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Nama Penerima</th>
								<th>Nama Paket</th>
								<th>Tgl. Diterima</th>
								<th>Kategori Paket</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($paket as $p){
								?>
								<tr>
									<td><?php echo $p->nama_santri; ?></td>
									<td><?php echo $p->nama_paket; ?></td>
									<td><?php echo date('d/m/Y',strtotime($p->tanggal_diterima)); ?></td>
									<td><?php echo $p->nama_kategori; ?></td>

								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="text-right">
						<a href="<?php echo base_url().'admin/paket' ?>">Lihat Semua Paket <i class="glyphicon glyphicon-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
				<!-- /.row -->
