@if(!Auth::guest())
    <!-- BEGIN MENUBAR-->
    <div id="menubar" class="menubar-inverse ">
        <div class="menubar-fixed-panel">
            <div>
                <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="expanded">
                <a href="{{ route('index') }}">
                    <span class="text-lg text-bold text-primary ">MATERIAL&nbsp;ADMIN</span>
                </a>
            </div>
        </div>
        <div class="menubar-scroll-panel">

            <!-- BEGIN MAIN MENU -->
            <ul id="main-menu" class="gui-controls">

                <!-- BEGIN DASHBOARD -->
                <li>
                    <a href="{{ route('index') }}" class="active">
                        <div class="gui-icon"><i class="md md-home"></i></div>
                        <span class="title">Dashboard</span>
                    </a>
                </li><!--end /menu-li -->
                <!-- END DASHBOARD -->

                {{--<!-- BEGIN PAGES -->--}}
                <li>
                    <a href="{{ route('admin.page') }}" >
                        <div class="gui-icon"><i class="fa fa-table"></i></div>
                        <span class="title">Page</span>
                    </a>
                </li><!--end /menu-li -->
                {{--<!-- END PAGES -->--}}

                {{--<!-- BEGIN NEWS -->--}}
                <li>
                    <a href="{{ route('admin.news') }}" >
                        <div class="gui-icon"><i class="fa fa-table"></i></div>
                        <span class="title">News Management</span>
                    </a>
                </li><!--end /menu-li -->
                {{--<!-- END NEWS -->--}}

                {{--<!-- BEGIN NEWS -->--}}
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="fa fa-building fa-fw"></i></div>
                        <span class="title">Project Management</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="{{ route('admin.project-category') }}" ><span class="title">Project Category</span></a></li>
                        <li><a href="{{ route('admin.project-menu') }}" ><span class="title">Project Menu</span></a></li>
                        <li><a href="{{ route('admin.project') }}" ><span class="title">Project</span></a></li>
                    </ul><!--end /submenu -->
                </li>
                <li class="gui-folder">
                    <a>
                        <div class="gui-icon"><i class="fa fa-building fa-fw"></i></div>
                        <span class="title">Attributes</span>
                    </a>
                    <!--start submenu -->
                    <ul>
                        <li><a href="{{ route('admin.project.attribute') }}" ><span class="title">Attribute List</span></a></li>
                        <li><a href="{{ route('admin.attribute.option') }}" ><span class="title">Attribute Options</span></a></li>
                    </ul><!--end /submenu -->
                </li>
                {{--<!-- END NEWS -->--}}

                {{--<!-- BEGIN SLIDER -->--}}
                <li>
                    <a href="{{ route('admin.slider') }}" >
                        <div class="gui-icon"><i class="fa fa-sliders"></i></div>
                        <span class="title">Slider</span>
                    </a>
                </li>
                <!--end /menu-li -->
                {{--<!-- END SLIDER -->--}}
                {{--<!-- BEGIN PARTNER -->--}}
                <li>
                    <a href="{{ route('admin.partner') }}" >
                        <div class="gui-icon"><i class="fa fa-user"></i></div>
                        <span class="title">Partner</span>
                    </a>
                </li><!--end /menu-li -->
                <li>
                    <a href="{{ route('admin.info') }}" >
                        <div class="gui-icon"><i class="fa fa-sliders"></i></div>
                        <span class="title">Site Information</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.seo') }}" >
                        <div class="gui-icon"><i class="fa fa-sliders"></i></div>
                        <span class="title">SEO Information</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.upload') }}" >
                        <div class="gui-icon"><i class="fa fa-cloud-upload"></i></div>
                        <span class="title">Upload</span>
                    </a>
                </li><!--end /menu-li -->
                <li>
                    <a href="{{ route('admin.member') }}" >
                        <div class="gui-icon"><i class="fa fa-user"></i></div>
                        <span class="title">Member</span>
                    </a>
                </li><!--end /menu-li -->
                {{--<!-- END PARTNER -->--}}

            </ul><!--end .main-menu -->
            <!-- END MAIN MENU -->

            <div class="menubar-foot-panel">
                <small class="no-linebreak hidden-folded">
                    <span class="opacity-75">Copyright &copy; 2016</span> <strong>Haster</strong>
                </small>
            </div>
        </div><!--end .menubar-scroll-panel-->
    </div><!--end #menubar-->
    <!-- END MENUBAR -->
@endif