<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Halaman Administrator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?=base_URL()?>aset/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="<?=base_URL()?>aset/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="<?=base_URL()?>aset/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_URL()?>aset/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_URL()?>aset/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_URL()?>aset/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=base_URL()?>aset/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body style="background: #fff">

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <b class="brand" href="#">Halaman Administrator</b>
          <div class="nav-collapse collapse">
            <div class="btn-group navbar-form pull-right" style="margin-right: 10px">
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
				<b><?=$this->session->userdata('user')?></b>
				<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li class="nav-header">Administrator Menu</li>
			  
			<?php
				$l_val	= array("", "wil_pus","wil_bkb","wil_bkr","wil_bkl","wil_uppks");
				$l_view	= array("Beranda", "Wilayah PUS", "Wilayah BKB", "Wilayah BKR", "Wilayah BKL", "Wilayah UPPKS");

				for ($i = 0; $i < sizeof($l_val); $i++) {
					if ($this->uri->segment(2) == $l_val[$i]) {
						echo "<li class='active'><a href='".base_URL()."index.php/manage/".$l_val[$i]."'>".$l_view[$i]."</a></li>";
					} else {
						echo "<li><a href='".base_URL()."index.php/manage/".$l_val[$i]."'>".$l_view[$i]."</a></li>";
					}
				}

			?>
              <li><a href="<?=base_URL()?>index.php/tampil" onclick="return confirm('Anda yakin akan LOGOUT dari Halaman Administrator?')"><b>Logout</b></a></li>
				</ul>
			</div>

          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
		<?php
			if($page == null){
				echo $output;
			} else {
				$this->load->view('manage/'.$page);
			}
		?>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        Loaded in : {elapsed_time}. &copy; <a href="http://www.jogjakota.go.id/" target="_blank">jogjakota.go.id</a> @ 2015
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="<?=base_URL()?>aset/js/jquery.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-transition.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-alert.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-modal.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-dropdown.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-scrollspy.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-tab.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-tooltip.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-popover.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-button.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-collapse.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-carousel.js"></script>
    <script src="<?=base_URL()?>aset/js/bootstrap-typeahead.js"></script>
    <script src="<?=base_URL()?>aset/editor/nicEdit.js"></script>
	<script type="text/javascript">
	jQuery(document).ready(function(){
		$('.fancybox').fancybox();
	});

	bkLib.onDomLoaded(function() { nicEditors.allTextAreas({fullPanel : true}) });
	</script>

  </body>
</html>
