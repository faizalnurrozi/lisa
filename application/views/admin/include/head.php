<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Lisa V.1.0</title>

	<meta name="description" content="Common form elements and layouts" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/bootstrap.css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/font-awesome.css" />

	<!-- page specific plugin styles -->
	<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/jquery-ui.custom.css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/chosen.css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/datepicker.css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/bootstrap-timepicker.css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/daterangepicker.css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/bootstrap-datetimepicker.css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/colorpicker.css" />

	<!-- text fonts -->
	<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/ace-fonts.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo base_url('assets/') ?>css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/') ?>tippedJs/css/tipped/tipped.css" />

	<!--[if lte IE 9]>
		<link rel="stylesheet" href="../assets/css/ace-part2.css" class="ace-main-stylesheet" />
	<![endif]-->

	<!--[if lte IE 9]>
	  <link rel="stylesheet" href="../assets/css/ace-ie.css" />
	<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->
	<script type="text/javascript">
		window.jQuery || document.write("<script src='<?php echo base_url('assets/') ?>js/jquery.js'>"+"<"+"/script>");
	</script>
	<script src="<?php echo base_url('assets/') ?>js/ace-extra.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/autoNumeric.js"></script>

	<link rel="styleSheet" href="<?php echo base_url('assets/') ?>dtree/dtree.css" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url('assets/') ?>dtree/dtree.js"></script>
	<script src="<?php echo base_url('assets/') ?>js/jstree/dist/jstree.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/') ?>js/jstree/dist/themes/default/style.min.css" />
	<link rel="stylesheet" href="<?php echo base_url('assets/') ?>jOrgChart/css/jquery.jOrgChart.css"/>
	<script src="<?php echo base_url('assets/') ?>jOrgChart/jquery.jOrgChart.js"></script>


	<script src="<?php echo base_url('assets/js/highchart/js/highcharts.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/highchart/js/modules/exporting.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/highchart/js/modules/drilldown.js') ?>"></script>


	<script type="text/javascript" src="<?php echo base_url('assets/datepicker/bootstrap-datepicker.min.js') ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/datepicker/bootstrap-datepicker3.css') ?>"/>


	<script src="<?php echo base_url('assets/knob/jquery.knob.js'); ?>"></script>

	<script language="JavaScript">
	 $(function () {
	    $(".knob").knob({
	    	'readOnly': true,
	      draw: function () {

	        // "tron" case
	        if (this.$.data('skin') == 'tron') {

	          var a = this.angle(this.cv)
	              , sa = this.startAngle
	              , sat = this.startAngle
	              , ea                     
	              , eat = sat + a          
	              , r = true;

	          this.g.lineWidth = this.lineWidth;

	          this.o.cursor
	          && (sat = eat - 0.3)
	          && (eat = eat + 0.3);

	          if (this.o.displayPrevious) {
	            ea = this.startAngle + this.angle(this.value);
	            this.o.cursor
	            && (sa = ea - 0.3)
	            && (ea = ea + 0.3);
	            this.g.beginPath();
	            this.g.strokeStyle = this.previousColor;
	            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
	            this.g.stroke();
	          }

	          this.g.beginPath();
	          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
	          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
	          this.g.stroke();

	          this.g.lineWidth = 2;
	          this.g.beginPath();
	          this.g.strokeStyle = this.o.fgColor;
	          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
	          this.g.stroke();

	          return false;
	        }
	      }
	    });
	  });
	</script>

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
	<script src="../assets/js/html5shiv.js"></script>
	<script src="../assets/js/respond.js"></script>
	<![endif]-->
	        <script>
	            function confirmBox(){
	                
	                    var txt;
	                    var r = confirm("Anda yakin ingin menghapus data ini ? ");
	                    if (r == true) {
	                        return true;
	                    } else {
	                        return false;
	                    }
	            
	            }
	        </script>
	</head>