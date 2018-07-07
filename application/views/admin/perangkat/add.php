<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="<?php echo base_url('admin/dashboard'); ?>">Beranda</a>
				</li>
				<li>
					<a href="<?php echo base_url('admin/perangkat') ?>"><?php echo $data['title']; ?></a>
				</li>
				<li class="active">Form <?php echo $data['title']; ?></li>
			</ul>
		</div>

		<div class="page-content">
			<div class="page-header">
				<h1><?php echo $data['title']; ?><small><i class="ace-icon fa fa-angle-double-right"></i></small></h1>
			</div>

			<style type="text/css">
				.img-master{
					border: 4px double #CCC;
					width: 220px;
					padding: 5px;
					border-radius: 3px;
					position: absolute;
					top: 100px;
					right: 100px;
				}

				.img-master img{
					border: 1px solid #CCC;
				}
			</style>

			<?php
				$gambar = (file_exists(@$data_list[0]->gambar)) ? base_url($data_list[0]->gambar) : base_url('assets/images/default.png');
			?>

			<div class="img-master">
				<img src="<?php echo $gambar; ?>" width="200" />
			</div>

			<div class="row">
				<div class="col-xs-12">
					<?php
						if(@$edit){
							$action_form = base_url('admin/perangkat/process_edit/').$this->uri->segment(4);
						}else{
							$action_form = base_url('admin/perangkat/process_add');
						}
					?>
					<form class="form-horizontal" method="post" action="<?php echo $action_form; ?>" role="form" enctype="multipart/form-data"> 
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
							<label class="col-sm-3 control-label no-padding-right" for="nama">Nama Prangkat</label>
							<div class="col-sm-9">
								<input type="text" id="nama" name="nama" value="<?php echo @$data_list[0]->nama; ?>" placeholder="Ketik nama perangkat..." class="col-xs-10 col-sm-5" required autocomplete="off" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="id_perangkat_kategori">Kategori</label>
							<div class="col-sm-9">
								<select id="id_perangkat_kategori" name="id_perangkat_kategori" class="col-xs-10 col-sm-5" required>
									<option value="">-Pilih kategori-</option>
									<?php
										foreach($data_perangkat_kategori as $perangkat_kategori){
											echo "<option value='".$perangkat_kategori->id_perangkat_kategori."' "; if(@$data_list[0]->id_perangkat_kategori == $perangkat_kategori->id_perangkat_kategori) echo "selected"; echo ">".$perangkat_kategori->nama."</option>";
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="penggunaan_daya">Penggunaan Daya (Watt)</label>
							<div class="col-sm-9">
								<input type="text" id="penggunaan_daya" name="penggunaan_daya" value="<?php echo @$data_list[0]->penggunaan_daya; ?>" placeholder="Ketik penggunaan daya..." class="col-xs-10 col-sm-5" required autocomplete="off" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="gambar">Gambar</label>
							<div class="col-sm-9">
								<input type="file" id="gambar" name="gambar" class="col-xs-10 col-sm-5" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="status">Status</label>
							<div class="col-sm-9">
								<select id="status" name="status" class="col-xs-2 col-sm-2" required>
									<option value="JALAN">Jalan</option>
									<option value="BERHENTI" <?php if(@$data_list[0]->status == 'BERHENTI') echo "selected"; ?>>Berhenti</option>
								</select>
							</div>
						</div>

						<style type="text/css">
							.btn-circle{
								border-radius: 50%;
							}
						</style>

						<div class="row">
							<div class="col-xs-offset-3 col-xs-4">
								<table class="table table-striped table-bordered table-hover table-detail">
									<thead>
										<tr>
											<th>No</th>
											<th>Waktu Awal</th>
											<th>Waktu Akhir</th>
											<th width="1%">
												<button type="button" class="btn btn-success btn-circle btn-sm btn-create-row"><i class="fa fa-plus"></i></button>
											</th>
										</tr>
									</thead>

									<tbody>
										<?php
											if(@$edit){
												$no = 1;
												foreach($data_perangkat_detail as $result_perangkat_detail){
													echo "<tr class='row-detail' id='row$no'>";
													echo "	<td align='center' class='no'>$no.</td>";
													echo "	<td>";
													echo "		<input type='text' id='waktu_awal-".$no."' name='waktu_awal[]' autocomplete='off' style='text-align: center;' class='time-masked waktu-awal' placeholder='23:59' value='".$result_perangkat_detail->waktu_awal."' />";
													echo "	</td>";
													echo "	<td>";
													echo "		<input type='text' id='waktu_akhir-".$no."' name='waktu_akhir[]' autocomplete='off' style='text-align: center;' class='time-masked waktu-awal' placeholder='23:59' value='".$result_perangkat_detail->waktu_akhir."' />";
													echo "	</td>";
													echo "	<td>";
													echo "		<input type='hidden' name='id_perangkat_detail[]' value='".$result_perangkat_detail->id_perangkat_detail."' />";
													echo "		<button type='button' class='btn btn-danger btn-circle btn-sm btn-delete-row' data-target='".$no."'><i class='fa fa-minus'></i></button>";
													echo "	</td>";
													echo "</tr>";


													$no++;
												}
											}else{
										?>
										<tr class="row-detail" id="row1">
											<td align="center" class="no">1.</td>
											<td>
												<input type="text" id="waktu_awal-1" name="waktu_awal[]" autocomplete="off" style="text-align: center;" class="time-masked waktu-awal" placeholder="23:59" />
											</td>
											<td>
												<input type="text" id="waktu_akhir-1" name="waktu_akhir[]" autocomplete="off" style="text-align: center;" class="time-masked waktu-akhir" placeholder="23:59" />
											</td>
											<td>
												<button type="button" class="btn btn-danger btn-circle btn-sm btn-delete-row" data-target="1"><i class="fa fa-minus"></i></button>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>

						<script type="text/javascript">							
							$(function (){
								$('.time-masked').timeMask();
							});
							
							$(".table-detail").on('click', '.time-masked', function(){
								$('.time-masked').timeMask();
							});
							
							$(".table-detail").on('click', '.btn-create-row', function(){
								var newRowContent = "";
								var jumlah_row = $(".table-detail tbody tr").length;

								newRowContent += '<tr class="row-detail" id="row'+(jumlah_row+1)+'">';
								newRowContent += '	<td align="center" class="no">'+(jumlah_row+1)+'.</td>';
								newRowContent += '	<td>';
								newRowContent += '		<input type="text" id="waktu_awal-'+(jumlah_row+1)+'" name="waktu_awal[]" autocomplete="off" style="text-align: center;" class="time-masked waktu-awal" placeholder="23:59" />';
								newRowContent += '	</td>';
								newRowContent += '	<td>';
								newRowContent += '		<input type="text" id="waktu_akhir-'+(jumlah_row+1)+'" name="waktu_akhir[]" autocomplete="off" style="text-align: center;" class="time-masked waktu-akhir" placeholder="23:59" />';
								newRowContent += '	</td>';
								newRowContent += '	<td>';
								newRowContent += '		<button type="button" class="btn btn-danger btn-circle btn-sm btn-delete-row" data-target="'+(jumlah_row+1)+'"><i class="fa fa-minus"></i></button>';
								newRowContent += '	</td>';
								newRowContent += '</tr>';

								$(".table-detail tbody").append(newRowContent);
							});
							
							$(".table-detail").on('click', '.btn-delete-row', function(){
								var posisi = $(this).data('target');
								document.getElementById("row"+posisi+"").outerHTML="";

								var indexNew = 1;
								$('.row-detail').each(function(){
									$(this).attr('id', 'row'+indexNew);;
									$(this).find('.no').html((indexNew));
									$(this).find('.waktu-awal').attr('id', 'waktu_awal-'+indexNew);
									$(this).find('.waktu-akhir').attr('id', 'waktu_akhir-'+indexNew);
									$(this).find('.btn-delete-row').attr('data-target', indexNew);
									
									indexNew++;
								});
							});
						</script>

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