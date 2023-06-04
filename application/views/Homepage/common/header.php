
<!-- Preloader -->
<!-- <div id="preloader">
	<div class="loader"></div>
</div> -->
<!-- /Preloader -->

<!-- Top Search Form Area -->
<div class="top-search-area">
	<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<!-- Close -->
					<button type="button" class="btn close-btn" data-dismiss="modal"><i class="ti-close"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Header Area Start -->
<header class="header-area">
<!-- Main Header Start -->
	<div class="main-header-area">
		<div class="classy-nav-container breakpoint-off">
			<div class="container">
				<!-- Classy Menu -->
				<nav class="classy-navbar justify-content-between custom-header" id="alimeNav">

					<!-- Logo -->
					<a class="nav-brand" href="<?=base_url();?>">
						<div class="nav-logo"><img src="<?=base_url();?>assets/front-office/img/core-img/logo.png" alt=""></div>
                        <span>CTU-BMS</span>
					</a>

					<!-- Navbar Toggler -->
					<div class="classy-navbar-toggler">
						<span class="navbarToggler"><span></span><span></span><span></span></span>
					</div>

					<!-- Menu -->
					<div class="classy-menu">
						<!-- Menu Close Button -->
						<div class="classycloseIcon">
							<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
						</div>
						<!-- Nav Start -->
						<div class="classynav">
							<ul id="nav">
								<li class="<?=$is_page == "homepage" ? 'active' : ''?>"><a href="<?=base_url();?>">Home</a></li>
								<li><a href="javascript:;">Library Collection</a>
									<ul class="dropdown">
										<li><a href="javascript:;">Collection</a></li>
										<li><a href="javascript:;">New Aquisition</a></li>
									</ul>
								</li>
								<li class="<?=$is_page == "general_rules" ? 'active' : ''?>"><a href="javascript:;">Library Policies</a>
									<ul class="dropdown">
										<li><a href="<?=base_url();?>/general-rules">General Rules</a></li>
										<li><a href="<?=base_url();?>/borrowing-policy">Borrowing Policy</a></li>
									</ul>
								</li>
								<li><a href="<?=$is_page == "circulation_services" ? 'active' : ''?>">Library Services</a>
									<ul class="dropdown">
										<li><a href="<?=base_url();?>/circulation-services">Circulation Service</a></li>
										<li><a href="<?=base_url();?>/library-orientation">Library Orientation and Instruction</a></li>
										<li><a href="<?=base_url();?>/document-delivery">Document Delivery (DD)</a></li>
										<li><a href="<?=base_url();?>/inter-library">Inter-Library/Referral Services</a></li>
										<li><a href="<?=base_url();?>/information-services">REFERENCE & INFORMATION Services</a></li>
										<li><a href="<?=base_url();?>/printing-services">Scanning, Photocopy and Printing Services</a></li>
										<li><a href="<?=base_url();?>/internet-access">Internet Access Services</a></li>
										<li><a href="javascript:;">Research Extension</a></li>
									</ul>
								</li>
								<li><a href="<?=base_url();?>">FAQs</a></li>
								<li><a href="<?=base_url();?>login">Login</a></li>
							</ul>
						</div>
						<!-- Nav End -->
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>
<!-- Header Area End -->
