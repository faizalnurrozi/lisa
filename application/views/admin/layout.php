<!DOCTYPE html>
<html lang="en">
	<?php  $this->load->view('admin/include/head') ?>
	<body class="no-skin" id="body-saya">
		
		<?php  $this->load->view('admin/include/topnavbar',$userLogin) ?>

		<div class="main-container" id="main-container" >
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<?php $this->load->view('admin/include/sidebar_menu'); ?>

			<?php $this->load->view($v_content, @$data); ?>

			<?php $this->load->view('admin/include/footer'); ?>
		</div>

		<?php include 'include/scripts.php' ?>
	</body>
</html>
