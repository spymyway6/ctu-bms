<?php 
    $my_user_id = $this->session->userdata('id');
    $count_request = $this->admin_model->count_all_request();
    $get_pages = $this->admin_model->get_all_pages();
?>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">Navigation </li>
                <li>
                    <a href="<?=base_url();?>" class="waves-effect" target="_blank"><i class="ti-world"></i> <span> Visit Homepage </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/dashboard" class="waves-effect <?=($is_page=='admin/dashboard') ? 'active' : ''; ?>"><i class="ti-dashboard"></i> <span> Dashboard </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/categories" class="waves-effect <?=($is_page=='admin/categories') ? 'active' : ''; ?>"><i class=" ti-server"></i> <span> Categories </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/collections" class="waves-effect <?=($is_page=='admin/collections') ? 'active' : ''; ?>"><i class=" ti-agenda"></i> <span> Collections </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/pending_requests" class="waves-effect <?=($is_page=='admin/pending_requests') ? 'active' : ''; ?>"><i class="ti-clipboard"></i> <span> <?=($count_request['count_pending']) ? '<span class="label label-danger pull-right">'.$count_request['count_pending'].'</span>' : ''; ?> Pending Request </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/borrowed_collections" class="waves-effect <?=($is_page=='admin/borrowed_collections') ? 'active' : ''; ?>"><i class="ti-bookmark-alt"></i><?=($count_request['count_borrowed']) ? '<span class="label label-danger pull-right">'.$count_request['count_borrowed'].'</span>' : ''; ?> <span> Borrowed Collection </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/reserved_collections" class="waves-effect <?=($is_page=='admin/reserved_collections') ? 'active' : ''; ?>"><i class="ti-bookmark"></i><?=($count_request['count_reserved']) ? '<span class="label label-danger pull-right">'.$count_request['count_reserved'].'</span>' : ''; ?> <span> Reserved Collection </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/overdue_lists" class="waves-effect <?=($is_page=='admin/overdue_lists') ? 'active' : ''; ?>"><i class="ti-flag-alt"></i><?=($count_request['count_expired']) ? '<span class="label label-danger pull-right">'.$count_request['count_expired'].'</span>' : ''; ?> <span> Overdue Lists </span> </a>
                </li>
                <li>
                    <a href="<?=base_url();?>admin/history" class="waves-effect <?=($is_page=='admin/history') ? 'active' : ''; ?>"><i class="ti-time"></i> <span> History</span> </a>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect <?=($is_page=='admin/teachers' || $is_page=='admin/students' || $is_page=='admin/users') ? 'active' : ''; ?>"><i class="ti-user"></i> <span> Users </span> </a>
                    <ul class="list-unstyled">
                        <li>
                            <a href="<?=base_url();?>admin/teachers" class="waves-effect <?=($is_page=='admin/teachers') ? 'active' : ''; ?>">Teachers</a>
                        </li>
                        <li>
                            <a href="<?=base_url();?>admin/students" class="waves-effect <?=($is_page=='admin/students') ? 'active' : ''; ?>">Students</a>
                        </li>
                        <li>
                            <a href="<?=base_url();?>admin/users" class="waves-effect <?=($is_page=='admin/users') ? 'active' : ''; ?>">Librarians</a>
                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="ti-link"></i> <span> Page Settings </span> </a>
                    <ul class="list-unstyled">
                        <?php foreach($get_pages as $page){ ?>
                            <li>
                                <a href="<?=base_url();?>admin/pages/<?=$page['id']?>" class="waves-effect <?=($is_page=='admin/pages/'.$page['id']) ? 'active' : ''; ?>"><?=$page['page_name']?></a>
                            </li>
                        <?php } ?>
                    </ul>
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