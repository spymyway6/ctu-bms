<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('Homepage/common/css'); ?>
<body>

	<?php $this->load->view('Homepage/common/header'); ?>

    <!-- Welcome Area Start -->
    <?php $this->load->view('Homepage/common/banner'); ?>
    <!-- Welcome Area End -->
	
	<!-- Latest Blogs Area Start -->
	<div class="xs-img xs-overlay" style="background-image: url(<?=base_url();?>assets/front-office/img/bg-img/bg4.jpg);">
    <div class="about-us-area section-padding-80-0 clearfix">  	
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                    <div class="about-us-content mb-80">
						
                        <div class="row mt-5">
							<!-- Single Blog Area -->
							<div class="col-lg-3 col-sm-6 col-xs-12">
								<div class="single-post-area">
									<!-- Post Thumbnail -->
									<a href="#" class="post-thumbnail"><img src="<?=base_url();?>assets/front-office/img/bg-img/Vission.jpg" alt=""></a>
									<!-- Post Conetent -->
									<div class="post-content">
										<a href="#" class="post-title">Vission</a>
									</div>
								</div>
							</div>



							<!-- Single Blog Area -->
							<div class="col-lg-3 col-sm-6 col-xs-12">
								<div class="single-post-area">
									<!-- Post Thumbnail -->
									<a href="#" class="post-thumbnail"><img src="<?=base_url();?>assets/front-office/img/bg-img/Mission.jpg" alt=""></a>
									<!-- Post Catagory -->
								
									<div class="post-content">
										<a href="#" class="post-title">Mission</a>
									</div>

								</div>
							</div>
							<!-- Single Blog Area -->
							<div class="col-lg-3 col-sm-6 col-xs-12">
								<div class="single-post-area">
									<!-- Post Thumbnail -->
									<a href="#" class="post-thumbnail"><img src="<?=base_url();?>assets/front-office/img/bg-img/Goals.jpg" alt=""></a>
									<div class="post-content">
										<a href="#" class="post-title">GOALS</a>
									</div>
								</div>
							</div>

							<!-- Single Blog Area -->
							<div class="col-lg-3 col-sm-6 col-xs-12">
								<div class="single-post-area">
									<!-- Post Thumbnail -->
									<a href="#" class="post-thumbnail"><img src="<?=base_url();?>assets/front-office/img/bg-img/Outcomes.jpg" alt=""></a>
									<div class="post-content">
										<a href="#" class="post-title">OUTCOME</a>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



<div class="linebar2">
	<h1 class="wow fadeInUp" data-wow-delay="100ms">LIBRARY PERSONNEL</h1>
</div>

<div class="sec_img4">
				<h1 class="animate-charcter" >CTU LIBRARY PERSONNEL</h1>
			<div class="box4">				
				<span style="--i:1;"><img src="<?=base_url();?>assets/front-office/img/bg-img/user1.jpg" alt=""></span>
				<span style="--i:2;"><img src="<?=base_url();?>assets/front-office/img/bg-img/user2.jpg" alt=""></span>
				<span style="--i:3;"><img src="<?=base_url();?>assets/front-office/img/bg-img/user3.jpg" alt=""></span>
				<span style="--i:4;"><img src="<?=base_url();?>assets/front-office/img/bg-img/user5.jpg" alt=""></span>
				<span style="--i:5;"><img src="<?=base_url();?>assets/front-office/img/bg-img/user6.jpg" alt=""></span>
				
			</div>
</div>	

	<!-- About Us Area End -->
	
    <!-- Footer Area Start -->
    <?php $this->load->view('Homepage/common/footer'); ?>
    <!-- Footer Area End -->

    <!-- **** All JS Files ***** -->
	<?php $this->load->view('Homepage/common/js'); ?>

</body>

</html>
