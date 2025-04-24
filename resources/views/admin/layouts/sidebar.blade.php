<!-- leftbar-tab-menu -->
<div class="startbar d-print-none">
    <!--start brand-->
    <div class="brand">
        <a href="{{route('dashboard')}}" class="logo">
                <span>
                    <img src="{{asset('admin/assets/images/logo-sm.png')}}" alt="logo-small" class="logo-sm">
                </span>
            <span class="">
                    <img src="{{asset('admin/assets/images/logo-light.png')}}" alt="logo-large" class="logo-lg logo-light">
                    <img src="{{asset('admin/assets/images/logo-dark.png')}}" alt="logo-large" class="logo-lg logo-dark">
                </span>
        </a>
    </div>
    <!--end brand-->
    <!--start startbar-menu-->
    <div class="startbar-menu" >
        <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
            <div class="d-flex align-items-start flex-column w-100">
                <!-- Navigation -->
                <ul class="navbar-nav mb-auto w-100">
                    <li class="menu-label mt-2">
                        <span>Navigation</span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('dashboard')}}">
                            <i class="fas fa-braille me-3"></i>
                            <span>Dashboards</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#mySkill" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarEcommerce">
                            <i class="fas fa-tasks me-3"></i>
                            <span>My Skills</span>
                        </a>
                        <div class="collapse" id="mySkill">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('skill-list')}}">Skill List</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#workExperience" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarProjects">
                            <i class="fas fa-tasks me-3"></i>
                            <span>Work Experience</span>
                        </a>
                        <div class="collapse " id="workExperience">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="{{route('work-experience')}}" class="nav-link ">Experience List</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#educationExperience" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarProjects">
                            <i class="fas fa-tasks me-3"></i>
                            <span>Education Experience</span>
                        </a>
                        <div class="collapse " id="educationExperience">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="{{route('my-education')}}" class="nav-link ">Education List</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#projectList" data-bs-toggle="collapse" role="button"
                           aria-expanded="false" aria-controls="sidebarProjects">
                            <i class="fas fa-tasks me-3"></i>
                            <span>My Projects</span>
                        </a>
                        <div class="collapse " id="projectList">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a href="{{route('my-project')}}" class="nav-link ">Project List</a>
                                </li><!--end nav-item-->
                            </ul><!--end nav-->
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact-us')}}">
                            <i class="fas fa-tasks me-3"></i>
                            <span>Contact Me</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-tasks me-3"></i>
                            <span>Section Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('site-setting')}}">
                            <i class="fas fa-tasks me-3"></i>
                            <span>Site Settings</span>
                        </a>
                    </li>

                </ul>

            </div>
        </div>
    </div>
</div>
