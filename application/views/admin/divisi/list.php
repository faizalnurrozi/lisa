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
							<div class="table-header">Menampilkan Seluruh Data Level</div>

							<div class="modal-footer no-margin-top">
								<a href="<?php echo base_url('admin/divisi/add/') ?>">
									<button type="button" class="btn btn-sm btn-success pull-left" data-dismiss="modal"><i class="ace-icon fa fa-plus"></i>Tambah Data</button>
								</a>
							</div>

							<div>
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<tr>
											<th style="width: 6%;">No</th>
											<th>Nama Divisi</th>
											<th>Deskripsi</th>
											<th style="width: 18%;">&nbsp;</th>
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
											<td><?php echo $result->nama; ?></td>
											<td><?php echo $result->deskripsi; ?></td>
											<td>
												<a href="<?php echo base_url('admin/level/edit/'.$result->id_divisi) ?>"><button class="btn btn-primary btn-sm btnEmptySaldo"   style="margin-left:2px"><i class="fa fa-pencil-square" style="font-size: 14px;"></i>&nbsp;&nbsp;<span>Edit</span></button></a>
												<a href="<?php echo base_url('admin/level/doDelete/'.$result->id_divisi) ?>"><button class="btn btn-danger btn-sm"   style="margin-left:2px" onclick="return confirm('Anda yakin ingin menghapus data ini ? ')"><i class="fa fa-trash" style="font-size: 14px;"></i>&nbsp;&nbsp;<span>Hapus</span></button></a>
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