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
                                    <a href="javascript:;" class="btn btn-success waves-effect waves-light btn-sm pull-right" onclick="addNewCategory()"><i class="fa fa-plus"></i> Add Category</a>

                                    <h4 class="m-t-0 header-title"><b>Category Lists</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        Lists of all the book's category.
                                    </p>
                                    <div class="tbl-responsive">
                                        <table id="categoryTable" class="table table-hover table-bordered table-actions-bar m-b-0">
                                            <thead>
                                                <tr>
                                                    <th>Category ID</th>
                                                    <th>Category Name</th>
                                                    <th>Category Status</th>
                                                    <th>Date Added</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($categories as $col){ ?>
                                                    <tr>
                                                        <td><?=$col['category_id']?></td>
                                                        <td><?=$col['category_name']?></td>
                                                        <td class="text-center"><?=($col['category_status'] == 1) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>'; ?></td>
                                                        <td><?=date('M d, Y', strtotime($col['created_at']))?></td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <button type="button" onclick="editCategory(<?=$col['category_id']?>)" class="btn btn-warning waves-effect waves-light btn-sm"><i class="ti-pencil"></i> Edit</button>
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
                    <div id="addNewCategoryModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-lg"> 
                            <div class="modal-content"> 
                                <div class="modal-header"> 
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                    <h4 class="modal-title" id="form-title"><i class="fa fa-user-plus"></i> Add New Category</h4> 
                                </div> 
                                <form action="javascript:;" data-parsley-validate novalidate method="POST" enctype="multipart/form-data" id="addNewCategoryForm">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Category Name *</label> 
                                                    <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Category Name" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-12"> 
                                                <div class="form-group"> 
                                                    <label for="field-1" class="control-label">Status * </label>
                                                    <select name="category_status" id="category_status" class="form-control">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div> 
                                            </div>
                                        </div>
                                        <!-- Other Fields -->
                                        <input type="hidden" id="category_id" name="category_id">
                                    </div>
                                    <div class="modal-footer"> 
                                        <button type="button" class="btn btn-success waves-effect waves-light saveBtn" onclick="saveCategory(this)"><i class="fa fa-save"></i> Save</button> 
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
                $('#categoryTable').DataTable({
                    "order": [[ 1, "asc" ]]
                });
            });
        </script>
	</body>
</html>