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
                                    <h4 class="m-t-0 header-title"><b>History of Collections</b></h4>
                                    <p class="text-muted m-b-30 font-13">
                                        List of all the history of borrowed collections.
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
                                                    <th>Request Date</th>
                                                    <th>Return Date</th>
                                                    <th>Request Type</th>
                                                    <th>Status</th>
                                                    <th>Available</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($history as $col){ ?>
                                                    <?php $available = $col['quantity'] - $col['unavailable']; ?>
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
                                                        <td><?=$col['category_name']?></td>
                                                        <td><?=date('M d, Y', strtotime($col['created_at'])); ?></td>
                                                        <td><?=($col['return_date']) ? date('M d, Y', strtotime($col['return_date'])) : '-'; ?></td>
                                                        <td class="text-center"><?=($col['request_type'] == 1) ? '<span class="badge badge-info">Borrow</span>' : '<span class="badge badge-primary">Reserve</span>'; ?></td>
                                                        <td class="text-center">
                                                            <?=($col['request_status'] == 1) ? '<span class="badge badge-success">Approved</span>' : (
                                                                ($col['request_status'] == 2) ? '<span class="badge badge-danger">Decline</span>' : (
                                                                    ($col['request_status'] == 3) ? '<span class="badge badge-primary">Returned</span>' : '<span class="badge badge-warning">Pending</span>'
                                                                )
                                                            )?>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="available-status">
                                                                <?=($available) ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>'?>
                                                                <p>
                                                                    <span class="text-primary">Available: <b><?=$available; ?></b></span>
                                                                    <span class="text-danger">Unavailable: <b><?=$col['unavailable']; ?></b></span>
                                                                    <span class="text-inverse"><b>Total: <?=$col['quantity']; ?></b></span>
                                                                </p>
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
                    "order": [[ 5, "desc" ]]
                });
                $('.image-popup').magnificPopup({
                    type: 'image',
                    closeOnContentClick: true,
                    mainClass: 'mfp-fade',
                    gallery: {
                        enabled: true,
                        navigateByImgClick: true,
                        preload: [0,1]
                    }
                });
            });
        </script>
	</body>
</html>