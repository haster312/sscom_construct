<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Material Admin - Responsive tables</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href={{ url ( "/admin/assets/css/theme-default/bootstrap.css?1422792965" )}}/>
		<link type="text/css" rel="stylesheet" href={{ url ( "/admin/assets/css/theme-default/materialadmin.css?1425466319 ")}} />
		<link type="text/css" rel="stylesheet" href={{ url ( "/admin/assets/css/theme-default/font-awesome.min.css?1422529194")}} />
		<link type="text/css" rel="stylesheet" href={{ url ( "/admin/assets/css/theme-default/material-design-iconic-font.min.css?1421434286")}} />
		<link type="text/css" rel="stylesheet" href={{ url ( "/admin/assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989" )}}/>
		<link type="text/css" rel="stylesheet" href={{ url ( "/admin/assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990")}} />
		<link type="text/css" rel="stylesheet" href={{ url ( "/admin/assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990")}} />

		<link type="text/css" rel="stylesheet" href={{ url ( "/admin/assets/css/theme-default/libs/select2/select2.css?1424887856" )}}/>
		<link type="text/css" rel="stylesheet" href={{ url ( "/admin/assets/css/theme-default/libs/multi-select/multi-select.css?1424887857" )}}/>
		<link type="text/css" rel="stylesheet" href={{ url ( "/admin/assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css?1424887858" )}}/>
		<link type="text/css" rel="stylesheet" href={{ url ( "/admin/assets/css/theme-default/libs/jquery-ui/jquery-ui-theme.css?1423393666" )}}/>
		<link type="text/css" rel="stylesheet" href={{ url ( "/admin/assets/css/theme-default/libs/bootstrap-colorpicker/bootstrap-colorpicker.css?1424887860")}} />
		<link type="text/css" rel="stylesheet" href={{ url ( "/admin/assets/css/theme-default/libs/bootstrap-tagsinput/bootstrap-tagsinput.css?1424887862" )}}/>
		<link type="text/css" rel="stylesheet" href={{ url ( "/admin/assets/css/theme-default/libs/typeahead/typeahead.css?1424887863")}} />
		<link type="text/css" rel="stylesheet" href={{ url ( "/admin/assets/css/theme-default/libs/dropzone/dropzone-theme.css?1424887864" )}}/>

		<!-- END STYLESHEETS -->

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar-hoverable header-fixed menubar-first full-content">

		<!-- BEGIN HEADER-->
		<header id="header" >
			<div class="headerbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="headerbar-left">
					<ul class="header-nav header-nav-options">
						<li class="header-nav-brand" >
							<div class="brand-holder">
								<a href="../../html/dashboards/dashboard.html">
									<span class="text-lg text-bold text-primary">MATERIAL ADMIN</span>
								</a>
							</div>
						</li>
						<li>
							<a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
								<i class="fa fa-bars"></i>
							</a>
						</li>
					</ul>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="headerbar-right">
					<ul class="header-nav header-nav-options">
						<li>
							<!-- Search form -->
							<form class="navbar-search" role="search">
								<div class="form-group">
									<input type="text" class="form-control" name="headerSearch" placeholder="Enter your keyword">
								</div>
								<button type="submit" class="btn btn-icon-toggle ink-reaction"><i class="fa fa-search"></i></button>
							</form>
						</li>
					</ul><!--end .header-nav-options -->
					<ul class="header-nav header-nav-profile">
						<li class="dropdown">
							<a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
								<img src="admin/assets/img/avatar1.jpg?1403934956" alt="" />
								<span class="profile-info">
									Daniel Johnson
									<small>Administrator</small>
								</span>
							</a>
							<ul class="dropdown-menu animation-dock">
								<li class="dropdown-header">Config</li>
								<li><a href="../../html/pages/profile.html">My profile</a></li>
								<li class="divider"></li>
								<li><a href="../../html/pages/locked.html"><i class="fa fa-fw fa-lock"></i> Lock</a></li>
								<li><a href="../../html/pages/login.html"><i class="fa fa-fw fa-power-off text-danger"></i> Logout</a></li>
							</ul><!--end .dropdown-menu -->
						</li><!--end .dropdown -->
					</ul><!--end .header-nav-profile -->
				</div><!--end #header-navbar-collapse -->
			</div>
		</header>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->


			<!-- BEGIN CONTENT-->

			@yield("content")
			<!-- END CONTENT -->

			<!-- BEGIN MENUBAR-->
			<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>
					<div class="expanded">
						<a href="../../html/dashboards/dashboard.html">
							<span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
						</a>
					</div>
				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						<!-- BEGIN DASHBOARD -->
						<li>
							<a href="#" >
								<div class="gui-icon"><i class="md md-home"></i></div>
								<span class="title">Home</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->

						<!-- BEGIN EMAIL -->
						<li class="gui-folder">
							<a href="/contact">
								<div class="gui-icon"><i class="md md-email"></i></div>
								<span class="title">Contact</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END EMAIL -->

						<!-- BEGIN DASHBOARD -->
						<li class="gui-folder">
							<a >
								<div class="gui-icon"><i class="md md-web"></i></div>
								<span class="title">News</span>
							</a>
							<ul>
								<li><a href="/news" ><span class="title">List</span></a></li>
								<li><a href="/news/add" ><span class="title">Add</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END DASHBOARD -->

						<!-- BEGIN UI -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="fa fa-puzzle-piece fa-fw"></i></div>
								<span class="title">News category</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="/newscategory" ><span class="title">List</span></a></li>
								<li><a href="/newscategory/add" ><span class="title">Add</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END UI -->

						<!-- BEGIN TABLES -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="fa fa-table"></i></div>
								<span class="title">Page</span>
							</a>
              <ul>
								<li><a href="/page" ><span class="title">List</span></a></li>
								<li><a href="/page/add" ><span class="title">Add</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END TABLES -->
						<!-- BEGIN FORMS -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><span class="fa fa-users fa-fw"></span></div>
								<span class="title">Partner</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="/partner" ><span class="title">List</span></a></li>
								<li><a href="/partner/add" ><span class="title">Add</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END FORMS -->

						<!-- BEGIN PAGES -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="md md-computer"></i></div>
								<span class="title">Project</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="/project" ><span class="title">List</span></a></li>
								<li><a href="/project/add" ><span class="title">Add</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END FORMS -->
						<!-- BEGIN CHARTS -->
						<li class="gui-folder">
							<a >
								<div class="gui-icon"><i class="md md-assessment"></i></div>
								<span class="title">Slider</span>
							</a>
							<ul>
	              <li><a href="/slider" ><span class="title">List</span></a></li>
	              <li><a href="/slider/add" ><span class="title">Add</span></a></li>
	            </ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END CHARTS -->

						<!-- BEGIN LEVELS -->
						<li class="gui-folder">
							<a>
								<div class="gui-icon"><i class="fa fa-user fa-fw"></i></div>
								<span class="title">User</span>
							</a>
							<!--start submenu -->
							<ul>
								<li><a href="/user"><span class="title">List</span></a></li>
								<li><a href="/user/add"><span class="title">Add</span></a></li>
							</ul><!--end /submenu -->
						</li><!--end /menu-li -->
						<!-- END LEVELS -->

					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->

					<div class="menubar-foot-panel">
						<small class="no-linebreak hidden-folded">
							<span class="opacity-75">Copyright &copy; 2014</span> <strong>CodeCovers</strong>
						</small>
					</div>
				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->

			<!-- BEGIN OFFCANVAS RIGHT -->
			<div class="offcanvas">

				<!-- BEGIN OFFCANVAS SEARCH -->
				<div id="offcanvas-search" class="offcanvas-pane width-8">
					<div class="offcanvas-head">
						<header class="text-primary">Search</header>
						<div class="offcanvas-tools">
							<a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
								<i class="md md-close"></i>
							</a>
						</div>
					</div>
					<div class="offcanvas-body no-padding">
						<ul class="list ">
							<li class="tile divider-full-bleed">
								<div class="tile-content">
									<div class="tile-text"><strong>A</strong></div>
								</div>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../assets/img/avatar4.jpg?1404026791" alt="" />
									</div>
									<div class="tile-text">
										Alex Nelson
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../assets/img/avatar9.jpg?1404026744" alt="" />
									</div>
									<div class="tile-text">
										Ann Laurens
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile divider-full-bleed">
								<div class="tile-content">
									<div class="tile-text"><strong>J</strong></div>
								</div>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../assets/img/avatar2.jpg?1404026449" alt="" />
									</div>
									<div class="tile-text">
										Jessica Cruise
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../assets/img/avatar8.jpg?1404026729" alt="" />
									</div>
									<div class="tile-text">
										Jim Peters
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile divider-full-bleed">
								<div class="tile-content">
									<div class="tile-text"><strong>M</strong></div>
								</div>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../assets/img/avatar5.jpg?1404026513" alt="" />
									</div>
									<div class="tile-text">
										Mabel Logan
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../assets/img/avatar11.jpg?1404026774" alt="" />
									</div>
									<div class="tile-text">
										Mary Peterson
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../assets/img/avatar3.jpg?1404026799" alt="" />
									</div>
									<div class="tile-text">
										Mike Alba
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile divider-full-bleed">
								<div class="tile-content">
									<div class="tile-text"><strong>N</strong></div>
								</div>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../assets/img/avatar6.jpg?1404026572" alt="" />
									</div>
									<div class="tile-text">
										Nathan Peterson
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile divider-full-bleed">
								<div class="tile-content">
									<div class="tile-text"><strong>P</strong></div>
								</div>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../assets/img/avatar7.jpg?1404026721" alt="" />
									</div>
									<div class="tile-text">
										Philip Ericsson
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
							<li class="tile divider-full-bleed">
								<div class="tile-content">
									<div class="tile-text"><strong>S</strong></div>
								</div>
							</li>
							<li class="tile">
								<a class="tile-content ink-reaction" href="#offcanvas-chat" data-toggle="offcanvas" data-backdrop="false">
									<div class="tile-icon">
										<img src="../../assets/img/avatar10.jpg?1404026762" alt="" />
									</div>
									<div class="tile-text">
										Samuel Parsons
										<small>123-123-3210</small>
									</div>
								</a>
							</li>
						</ul>
					</div><!--end .offcanvas-body -->
				</div><!--end .offcanvas-pane -->
				<!-- END OFFCANVAS SEARCH -->

				<!-- BEGIN OFFCANVAS CHAT -->
				<div id="offcanvas-chat" class="offcanvas-pane style-default-light width-12">
					<div class="offcanvas-head style-default-bright">
						<header class="text-primary">Chat with Ann Laurens</header>
						<div class="offcanvas-tools">
							<a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
								<i class="md md-close"></i>
							</a>
							<a class="btn btn-icon-toggle btn-default-light pull-right" href="#offcanvas-search" data-toggle="offcanvas" data-backdrop="false">
								<i class="md md-arrow-back"></i>
							</a>
						</div>
						<form class="form">
							<div class="form-group floating-label">
								<textarea name="sidebarChatMessage" id="sidebarChatMessage" class="form-control autosize" rows="1"></textarea>
								<label for="sidebarChatMessage">Leave a message</label>
							</div>
						</form>
					</div>
					<div class="offcanvas-body">
						<ul class="list-chats">
							<li>
								<div class="chat">
									<div class="chat-avatar"><img class="img-circle" src="../../assets/img/avatar1.jpg?1403934956" alt="" /></div>
									<div class="chat-body">
										Yes, it is indeed very beautiful.
										<small>10:03 pm</small>
									</div>
								</div><!--end .chat -->
							</li>
							<li class="chat-left">
								<div class="chat">
									<div class="chat-avatar"><img class="img-circle" src="../../assets/img/avatar9.jpg?1404026744" alt="" /></div>
									<div class="chat-body">
										Did you see the changes?
										<small>10:02 pm</small>
									</div>
								</div><!--end .chat -->
							</li>
							<li>
								<div class="chat">
									<div class="chat-avatar"><img class="img-circle" src="../../assets/img/avatar1.jpg?1403934956" alt="" /></div>
									<div class="chat-body">
										I just arrived at work, it was quite busy.
										<small>06:44pm</small>
									</div>
									<div class="chat-body">
										I will take look in a minute.
										<small>06:45pm</small>
									</div>
								</div><!--end .chat -->
							</li>
							<li class="chat-left">
								<div class="chat">
									<div class="chat-avatar"><img class="img-circle" src="../../assets/img/avatar9.jpg?1404026744" alt="" /></div>
									<div class="chat-body">
										The colors are much better now.
									</div>
									<div class="chat-body">
										The colors are brighter than before.
										I have already sent an example.
										This will make it look sharper.
										<small>Mon</small>
									</div>
								</div><!--end .chat -->
							</li>
							<li>
								<div class="chat">
									<div class="chat-avatar"><img class="img-circle" src="/admin/assets/img/avatar1.jpg?1403934956" alt="" /></div>
									<div class="chat-body">
										Are the colors of the logo already adapted?
										<small>Last week</small>
									</div>
								</div><!--end .chat -->
							</li>
						</ul>
					</div><!--end .offcanvas-body -->
				</div><!--end .offcanvas-pane -->
				<!-- END OFFCANVAS CHAT -->

			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS RIGHT -->

		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
		<script src={{ url ( "/admin/assets/js/libs/jquery/jquery.min.js")}}></script>
		<script src={{ url ( "/admin/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js" )}}></script>
		<script src={{ url ( "/admin/assets/js/libs/jquery-ui/jquery-ui.min.js")}}></script>//
		<script src={{ url ( "/admin/assets/js/libs/bootstrap/bootstrap.min.js" )}}></script>
		<script src={{ url ( "/admin/assets/js/libs/spin.js/spin.min.js" )}}></script>
		<script src={{ url ( "/admin/assets/js/libs/autosize/jquery.autosize.min.js" )}}></script>
		<script src={{ url ( "/admin/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js")}}></script>
		<script src={{ url ( "/admin/assets/js/core/source/App.js" )}}></script>
		<script src={{ url ( "/admin/assets/js/core/source/AppNavigation.js")}}></script>
		<script src={{ url ( "/admin/assets/js/core/source/AppOffcanvas.js")}}></script>
		<script src={{ url ( "/admin/assets/js/core/source/AppCard.js")}}></script>
		<script src={{ url ( "/admin/assets/js/core/source/AppForm.js")}}></script>
		<script src={{ url ( "/admin/assets/js/core/source/AppNavSearch.js")}}></script>
		<script src={{ url ( "/admin/assets/js/core/source/AppVendor.js")}}></script>
		<script src={{ url ( "/admin/assets/js/core/demo/Demo.js")}}></script>
		<script src={{ url ( "/admin/assets/js/libs/DataTables/jquery.dataTables.min.js")}}></script>
		<script src={{ url ( "/admin/assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js")}}></script>
		<script src={{ url ( "/admin/assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js")}}></script>
		<script src={{ url ( "/admin/assets/js/core/demo/DemoTableDynamic.js")}}></script>
		<script src={{ url ("/admin/assets/js/libs/dropzone/dropzone.min.js")}}></script>
		<script src={{ url ("/admin/assets/js/libs/typeahead/typeahead.bundle.min.js")}}></script>

		<script src={{ url ("/admin/assets/js/libs/select2/select2.min.js")}}></script>
		<script src={{ url ("/admin/assets/js/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js")}}></script>
		<script src={{ url ("/admin/assets/js/libs/multi-select/jquery.multi-select.js")}}></script>
		<script src={{ url ("/admin/assets/js/libs/inputmask/jquery.inputmask.bundle.min.js")}}></script>
		<script src={{ url ("/admin/assets/js/libs/moment/moment.min.js")}}></script>
		<script src={{ url ("/admin/assets/js/core/demo/DemoFormComponents.js")}}></script>

		<!-- END JAVASCRIPT -->

	</body>
</html>
