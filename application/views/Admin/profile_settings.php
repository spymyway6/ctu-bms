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
                        <!-- Widgets -->
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card-box">
                                    <form action="<?=base_url();?>admin/add_this_user" data-parsley-validate novalidate method="POST" enctype="multipart/form-data" id="saveProfileForm">
                                        <div class="modal-body"> 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="acc-img">
                                                            <img id="img-profile" src="<?=($profile['pic']) ? base_url().'assets/uploads/users/'.$profile['pic'] : base_url().'assets/uploads/default.png';?>" alt="Profile Image">
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
                                                        <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required value="<?=$profile['firstname']?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6"> 
                                                    <div class="form-group"> 
                                                        <label for="field-1" class="control-label">Last Name *</label> 
                                                        <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required value="<?=$profile['lastname']?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6"> 
                                                    <div class="form-group"> 
                                                        <label for="field-1" class="control-label">Username *</label> 
                                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required value="<?=$profile['username']?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="field-2" class="control-label">Email *</label>
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required value="<?=$profile['email']?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12"> 
                                                    <div class="form-group"> 
                                                        <label for="field-1" class="control-label">Password</label> 
                                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-12"> 
                                                    <div class="form-group"> 
                                                        <label for="field-1" class="control-label">Confirm Password</label> 
                                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" data-parsley-equalto="#password" placeholder="Confirm Password">
                                                    </div>
                                                </div>
                                                <div class="col-md-12"> 
                                                    <div class="form-group"> 
                                                        <label for="field-1" class="control-label">Contact *</label> 
                                                        <input type="text" class="form-control numOnly" name="contact" id="contact" placeholder="Contact" required value="<?=$profile['contact']?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12"> 
                                                    <div class="form-group"> 
                                                        <label for="field-1" class="control-label">Department *</label> 
                                                        <input type="text" class="form-control" name="department" id="department" placeholder="Department" required value="<?=$profile['department']?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12"> 
                                                    <div class="form-group"> 
                                                        <label for="field-1" class="control-label">Address *</label> 
                                                        <input type="text" class="form-control" name="address" id="address" placeholder="Address" required value="<?=$profile['address']?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer"> 
                                            <button type="button" class="btn btn-success waves-effect waves-light saveBtn" onclick="saveProfileSettings(this)"><i class="fa fa-save"></i> Save</button> 
                                        </div> 
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4">
                        		<div class="card-box p-0">
                        			<div class="profile-widget text-center">
			                            <div class="bg-custom bg-profile"></div>
                                        <a href="<?=($profile['pic']) ? base_url().'assets/uploads/users/'.$profile['pic'] : base_url().'assets/uploads/default.png';?>" class="image-popup">
                                            <img class="thumb-lg img-circle img-thumbnail" src="<?=($profile['pic']) ? base_url().'assets/uploads/users/'.$profile['pic'] : base_url().'assets/uploads/default.png';?>" alt="Profile Image">
                                        </a>
			                            <h4><?=$profile['firstname']?> <?=$profile['lastname']?></h4>
			                            <p class="text-muted"><i class="fa fa-map-marker"></i> <?=$profile['address'] ? $profile['address'] : 'No Address'?></p>
			                            <p class="m-t-10 text-muted p-20">Department: <?=$profile['department'] ? $profile['department'] : 'No Department'?></p>
			                            <?php $count_request = $this->admin_model->count_all_request(); ?>
			                            <ul class="list-inline widget-list clearfix">
                                            <li class="col-md-3"><span><?=$count_request['count_pending']?></span>Pending</li>
			                                <li class="col-md-3"><span><?=$count_request['count_borrowed']?></span>Borrowed</li>
			                                <li class="col-md-3"><span><?=$count_request['count_reserved']?></span>Request</li>
			                                <li class="col-md-3"><span><?=$count_request['count_history']?></span>History</li>
			                            </ul>
			                        </div>
                        		</div>
                        	</div>
                        </div>
                    </div> <!-- container -->
                               
                </div> <!-- content -->
                <?php $this->load->view('Admin/common/footer');?>
                
            </div>
            <!-- End Right content here -->
        </div>
        <!-- END wrapper -->
        <?php $this->load->view('Admin/common/js');?>
	</body>
</html>