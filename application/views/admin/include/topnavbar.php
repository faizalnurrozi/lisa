<div id="navbar" class="navbar navbar-default">
	<script type="text/javascript">
		try{ace.settings.check('navbar' , 'fixed')}catch(e){}
	</script>

	<div class="navbar-container" id="navbar-container" >
		<div class="navbar-header pull-left">
			<a href="#" class="navbar-brand">
				<small>
					<?php echo $userLogin['project_name']; ?>
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="<?php echo base_url('assets/') ?>avatars/avatar2.png" alt="Jason's Photo" />
						<span class="user-info">
							<small>Hallo,</small>
							<?php echo $namaKaryawan; ?>
						</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>
					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="<?php echo base_url('login/logout') ?>">
								<i class="ace-icon fa fa-power-off"></i>
								Logout
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>