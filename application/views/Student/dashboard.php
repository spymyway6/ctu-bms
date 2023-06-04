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
                        <!-- Widgets -->
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-my-library-books text-primary"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?=$count_request['count_books']?></h2>
                                    <div class="text-muted m-t-5">Total Collections</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-book text-pink"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?=$count_request['count_pending']?></h2>
                                    <div class="text-muted m-t-5">Total Pending</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-book text-info"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?=$count_request['count_borrowed']?></h2>
                                    <div class="text-muted m-t-5">Total Borrowed Books</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-access-alarms text-danger"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?=$count_request['count_expired']?></h2>
                                    <div class="text-muted m-t-5">Expired</div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->
                               
                </div> <!-- content -->
                <?php $this->load->view('Student/common/footer');?>
                
            </div>
            <!-- End Right content here -->
        </div>
        <!-- END wrapper -->
        <?php $this->load->view('Student/common/js');?>
        <script>
            $(document).ready(function() {
                $('#memberTbl').DataTable({
                    "order": [[ 7, "desc" ]]
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