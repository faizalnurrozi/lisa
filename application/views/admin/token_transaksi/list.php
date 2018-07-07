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
							<div class="table-header">Menampilkan Seluruh <?php echo $data['title']; ?></div>

							<div class="modal-footer no-margin-top">
								<a href="<?php echo base_url('admin/token_transaksi/add/') ?>">
									<button type="button" class="btn btn-sm btn-success pull-left" data-dismiss="modal"><i class="ace-icon fa fa-plus"></i>Tambah Data</button>
								</a>
							</div>

							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th class="no-sort" style="width: 6%;">No</th>
											<th>Tanggal</th>
											<th>Penambahan Daya (kWh)</th>
											<th>Biaya (Rp.)</th>
											<th class="no-sort" style="width: 18%;">&nbsp;</th>
										</tr>
									</thead> 
									<tbody>
										<?php
											$no = 0 ;
											foreach($data_list as $result){
												$no++;
										?>
										<tr>
											<td align="center"><?php echo $no ?></td>
											<td align="center"><?php echo date("d M Y", strtotime($result->tanggal)); ?></td>
											<td align="center"><?php echo number_format($result->penambahan_daya,2,',','.'); ?></td>
											<td align="right"><?php echo number_format($result->biaya,0,',','.'); ?></td>
											<td>
												<a href="<?php echo base_url('admin/token_transaksi/edit/'.$result->id_token_transaksi); ?>"><button class="btn btn-primary btn-sm btnEmptySaldo" style="margin-left:2px"><i class="fa fa-pencil-square" style="font-size: 14px;"></i>&nbsp;&nbsp;<span>Edit</span></button></a>
												<a href="<?php echo base_url('admin/token_transaksi/process_delete/'.$result->id_token_transaksi); ?>"><button class="btn btn-danger btn-sm"   style="margin-left:2px" onclick="return confirm('Anda yakin ingin menghapus data ini ? ')"><i class="fa fa-trash" style="font-size: 14px;"></i>&nbsp;&nbsp;<span>Hapus</span></button></a>
											</td>

										</tr>
										<?php 
											}
										?>   
									</tbody>
								</table> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>