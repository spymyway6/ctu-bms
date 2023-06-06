<?php 
    $my_user_id = $this->session->userdata('id'); 
    $user_img = $this->student_model->get_my_profile($my_user_id)['pic'];
    $firstname = $this->session->userdata('firstname');
?>
<div class="topbar">
   <!-- LOGO -->
   <div class="topbar-left">
        <div class="text-center">
            <a href="javascript:;" class="logo">
                <div class="plain-logo"><img src="<?=base_url();?>assets/front-office/img/core-img/logo.png" alt="Site Logo" /></div><span>USER</span>
            </a>
        </div>
    </div>

    <!-- Button mobile view to collapse sidebar menu -->
    <div class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="">
                <div class="pull-left">
                    <button class="button-menu-mobile open-left">
                        <i class="ion-navicon"></i>
                    </button>
                    <span class="clearfix"></span>
                </div>
                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                            <span class="profile-name"><?=$firstname;?></span>
                            <div class="top-prof-img">
                                <img src="<?=($user_img) ? base_url().'assets/uploads/users/'.$user_img : base_url().'assets/uploads/default.png';?>" alt="Profile Image" style="border: 0;">
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=base_url();?>student/profile_settings" class="waves-effect"><i class="ti-settings m-r-5"></i>Profile Settings</a></li>
                            <li><a href="javascript:;" onclick="logout()"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>