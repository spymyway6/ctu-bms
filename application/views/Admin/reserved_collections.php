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
                                    <h4 class="m-t-0 header-title"><b>Approval of Reserved Collection</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        List of all your the books inside the library.
                                    </p>
                                    <div class="tbl-responsive">
                                        <table id="collectionsTable" class="table table-hover table-bordered table-actions-bar m-b-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Image</th>
                                                    <th>Accession No.</th>
                                                    <th>Student Name</th>
                                                    <th>Book Name</th>
                                                    <th>Category</th>
                                                    <th>Date Borrowed</th>
                                                    <th>Return Date</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($reserved_collections as $col){ ?>
                                                    <tr>
                                                        <td>
                                                            <a href="<?=($col['book_image']) ? base_url().'assets/uploads/books/'.$col['book_image'] : base_url().'assets/uploads/default.png';?>" class="image-popup">
                                                                <div class="tbl-img">
                                                                    <img src="<?=($col['book_image']) ? base_url().'assets/uploads/books/'.$col['book_image'] : base_url().'assets/uploads/default.png';?>" alt="Book Image">
                                                                </div>
                                                            </a>
                                                        </td>
                                                        <td><?=$col['accession_no']?></td>
                                                        <td><?=$col['firstname']?> <?=$col['lastname']?></td>
                                                        <td><?=$col['book_name']?></td>
                                                        <td><?=$col['category']?></td>
                                                        <td><?=date('M d, Y', strtotime($col['created_at']))?></td>
                                                        <td><?=date('M d, Y', strtotime($col['expiry_date']))?></td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light btn-sm" data-toggle="dropdown" aria-expanded="false">Options <span class="caret"></span></button>
                                                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                                    <li><a href="javascript:;" onclick="markAsBorrowed(<?=$col['issue_id']?>, <?=$col['id']?>, <?=$col['available']?>, <?=$col['unavailable']?>)">Mark as Borrowed</a></li>
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
                    <div id="addNewCollectionModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg"> 
                            <div class="modal-content"> 
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                    <h4 class="modal-title" id="form-title"><i class="fa fa-user-plus"></i> Add New Collection</h4> 
                                </div> 
                                <form action="<?=base_url();?>admin/add_this_member" data-parsley-validate novalidate method="POST" enctype="multipart/form-data" id="addNewCollectionForm">
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
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Book Name *</label> 
                                                    <input type="text" class="form-control" name="book_name" id="book_name" placeholder="Book Name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Accession No. *</label> 
                                                    <input type="text" class="form-control numOnly" name="accession_no" id="accession_no" placeholder="Accession No" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Author *</label> 
                                                    <input type="text" class="form-control" name="author" id="author" placeholder="Author" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="field-2" class="control-label">Other Author *</label>
                                                    <input type="text" class="form-control" name="other_author" id="other_author" placeholder="Other Author" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Edition *</label> 
                                                    <input type="text" class="form-control" name="edition" id="edition" placeholder="Edition" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Date Published *</label> 
                                                    <input type="date" class="form-control" name="publish_date" id="publish_date" placeholder="Date Published" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Copyright Date *</label> 
                                                    <input type="date" class="form-control" name="copyright_date" id="copyright_date" placeholder="Copyright Date" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Location *</label> 
                                                    <input type="text" class="form-control" name="location" id="location" placeholder="Location" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-9"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Category * </label>
                                                    <select name="category" id="category" class="form-control">
                                                        <option value="Autobiography">Autobiography  </option>
                                                        <option value="Biography">Biography </option>
                                                        <option value="Cooking">Cooking  </option>
                                                        <option value="Art & Photography">Art & Photography</option>
                                                        <option value="Personal Development">Personal Development </option>
                                                        <option value="Detective & Mystery">Detective & Mystery</option>
                                                        <option value="History">History</option>
                                                        <option value="Crafts, Hobbies & Home">Crafts, Hobbies & Home </option>
                                                        <option value="Families & Relationships">Families & Relationships</option>
                                                        <option value="Humor & Entertainment">Humor & Entertainment</option>
                                                        <option value="Business & Money">Business & Money</option>
                                                    </select>
                                                </div> 
                                            </div>
                                            <div class="col-md-3"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Quantity * </label>
                                                    <input type="text" class="form-control numOnly" id="quantity" name="quantity" placeholder="Quantity" required> 
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
                                        <input type="hidden" id="book_id" name="book_id"> 
                                        <input type="hidden" id="available" name="available"> 
                                        <input type="hidden" id="unavailable" name="unavailable"> 
                                    </div>
                                    <div class="modal-footer"> 
                                        <button type="button" class="btn btn-success waves-effect waves-light saveBtn" onclick="saveCollection(this)"><i class="fa fa-user-plus"></i> Save</button> 
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