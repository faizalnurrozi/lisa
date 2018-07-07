<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('admin/dashboard'); ?>">Beranda</a>
				</li>
				<li>
					<a href="<?php echo base_url('admin/perangkat_kategori') ?>"><?php echo $data['title']; ?></a>
				</li>
				<li class="active">Form <?php echo $data['title']; ?></li>
			</ul>
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1><?php echo $data['title']; ?><small><i class="ace-icon fa fa-angle-double-right"></i></small></h1>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php
						if(@$edit){
							$action_form = base_url('admin/perangkat_kategori/process_edit/').$this->uri->segment(4);
						}else{
							$action_form = base_url('admin/perangkat_kategori/process_add');
						}
					?>
					<form class="form-horizontal" method="post" action="<?php echo $action_form; ?>" role="form"> 
						<input type="hidden" name="<?php echo $csrf['name']; ?>" value="<?php echo $csrf['hash']; ?>" />
						<?php 
							$dataOld = $this->session->flashdata('oldPost'); 
							echo $this->session->flashdata('msgbox');
						?>
						<div class="form-group">        
							<div class="col-sm-2" style="border-bottom: 2px solid #6EBACC;">
								Harap isi isian di bawah ini:
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Kategori</label>
							<div class="col-sm-9">
								<input type="text" id="form-field-1" name="nama" value="<?php echo @$data_list[0]->nama; ?>" placeholder="ketik kategori..." class="col-xs-10 col-sm-5" required />
							</div>
						</div>

						<div class="clearfix form-actions">
							<div class="col-md-offset-1 col-md-10">
								<button class="btn btn-info" type="submit"><i class="ace-icon fa fa-check bigger-110"></i>
								Simpan</button>

								<button class="btn" type="reset"><i class="ace-icon fa fa-undo bigger-110"></i>
								Reset</button>
							</div>
						</div>
						<div class="hr hr-24"></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>