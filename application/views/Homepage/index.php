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
        <?php 
            $personnel = array(
                array(
                    'id' => 1,
                    'img' => base_url().'assets/front-office/img/bg-img/ctu-personnel/user1.jpg',
                    'name' => 'Personnel 1',
                    'email' => 'Personnel@yopmail.com',
                    'address' => 'Liloan, Cebu',
                    'department' => 'BSIT',
                ),
                array(
                    'id' => 2,
                    'img' => base_url().'assets/front-office/img/bg-img/ctu-personnel/user2.jpg',
                    'name' => 'Blissy Sunit',
                    'email' => 'blissy@gmail.com',
                    'address' => 'Liloan, Cebu',
                    'department' => 'BSIT',
                ),
                array(
                    'id' => 3,
                    'img' => base_url().'assets/front-office/img/bg-img/ctu-personnel/user3.jpg',
                    'name' => 'Librarian Name',
                    'email' => 'Librarian@yopmail.com',
                    'address' => 'Basak Mandaue',
                    'department' => 'BSIT',
                ),
                array(
                    'id' => 4,
                    'img' => base_url().'assets/front-office/img/bg-img/ctu-personnel/user4.jpg',
                    'name' => 'John Cloyd S. Rosios',
                    'email' => 'jcboy0923@gmail.com',
                    'address' => 'Tabok-lamac, Yati, Lilo-an, Cebu',
                    'department' => 'BSIT',
                ),
                array(
                    'id' => 5,
                    'img' => base_url().'assets/front-office/img/bg-img/ctu-personnel/user5.jpg',
                    'name' => 'Mercedes Cepeda',
                    'email' => 'Mercedes@gmail.com',
                    'address' => 'Basak Mandaue City',
                    'department' => 'BSIT',
                ),
                array(
                    'id' => 6,
                    'img' => base_url().'assets/front-office/img/bg-img/ctu-personnel/user6.jpg',
                    'name' => 'Jillian Empis Pracuelles',
                    'email' => 'Jillian@gmail.com',
                    'address' => 'Tabok-lamac, Yati, Lilo-an, Cebu',
                    'department' => 'BSIT',
                ),
            );
        ?>

        <div class="box4">
            <?php foreach($personnel as $person){ ?>
                <span style="--i:<?=$person['id'];?>" onclick="viewPersonnelDetails(<?=$person['id'];?>)">
                    <textarea class="d-none" id="personnel-id-<?=$person['id'];?>"><?=json_encode($person);?></textarea>
                    <img src="<?=$person['img'];?>" alt="<?=$person['name'];?>">
                </span>
            <?php } ?>
        </div>

        <!-- Modal -->
        <div id="personnelModal" class="modal fade view-books-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg"> 
                <div class="modal-content"> 
                    <div class="modal-body" id="view-personnel-details"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button> 
                    </div> 
                </div> 
            </div>
        </div><!-- /.modal -->
        <!-- Modals Here -->
    </div>	

	<!-- About Us Area End -->
	
    <!-- Footer Area Start -->
    <?php $this->load->view('Homepage/common/footer'); ?>
    <!-- Footer Area End -->

    <!-- **** All JS Files ***** -->
	<?php $this->load->view('Homepage/common/js'); ?>

</body>

</html>
