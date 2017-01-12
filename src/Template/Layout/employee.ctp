<!DOCTYPE html>
<html>
<head>
	 <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>AdminLTE 2 | Starter</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <!-- Bootstrap 3.3.6 -->
      <?= $this->Html->css('admin/bootstrap/css/bootstrap.min.css') ?>
	  <!-- Font Awesome -->
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	  <!-- Ionicons -->
	  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"> -->
	  <?= $this->Html->css('admin/ionicons.min.css') ?>
	  <!-- Theme style -->
	  <?= $this->Html->css('admin/dist/css/AdminLTE.min.css') ?>
	  <?= $this->Html->css('admin/dist/css/skins/skin-blue.min.css') ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
		<!-- Main Header -->
		<header class="main-header">

			    <!-- Logo -->
			    <a href="index2.html" class="logo">
			      <!-- mini logo for sidebar mini 50x50 pixels -->
			      <span class="logo-mini"><?php echo $this->Html->image('ws_crop_smallest.png', ['alt' => 'WORK STUDIO' , 'class' => 'c-logo']); ?></span>
			      <!-- logo for regular state and mobile devices -->
			      <span class="logo-lg"><?php echo $this->Html->image('ws_small.png', ['alt' => 'WORK STUDIO' , 'class' => 'b-logo']); ?></span>
			    </a>

			    <!-- Header Navbar -->
			    <nav class="navbar navbar-static-top" role="navigation">
			      <!-- Sidebar toggle button-->
			      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			        <span class="sr-only">Toggle navigation</span>
			      </a>
			      <!-- Navbar Right Menu -->
			      <div class="navbar-custom-menu">
			        <ul class="nav navbar-nav">
			          <!-- Messages: style can be found in dropdown.less-->
			          <li class="dropdown messages-menu">
			            <!-- Menu toggle button -->
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			              <i class="fa fa-envelope-o"></i>
			              <span class="label label-success">4</span>
			            </a>
			            <ul class="dropdown-menu">
			              <li class="header">You have 4 messages</li>
			              <li>
			                <!-- inner menu: contains the messages -->
			                <ul class="menu">
			                  <li><!-- start message -->
			                    <a href="#">
			                      <div class="pull-left">
			                        <!-- User Image -->
			                        <?php echo '<img src="'.$this->request->webroot.'/upload/avatar/'.$employeeinfo['image_url'].'" class="img-circle">' ?>
			                      </div>
			                      <!-- Message title and timestamp -->
			                      <h4>
			                        Support Team
			                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
			                      </h4>
			                      <!-- The message -->
			                      <p>Why not buy a new awesome theme?</p>
			                    </a>
			                  </li>
			                  <!-- end message -->
			                </ul>
			                <!-- /.menu -->
			              </li>
			              <li class="footer"><a href="#">See All Messages</a></li>
			            </ul>
			          </li>
			          <!-- /.messages-menu -->

			          <!-- Notifications Menu -->
			          <li class="dropdown notifications-menu">
			            <!-- Menu toggle button -->
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			              <i class="fa fa-bell-o"></i>
			              <span class="label label-warning">10</span>
			            </a>
			            <ul class="dropdown-menu">
			              <li class="header">You have 10 notifications</li>
			              <li>
			                <!-- Inner Menu: contains the notifications -->
			                <ul class="menu">
			                  <li><!-- start notification -->
			                    <a href="#">
			                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
			                    </a>
			                  </li>
			                  <!-- end notification -->
			                </ul>
			              </li>
			              <li class="footer"><a href="#">View all</a></li>
			            </ul>
			          </li>
			          <!-- Tasks Menu -->
			          <li class="dropdown tasks-menu">
			            <!-- Menu Toggle Button -->
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			              <i class="fa fa-flag-o"></i>
			              <span class="label label-danger">9</span>
			            </a>
			            <ul class="dropdown-menu">
			              <li class="header">You have 9 tasks</li>
			              <li>
			                <!-- Inner menu: contains the tasks -->
			                <ul class="menu">
			                  <li><!-- Task item -->
			                    <a href="#">
			                      <!-- Task title and progress text -->
			                      <h3>
			                        Design some buttons
			                        <small class="pull-right">20%</small>
			                      </h3>
			                      <!-- The progress bar -->
			                      <div class="progress xs">
			                        <!-- Change the css width attribute to simulate progress -->
			                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
			                          <span class="sr-only">20% Complete</span>
			                        </div>
			                      </div>
			                    </a>
			                  </li>
			                  <!-- end task item -->
			                </ul>
			              </li>
			              <li class="footer">
			                <a href="#">View all tasks</a>
			              </li>
			            </ul>
			          </li>
			          <!-- User Account Menu -->
			          <li class="dropdown user user-menu">
			            <!-- Menu Toggle Button -->
			            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
			              <!-- The user image in the navbar-->
			            <?php echo '<img src="'.$this->request->webroot.'/upload/avatar/'.$employeeinfo['image_url'].'" class="user-image">' ?>
			              <!-- hidden-xs hides the username on small devices so only the image appears. -->
			              <span class="hidden-xs"><?php echo $employeeinfo['username']; ?></span>
			            </a>
			            <ul class="dropdown-menu">
			              <!-- The user image in the menu -->
			              <li class="user-header">
			                <?php echo '<img src="'.$this->request->webroot.'/upload/avatar/'.$employeeinfo['image_url'].'" class="img-circle">' ?>

			                <p>
			                  <?php echo $employeeinfo['username']; ?> - Web Developer
			                  <small>Member since Nov. 2012</small>
			                </p>
			              </li>
			              <!-- Menu Body -->
			              <li class="user-body">
			                <div class="row">
			                  <div class="col-xs-4 text-center">
			                    <a href="#">Followers</a>
			                  </div>
			                  <div class="col-xs-4 text-center">
			                    <a href="#">Sales</a>
			                  </div>
			                  <div class="col-xs-4 text-center">
			                    <a href="#">Friends</a>
			                  </div>
			                </div>
			                <!-- /.row -->
			              </li>
			              <!-- Menu Footer-->
			              <li class="user-footer">
			                <div class="pull-left">
			                  <a href="#" class="btn btn-default btn-flat">Profile</a>
			                </div>
			                <div class="pull-right">
			                  <a href="<?php echo $this->request->webroot; ?>users/logout" class="btn btn-default btn-flat">Sign out</a>
			                </div>
			              </li>
			            </ul>
			          </li>
			          <!-- Control Sidebar Toggle Button -->
			          <li>
			            <a href="<?php echo $this->request->webroot; ?>users/logout"><i class="fa fa-sign-out"></i></a>
			          </li>
			        </ul>
			      </div>
			    </nav>
		</header>
	  	<!-- aside -->
	   	<aside class="main-sidebar">
		    <!-- sidebar: style can be found in sidebar.less -->
		    <section class="sidebar">

		      <!-- Sidebar user panel (optional) -->
		      <div class="user-panel">
		        <div class="pull-left image">
		          <?php echo '<img src="'.$this->request->webroot.'/upload/avatar/'.$employeeinfo['image_url'].'" class="img-circle">' ?>
		        </div>
		        <div class="pull-left info">
		          <p><?php echo $employeeinfo['username']; ?></p>
		          <!-- Status -->
		          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		        </div>
		      </div>

		      <!-- search form (Optional) -->
		      <form action="#" method="get" class="sidebar-form">
		        <div class="input-group">
		          <input type="text" name="q" class="form-control" placeholder="Search...">
		              <span class="input-group-btn">
		                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
		                </button>
		              </span>
		        </div>
		      </form>
		      <!-- /.search form -->

		      <!-- Sidebar Menu -->
		      <ul class="sidebar-menu">
		      	<!-- for main account -->
		      	<li class="header">MENU</li>

		      	<?php for($i=0; $i<count($employee_main);$i++){

		      		echo '<li class="'.($mycurl == $employee_main[$i] ? 'active' : '').'">'.$this->Html->link(
		      			$this->Html->tag('i', '',  array('class' => $employee_main_icons[$i])).'<span>'.__($employee_main[$i]).'</span>',
		      			array('controller' => $employee_main_controllers[$i], 'action' => $employee_main_actions[$i]), array('escape'=> false)).'</li>';

		      	}?>

		      	<li class="header">SETTINGS</li>

		      		<?php for($i=0; $i<count($employee_setting);$i++){

		      		echo '<li class="'.($mycurl == $employee_setting[$i] ? 'active' : '').'">'.$this->Html->link(
		      			$this->Html->tag('i', '',  array('class' => $employee_setting_icons[$i])).'<span>'.__($employee_setting[$i]).'</span>',
		      			array('controller' => $employee_setting_controllers[$i], 'action' => $employee_setting_actions[$i]), array('escape'=> false)).'</li>';

		      	}?>


		      </ul>
		      <!-- /.sidebar-menu -->
		    </section>
		    <!-- /.sidebar -->
		</aside>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
		    <!-- Content Header (Page header) -->
		    <section class="content-header">
		      <ol class="breadcrumb">
		        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
		        <li class="active">Here</li>
		      </ol>
		    </section>

		    <!-- Main content -->
		    <section class="content">
		    	<?= $this->Flash->render() ?>
				<?= $this->fetch('content') ?>
			</section>
		    <!-- /.content -->
		</div>
		<!-- Main Footer -->
	  	<footer class="main-footer">
		    <!-- To the right -->
		    <div class="pull-right hidden-xs">
		      Anything you want
		    </div>
		    <!-- Default to the left -->
		    <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
	  	</footer>

	</div>
<!-- REQUIRED JS SCRIPTS -->
<?= $this->Html->script('admin/jQuery/jQuery-2.2.0.min.js') ?>
<?= $this->Html->script('admin/bootstrap/js/bootstrap.min.js') ?>
<?= $this->Html->script('admin/dist/js/app.min.js') ?>
<?= $this->Html->script('profile-pic.js') ?>

</body>
</html>