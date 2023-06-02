<?php 
    $my_user_id = $this->session->userdata('id'); 
    $img          = []; 
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
                            <?php $myimg = 'user.png'; ?>
                            <div class="top-prof-img">
                                <img src="<?=base_url();?>assets/back-office/images/<?=$myimg;?>" alt="Profile Image" style="border: 0;"
                                >
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a onclick="profile_settings(<?=$this->session->userdata('id')?>)" href="javascript:;" class="waves-effect"><i class="ti-settings m-r-5"></i>Profile Settings</a></li>
                            <li><a href="javascript:;" onclick="logout()"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
</div>