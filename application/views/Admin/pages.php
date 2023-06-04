<!DOCTYPE html>
<html>
    <?php $this->load->view('Admin/common/css');?>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/back-office/css/editor.css" />
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
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Editing <?=$page['page_name']?> </b></h4>
                                    <p class="text-muted m-b-30 font-13">
										Update the details below
									</p>
                                    <form action="javascript:;" data-parsley-validate novalidate method="POST" enctype="multipart/form-data" id="savePageSettingsForm">
                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Page Name *</label> 
                                                    <input type="text" class="form-control" name="page_name" id="page_name" placeholder="Page Name" required value="<?=$page['page_name']?>">
                                                    <input type="hidden" name="page_id" value="<?=$page['id']?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group form-editor"> 
                                                    <label class="control-label">Post Description <span class="text-danger">*</span></label>  
                                                    <textarea  class="form-control" name="post_description" id="post_description" cols="20" rows="20" placeholder="Post Description here.." ><?=$page['page_content']?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-success waves-effect waves-light saveBtn" onclick="savePageSettings(this)"><i class="fa fa-save"></i> Save</button> 
                                            </div>
                                        </div>
                                    </div>
                                </form>
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
        <script type="text/javascript" src="<?= base_url() ?>assets/back-office/js/editor.js"></script>
        
        <script type="text/javascript">
            $(document).ready(function() {
                $("#post_description").Editor();
                $('#post_description').Editor("setText", $('#post_description').val());
            });
        </script>
	</body>
</html>