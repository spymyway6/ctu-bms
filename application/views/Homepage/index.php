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
                    'name' => 'JILLIAN PRACUELLES',
                    'description' => "Jillian is a detail-oriented Librarian who also serves as an Assistant Tester. With a passion for ensuring quality library services, she meticulously tests systems, resources, and processes to guarantee optimal functionality and user satisfaction. Jillian's dedication contributes to a seamless and satisfying library experience for all patrons.",
                    'position' => 'LIBRARIAN',
                ),
                array(
                    'id' => 2,
                    'img' => base_url().'assets/front-office/img/bg-img/ctu-personnel/user2.jpg',
                    'name' => 'BLISSY SUNIT',
                    'description' => "Blissy is a diligent Librarian who also serves as a Quality Assurance Tester. With meticulous attention to detail, she ensures that library systems, resources, and services meet the highest standards of functionality and user experience. Blissy's dedication contributes to a seamless and satisfying library experience for all patrons.",
                    'position' => 'LIBRARIAN',
                ),
                array(
                    'id' => 3,
                    'img' => base_url().'assets/front-office/img/bg-img/ctu-personnel/user3.jpg',
                    'name' => 'MAY V. ANCAJAS',
                    'description' => "May is a skilled College Librarian, devoted to facilitating academic success. With an extensive knowledge of literature and excellent organizational abilities, she manages the library's resources effectively.",
                    'position' => 'COLLEGE LIBRARIAN',
                ),
                array(
                    'id' => 4,
                    'img' => base_url().'assets/front-office/img/bg-img/ctu-personnel/user4.jpg',
                    'name' => 'JOHN CLOYD S. ROSIOS',
                    'description' => "John Cloyd is a highly skilled Librarian who has made significant contributions as the developer of the CTU library system. With a deep understanding of library operations and technology, he has created an advanced system that optimizes resource management, enhances user experience, and promotes seamless information retrieval. John's expertise has revolutionized the way patrons interact with the library's vast collection.",
                    'position' => 'LIBRARIAN',
                ),
                array(
                    'id' => 5,
                    'img' => base_url().'assets/front-office/img/bg-img/ctu-personnel/user5.jpg',
                    'name' => 'MERCEDES CANDOL CEPEDA',
                    'description' => "Mercedes is a versatile Librarian with a unique role as a Quality Assurance Tester. Combining her love for libraries with meticulous attention to detail, she ensures that library systems and resources meet high standards of functionality and user-friendliness. Mercedes' dedication guarantees a seamless and enriching experience for library patrons.",
                    'position' => 'LIBRARIAN',
                ),
                array(
                    'id' => 6,
                    'img' => base_url().'assets/front-office/img/bg-img/ctu-personnel/user6.jpg',
                    'name' => 'YVONIE ROSELL',
                    'description' => "Yvonie is a dynamic Librarian and Assistant Developer, combining her passion for libraries with technological expertise. With a deep understanding of library systems and programming, she plays a pivotal role in optimizing digital resources and enhancing user experience.",
                    'position' => 'LIBRARIAN',
                ),
                array(
                    'id' => 7,
                    'img' => base_url().'assets/front-office/img/bg-img/ctu-personnel/user7.jpg',
                    'name' => 'NESTOR A. AUMAN',
                    'description' => "Nestor is a diligent Librarian Clerk who assists in the smooth operation of the library. With meticulous attention to detail and a strong sense of organization, Nestor efficiently manages administrative tasks and helps patrons with basic inquiries. Their dedication contributes to an orderly and welcoming library experience.",
                    'position' => 'LIBRARY CLERK',
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
