<!DOCTYPE html>
<html>
    <?php $this->load->view('Admin/common/css');?>
	<body class="fixed-left">

		<!-- Begin page -->
		<div id="wrapper">

            <!-- Top Bar Start -->
            <?php $this->load->view('Admin/common/topbar');?>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php $this->load->view('Admin/common/leftnav');?>
			<!-- Left Sidebar End -->

			<!-- Start right Content here -->
			<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">
						<?php $this->load->view('Admin/common/breadcrumbs');?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <?php if($this->session->userdata('role')==1 || strstr($this->session->userdata('permission'),'create_member')){ ?>
                                        <a href="javascript:;" class="btn btn-success waves-effect waves-light btn-sm pull-right" onclick="addNewUser()"><i class="fa fa-plus"></i> Add New Librarian</a>
                                    <?php } ?>
                                    <h4 class="m-t-0 header-title"><b>Librarians Lists</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        List of all your the librarians registered.
                                    </p>
                                    <div class="tbl-responsive">
                                        <table id="usersTable" class="table table-hover table-bordered table-actions-bar m-b-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Image</th>
                                                    <th>Firstname</th>
                                                    <th>Lastname</th>
                                                    <th>Username</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Status</th>
                                                    <th>Department</th>
                                                    <th>Date Added</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($users as $col){ ?>
                                                    <tr>
                                                        <td>
                                                            <a href="<?=($col['pic']) ? base_url().'assets/uploads/users/'.$col['pic'] : base_url().'assets/uploads/default.png';?>" class="image-popup">
                                                                <div class="tbl-img">
                                                                    <img src="<?=($col['pic']) ? base_url().'assets/uploads/users/'.$col['pic'] : base_url().'assets/uploads/default.png';?>" alt="Pic Image">
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td><?=$col['firstname']?></td>
                                                        <td><?=$col['lastname']?></td>
                                                        <td><?=$col['username']?></td>
                                                        <td><?=$col['email']?></td>
                                                        <td><?=$col['contact']?></td>
                                                        <td class="text-center"><?=($col['status'] == 'Active') ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>'; ?></td>
                                                        <td><?=($col['department']) ? $col['department'] : '-'?></td>
                                                        <td><?=date('M d, Y', strtotime($col['created_at']))?></td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light btn-sm" data-toggle="dropdown" aria-expanded="false">Options <span class="caret"></span></button>
                                                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                                    <li><a href="javascript:;" onclick="editUser(<?=$col['id']?>)">Edit</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->

                    <!-- Modal -->
                    <div id="addNewUserModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg"> 
                            <div class="modal-content"> 
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                    <h4 class="modal-title" id="form-title"><i class="fa fa-user-plus"></i> Add New Users</h4> 
                                </div> 
                                <form action="<?=base_url();?>admin/add_this_user" data-parsley-validate novalidate method="POST" enctype="multipart/form-data" id="addNewUserForm">
                                    <div class="modal-body"> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="acc-img">
                                                        <img id="img-profile" src="<?=base_url();?>assets/back-office/images/user.png" alt="Profile Image">
                                                        <span class="cust-mod-edit-prof" title="Choose image"><i class="fa fa-pencil text-white"></i></span>
                                                        <i class="fa fa-upload upload-icon"></i>
                                                        <input type="file" name="book_image" class="input-img" id="input-img">
                                                        <input type="hidden" name="img_data" id="img_data">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">First Name *</label> 
                                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Last Name *</label> 
                                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Username *</label> 
                                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-2" class="control-label">Email *</label>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Password *</label> 
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Contact *</label> 
                                                    <input type="text" class="form-control numOnly" name="contact" id="contact" placeholder="Contact" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Department *</label> 
                                                    <input type="text" class="form-control" name="department" id="department" placeholder="Department" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Address *</label> 
                                                    <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row"> 
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Status * </label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </div> 
                                            </div>
                                        </div>
                                        <!-- Other Fields -->
                                        <input type="hidden" id="user_id" name="user_id"> 
                                    </div>
                                    <div class="modal-footer"> 
                                        <button type="button" class="btn btn-success waves-effect waves-light saveBtn" onclick="saveUser(this)"><i class="fa fa-user-plus"></i> Save</button> 
                                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                                    </div> 
                                </form>
                                <div class="loader d-none m-t-20">
                                    <i class="fa fa-spin fa-spinner"></i> Loading data. Please wait...
                                </div>
                            </div> 
                        </div>
                    </div><!-- /.modal -->
                    <!-- Modals Here -->
                               
                </div> <!-- content -->
                <?php $this->load->view('Admin/common/footer');?>
                
            </div>
            <!-- End Right content here -->
        </div>
        <!-- END wrapper -->
        <?php $this->load->view('Admin/common/js');?>
        <script>
            $(document).ready(function() {
                $('#usersTable').DataTable({
                    "order": [[ 8, "desc" ]]
                });
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                    }
                });
            });
        </script>
	</body>
</html>