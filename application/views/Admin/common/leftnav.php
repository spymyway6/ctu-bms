<?php 
    $my_user_id = $this->session->userdata('id');
    $count_request = $this->admin_model->count_all_request();
?>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">Navigation </li>
                <li>
                    <a href="<?=base_url();?>admin/dashboard" class="waves-effect <?=($is_page=='admin/dashboard') ? 'active' : ''; ?>"><i class="ti-dashboard"></i> <span> Dashboard </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/collections" class="waves-effect <?=($is_page=='admin/collections') ? 'active' : ''; ?>"><i class=" ti-bookmark-alt"></i> <span> Collections </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/pending_requests" class="waves-effect <?=($is_page=='admin/pending_requests') ? 'active' : ''; ?>"><i class="ti-time"></i> <span> <?=($count_request['count_pending']) ? '<span class="label label-danger pull-right">'.$count_request['count_pending'].'</span>' : ''; ?> Pending Request </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/borrowed_collections" class="waves-effect <?=($is_page=='admin/borrowed_collections') ? 'active' : ''; ?>"><i class="ti-package"></i><?=($count_request['count_borrowed']) ? '<span class="label label-danger pull-right">'.$count_request['count_borrowed'].'</span>' : ''; ?> <span> Borrowed Collection </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/reserved_collections" class="waves-effect <?=($is_page=='admin/reserved_collections') ? 'active' : ''; ?>"><i class="ti-package"></i><?=($count_request['count_reserved']) ? '<span class="label label-danger pull-right">'.$count_request['count_reserved'].'</span>' : ''; ?> <span> Reserved Collection </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/history" class="waves-effect <?=($is_page=='admin/history') ? 'active' : ''; ?>"><i class="ti-time"></i> <span> History</span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/overdue_lists" class="waves-effect <?=($is_page=='admin/overdue_lists') ? 'active' : ''; ?>"><i class="ti-flag"></i><?=($count_request['count_expired']) ? '<span class="label label-danger pull-right">'.$count_request['count_expired'].'</span>' : ''; ?> <span> Overdue Lists </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/teachers" class="waves-effect <?=($is_page=='admin/teachers') ? 'active' : ''; ?>"><i class="ti-id-badge"></i> <span> Teachers</span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/students" class="waves-effect <?=($is_page=='admin/students') ? 'active' : ''; ?>"><i class="ti-id-badge"></i> <span> Students</span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/users" class="waves-effect <?=($is_page=='admin/users') ? 'active' : ''; ?>"><i class="ti-user"></i> <span> Librarians</span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/profile_settings" class="waves-effect <?=($is_page=='admin/profile_settings')? 'active' : ''; ?>"><i class="ti-settings"></i> <span> Profile Settings </span> </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>