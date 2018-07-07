<div class="main-content">
                <div class="main-content-inner">
                    <!-- #section:basics/content.breadcrumbs -->
                    <div class="breadcrumbs" id="breadcrumbs">
                        <script type="text/javascript">
                            try {
                                ace.settings.check('breadcrumbs', 'fixed')
                            } catch (e) {
                            }
                        </script>

                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="#">Beranda</a>
                            </li>
                            <li class="active">Dashboard</li>
                        </ul><!-- /.breadcrumb -->

                        <!-- /section:basics/content.searchbox -->
                    </div>

                    <!-- /section:basics/content.breadcrumbs -->
                    <div class="page-content">

                        <!-- /section:settings.box -->
                        <div class="page-header">
                            <h1>
                                Dashboard
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                    overview &amp; stats
                                </small>
                            </h1> 
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="col-xs-12">
                              
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="alert alert-block alert-success">
                                    <button type="button" class="close" data-dismiss="alert">
                                        <i class="ace-icon fa fa-times"></i>
                                    </button>

                                   

                                   
                                    <strong >
                                        <h4>  <i class="ace-icon fa  fa-check-circle"></i> Terima kasih sudah login</h4>
                                        
                                    </strong>
                                     Selamat datang di CMS <?php echo $userLogin['project_name']; ?>.
                                </div>

                               

                                

                                <!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                        <div class="row">
                            <div class="col-sm-offset-3 col-sm-6 col-xs-12">
                                <div class="box box-solid">
                                    <div class="box-header">
                                        <h4 style="text-align: center;">Sisa Token (%)</h4>
                                    </div>
                                    <div class="col-xs-12 text-center">
                                        <input type="text" class="knob" value="<?php echo round($prosentase,2); ?>" data-skin="tron" data-thickness="0.2" data-width="220" data-height="220" data-fgColor="#f56954">
                                        <div class="knob-label">Estimasi Token Habis <b><?php echo $hari; ?></b> Hari, <b><?php echo round($jam,2); ?></b> Jam</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->
