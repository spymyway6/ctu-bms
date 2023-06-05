<!DOCTYPE html>
<html>
    <?php $this->load->view('Student/common/css');?>
	<body class="fixed-left">

		<!-- Begin page -->
		<div id="wrapper">

            <!-- Top Bar Start -->
            <?php $this->load->view('Student/common/topbar');?>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <?php $this->load->view('Student/common/leftnav');?>
			<!-- Left Sidebar End -->

			<!-- Start right Content here -->
			<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">
						<?php $this->load->view('Student/common/breadcrumbs');?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>My Overdue Date Collection</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        List of all your overdue date collection inside the library.
                                    </p>
                                    <div class="tbl-responsive">
                                        <table id="collectionsTable" class="table table-hover table-bordered table-actions-bar m-b-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Image</th>
                                                    <th>Accession No.</th>
                                                    <th>Book Name</th>
                                                    <th>Category</th>
                                                    <th>Date Borrowed</th>
                                                    <th>Overdue Date</th>
                                                    <th>Status</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($overdue_lists as $col){ ?>
                                                    <tr>
                                                        <td>
                                                            <a href="<?=($col['book_image']) ? base_url().'assets/uploads/books/'.$col['book_image'] : base_url().'assets/uploads/default.png';?>" class="image-popup">
                                                                <div class="tbl-img">
                                                                    <img src="<?=($col['book_image']) ? base_url().'assets/uploads/books/'.$col['book_image'] : base_url().'assets/uploads/default.png';?>" alt="Book Image">
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td><?=$col['accession_no']?></td>
                                                        <td><?=$col['book_name']?></td>
                                                        <td><?=$col['category']?></td>
                                                        <td><?=date('M d, Y', strtotime($col['created_at']))?></td>
                                                        <td><?=date('M d, Y', strtotime($col['expiry_date']))?></td>
                                                        <td class="text-center"><span class="badge badge-danger">Overdue</span></td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <button type="button" onclick="editCollection(<?=$col['id']?>)" class="btn btn-primary waves-effect waves-light btn-sm"><i class="ti-zoom-in"></i> View Details</button>
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
                    <div id="addNewCollectionModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg"> 
                            <div class="modal-content"> 
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                    <h4 class="modal-title" id="form-title"><i class="fa fa-user-plus"></i> View Collection</h4> 
                                </div> 
                                <form action="<?=base_url();?>Student/add_this_member" data-parsley-validate novalidate method="POST" enctype="multipart/form-data" id="addNewCollectionForm">
                                    <div class="modal-body"> 
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="acc-img">
                                                        <img id="img-profile" src="<?=base_url();?>assets/back-office/images/user.png" alt="Profile Image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Book Name *</label> 
                                                    <input type="text" class="form-control" name="book_name" id="book_name" placeholder="Book Name" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Accession No. *</label> 
                                                    <input type="text" class="form-control numOnly" name="accession_no" id="accession_no" placeholder="Accession No" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Author *</label> 
                                                    <input type="text" class="form-control" name="author" id="author" placeholder="Author" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-2" class="control-label">Other Author *</label>
                                                    <input type="text" class="form-control" name="other_author" id="other_author" placeholder="Other Author" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Edition *</label> 
                                                    <input type="text" class="form-control" name="edition" id="edition" placeholder="Edition" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Date Published *</label> 
                                                    <input type="date" class="form-control" name="publish_date" id="publish_date" placeholder="Date Published" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Copyright Date *</label> 
                                                    <input type="date" class="form-control" name="copyright_date" id="copyright_date" placeholder="Copyright Date" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Location *</label> 
                                                    <input type="text" class="form-control" name="location" id="location" placeholder="Location" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Category * </label>
                                                    <input type="text" class="form-control" name="category" id="category" placeholder="Category" readonly>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-6"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Available * </label>
                                                    <input type="text" class="form-control" name="available" id="available" placeholder="Available" readonly>
                                                </div> 
                                            </div>
                                            <div class="col-md-6"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Unvailable * </label>
                                                    <input type="text" class="form-control numOnly" id="unavailable" name="unavailable" placeholder="Unvailable" readonly> 
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="row d-none"> 
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Status * </label>
                                                    <input type="text" class="form-control" name="status" id="status" placeholder="Status" readonly>
                                                </div> 
                                            </div>
                                        </div>
                                        <!-- Other Fields -->
                                        <input type="hidden" id="book_id" name="book_id"> 
                                    </div>
                                    <div class="modal-footer"> 
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
                <?php $this->load->view('Student/common/footer');?>
                
            </div>
            <!-- End Right content here -->
        </div>
        <!-- END wrapper -->
        <?php $this->load->view('Student/common/js');?>
        <script>
            $(document).ready(function() {
                $('#collectionsTable').DataTable({
                    "order": [[ 6, "desc" ]]
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