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
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-my-library-books text-primary"></i>
                                    <h2 class="m-0 text-dark counter font-600">50568</h2>
                                    <div class="text-muted m-t-5">Total Collections</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-account-child text-pink"></i>
                                    <h2 class="m-0 text-dark counter font-600">1256</h2>
                                    <div class="text-muted m-t-5">Total Students</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-book text-info"></i>
                                    <h2 class="m-0 text-dark counter font-600">18</h2>
                                    <div class="text-muted m-t-5">Total Borrowed Books</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-access-alarms text-danger"></i>
                                    <h2 class="m-0 text-dark counter font-600">8564</h2>
                                    <div class="text-muted m-t-5">Expired</div>
                                </div>
                            </div>
                        </div>

                        <!-- Latest Transactions -->
                        <div class="row">
                            <div class="col-md-12">
                            <div class="card-box">
									<h4 class="m-t-0 m-b-20 header-title"><b>Last Transactions</b></h4>

									<div class="nicescroll mx-box" tabindex="5001" style="overflow: hidden; outline: none;">
                                        <ul class="list-unstyled transaction-list m-r-5">
                                            <li>
                                                <i class="ti-upload text-success"></i>
                                                <span class="tran-text">Merz - Book Name</span>
                                                <span class="pull-right text-success tran-price">Returned</span>
                                                <span class="pull-right text-muted">07/09/2023</span>
                                                <span class="clearfix"></span>
                                            </li>
                                            <li>
                                                <i class="ti-download text-danger"></i>
                                                <span class="tran-text">John Loyd - Book Name</span>
                                                <span class="pull-right text-danger tran-price">Borrowed</span>
                                                <span class="pull-right text-muted">07/09/2023</span>
                                                <span class="clearfix"></span>
                                            </li>


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