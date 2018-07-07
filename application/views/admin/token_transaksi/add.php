<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('admin/dashboard'); ?>">Beranda</a>
				</li>
				<li>
					<a href="<?php echo base_url('admin/token_transaksi') ?>"><?php echo $data['title']; ?></a>
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
							$action_form = base_url('admin/token_transaksi/process_edit/').$this->uri->segment(4);
						}else{
							$action_form = base_url('admin/token_transaksi/process_add');
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
							<label class="col-sm-3 control-label no-padding-right" for="biaya_admin">Biaya Admin</label>
							<div class="col-sm-2">
								<div class="input-group col-xs-12">
									<span class="input-group-addon">&nbsp;Rp.&nbsp;</span>
									<input type="text" name="biaya_admin" id="biaya_admin" class="form-control input-sm" value="<?php if(@$data_list[0]->biaya_admin != '') echo @$data_list[0]->biaya_admin; else echo $perhitungan_dasar['biaya_admin']; ?>" readonly style="text-align: right;" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="pjj">Pajak Penerangan Jalan (PJJ)</label>
							<div class="col-sm-1">
								<div class="input-group col-xs-12">
									<input type="text" name="pjj" id="pjj" class="form-control input-sm" value="<?php if(@$data_list[0]->pjj != '') echo @$data_list[0]->pjj; else echo $perhitungan_dasar['pjj']; ?>" readonly style="text-align: center;" />
									<span class="input-group-addon">%</span>
								</div>
							</div>
						</div>
						<hr>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="tanggal">Tanggal</label>
							<div class="col-sm-2">
								<div class="input-group col-xs-12">
									<input type="text" name="tanggal" id="tanggal" class="form-control input-sm" value="<?php if(@$data_list[0]->tanggal != '') echo @$data_list[0]->tanggal; else echo date("Y-m-d"); ?>" readonly />
									<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="biaya">Biaya</label>
							<div class="col-sm-5">
								<div class="input-group col-xs-12">
									<span class="input-group-addon">&nbsp;Rp.&nbsp;</span>
									<input type="text" id="biaya" name="biaya" value="<?php echo @$data_list[0]->biaya; ?>" autocomplete="off" placeholder="Biaya..." class="col-xs-10 col-sm-5" required style="text-align: right;" onkeypress="return onlyNumbers(event); " />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="biaya_materai">Biaya Materai</label>
							<div class="col-sm-5">
								<div class="input-group col-xs-12">
									<span class="input-group-addon">&nbsp;Rp.&nbsp;</span>
									<input type="text" id="biaya_materai" name="biaya_materai" value="<?php echo (@$data_list[0]->biaya_materai != '') ? @$data_list[0]->biaya_materai : 0; ?>" autocomplete="off" class="col-xs-10 col-sm-5" required style="text-align: right;" readonly />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="nilai_pjj">Nilai PJJ</label>
							<div class="col-sm-5">
								<div class="input-group col-xs-12">
									<span class="input-group-addon">&nbsp;Rp.&nbsp;</span>
									<input type="text" id="nilai_pjj" name="nilai_pjj" value="<?php echo (@$data_list[0]->nilai_pjj != '') ? @$data_list[0]->nilai_pjj : 0; ?>" autocomplete="off" class="col-xs-10 col-sm-5" required style="text-align: right;" readonly />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="nilai_token">Nilai Token</label>
							<div class="col-sm-5">
								<div class="input-group col-xs-12">
									<span class="input-group-addon">&nbsp;Rp.&nbsp;</span>
									<input type="text" id="nilai_token" name="nilai_token" value="<?php echo (@$data_list[0]->nilai_token != '') ? @$data_list[0]->nilai_token : 0; ?>" autocomplete="off" class="col-xs-10 col-sm-5" required style="text-align: right;" readonly />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="penambahan_daya">Penambahan Daya</label>
							<div class="col-sm-5">
								<div class="input-group col-xs-12">
									<span class="input-group-addon">kWh</span>
									<input type="text" id="penambahan_daya" name="penambahan_daya" value="<?php echo (@$data_list[0]->penambahan_daya != '') ? @$data_list[0]->penambahan_daya : 0; ?>" autocomplete="off" placeholder="Penambahan daya..." class="col-xs-10 col-sm-5" required style="text-align: right;" readonly />
								</div>
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

<script language="JavaScript">
	$(function () {
		var options={
			format: 'yyyy-mm-dd',
			todayHighlight: true,
			autoclose: true,
		};
		$('#tanggal').datepicker(options);

		$('#biaya').keyup(function(){
			var biaya 		= $(this).val();
			var biaya_admin = $('#biaya_admin').val();
			var pjj 		= $('#pjj').val();
			var biaya_materai;

			biaya_materai = 0;
			if(biaya > 1000000){
				biaya_materai = 6000;
			}else if(biaya >= 250000 && biaya <= 1000000){
				biaya_materai = 3000;
			}

			var nilai_pjj = ((biaya*10/100)/(1+(pjj/100))).toFixed(2);
			var nilai_token = (biaya-nilai_pjj).toFixed(2);

			var kwh = (nilai_token/1467.28).toFixed(2);

			$('#biaya_materai').val(biaya_materai);
			$('#nilai_pjj').val(nilai_pjj);
			$('#nilai_token').val(nilai_token);
			$('#penambahan_daya').val(kwh);

		});
	});

	function onlyNumbers(evt) { 
		var charCode = (evt.which) ? evt.which : event.keyCode; 
		if (charCode > 31 && (charCode < 48 || charCode > 57 && charCode != 189)) 
			return false; 
		return true; 
	}
</script>