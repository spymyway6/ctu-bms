<?php 
    $my_user_id = $this->session->userdata('id'); 
?>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">Navigation </li>
                <li>
                    <a href="<?=base_url();?>student/dashboard" class="waves-effect <?=($is_page=='student/dashboard') ? 'active' : ''; ?>"><i class="ti-dashboard"></i> <span> Dashboard </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>student/collections" class="waves-effect <?=($is_page=='student/collections') ? 'active' : ''; ?>"><i class=" ti-bookmark-alt"></i> <span> Collections </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>student/pending_requests" class="waves-effect <?=($is_page=='student/pending_requests') ? 'active' : ''; ?>"><i class="ti-package"></i> <span> Pending Requests </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>student/borrowed_collections" class="waves-effect <?=($is_page=='student/borrowed_collections') ? 'active' : ''; ?>"><i class="ti-package"></i> <span> Borrowed Collection </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>student/reserved_collections" class="waves-effect <?=($is_page=='student/reserved_collections') ? 'active' : ''; ?>"><i class="ti-package"></i> <span> Reserved Collection </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>student/history" class="waves-effect <?=($is_page=='student/history') ? 'active' : ''; ?>"><i class="ti-time"></i> <span> History</span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>student/overdue_lists" class="waves-effect <?=($is_page=='student/overdue_lists') ? 'active' : ''; ?>"><i class="ti-flag"></i> <span> Overdue Lists </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>student/settings" class="waves-effect <?=($is_page=='student/settings')? 'active' : ''; ?>"><i class="ti-settings"></i> <span> Settings </span> </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>