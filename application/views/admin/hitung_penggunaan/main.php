<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('admin/dashboard') ?>">Beranda</a>
				</li>
				<li class="active"><?php echo $data['title']; ?></li>
			</ul>
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1><?php echo $data['title']; ?></h1>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-12">

							<div class="clearfix"><?php echo $this->session->flashdata('msgbox') ?></div>
							<div class="table-header">Tekan tombol <b>Proses Hitung</b> untuk melakukan perhitungan setiap perangkat di setiap ruangan anda.</div>

							<div class="modal-footer no-margin-top">
								<form action="<?php echo base_url('admin/hitung_penggunaan/process_hitung/') ?>" method="post">
									<input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />
									<button type="submit" class="btn btn-sm btn-danger pull-left" data-dismiss="modal" onclick="return confirm('Anda yakin ingin diproses ? ')"><i class="ace-icon fa fa-refresh"></i> Klik untuk proses hitung</button>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>