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
                                    <h2 class="m-0 text-dark counter font-600"><?=$count_request['count_books']?></h2>
                                    <div class="text-muted m-t-5">Total Collections</div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="widget-panel widget-style-2 bg-white">
                                    <i class="md md-account-child text-pink"></i>
                                    <h2 class="m-0 text-dark counter font-600"><?=$count_request['count_users']?></h2>
                                    <div class="text-muted m-t-5">Total Users</div>
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

                        <!-- Latest Transactions -->
                        <div class="row">
                            <div class="col-md-12">
                            <div class="card-box">
									<h4 class="m-t-0 m-b-20 header-title"><b>Last Transactions</b></h4>

									<div class="nicescroll mx-box" tabindex="5001" style="overflow: hidden; outline: none;">
                                        <ul class="list-unstyled transaction-list m-r-5">
                                            <?php if($latest_transactions){ ?>
                                                <?php foreach($latest_transactions as $lt){ ?>
                                                    <li>
                                                        <i class="ti-upload text-success"></i>
                                                        <span class="tran-text"><?=$lt['firstname']?> <?=$lt['lastname']?> - <?=$lt['book_name']?></span>
                                                        <span class="pull-right text-success tran-price">Borrow</span>
                                                        <span class="pull-right text-muted"><?=date('M d, Y', strtotime($lt['created_at']))?></span>
                                                        <span class="clearfix"></span>
                                                    </li>
                                                <?php } ?>
                                            <?php }else{ ?>
                                                <li>
                                                    <i class="ti-check text-success"></i>
                                                    <span class="tran-text">No latest transactions at this time</span>
                                                    <span class="pull-right text-success tran-price">Empty</span>
                                                    <span class="pull-right text-muted"><?=date('M d, Y')?></span>
                                                    <span class="clearfix"></span>
                                                </li>
                                            <?php } ?>

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