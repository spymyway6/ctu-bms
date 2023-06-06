<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('Homepage/common/css'); ?>
<body>

	<?php $this->load->view('Homepage/common/header'); ?>
	
    <section class="page-header">
        <div class="container">
            <h1>Collections</h1>
        </div>
    </section>

    <section class="page-content school-collections">
        <div class="container">
            <div class="school-collections-container">
                <div class="collecton-wrapper">
                    <ul>
                        <?php foreach($collections as $col){ ?>
                            <?php $available = $col['quantity'] - $col['unavailable']; ?>
                            <li>
                                <div class="col-items">
                                    <?php $book_img = ($col['book_image']) ? base_url().'assets/uploads/books/'.$col['book_image'] : base_url().'assets/uploads/default.png';?>
                                    <div class="book-img" style="background-image: url('<?=$book_img;?>')">
                                        <?=($available) ? '<span class="available-badge bg-success">Available</span>' : '<span class="available-badge bg-danger">Unavailable</span>'; ?>
                                    </div>
                                    <div class="col-content">
                                        <h3><?=$col['book_name'];?></h3>
                                        <div class="book-detail">
                                            <div class="bditem"><i class="fa fa-user"></i>Author: <?=$col['author'];?></div>
                                            <div class="bditem"><i class="fa fa-book"></i>AN.: <?=$col['accession_no'];?></div>
                                        </div>
                                        <p class="desc">The title of the book is "<?=$col['book_name'];?>" with it's author <?=$col['author'];?>. The <?=$col['edition'];?> book published on <?=date('M d, Y', strtotime($col['publish_date']));?>.</p>
                                    </div>
                                    <div class="col-footer">
                                        <span class="col-cat"><i class="fa fa-tag"></i> Category: <?=$col['category_name'];?></span>
                                        <a href="javascript:;" class="col-btn-view" onclick="viewCollectionDetails(<?=$col['id']; ?>)">View Collection</a>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>

                <!-- Modal -->
                <div id="viewBooks" class="modal fade view-books-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg"> 
                        <div class="modal-content"> 
                            <div class="modal-body" id="view-collection-details"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button> 
                            </div> 
                        </div> 
                    </div>
                </div><!-- /.modal -->
                <!-- Modals Here -->
                
            </div>
        </div>
    </section>

	<!-- About Us Area End -->
	
    <!-- Footer Area Start -->
    <?php $this->load->view('Homepage/common/footer'); ?>
    <!-- Footer Area End -->

    <!-- **** All JS Files ***** -->
	<?php $this->load->view('Homepage/common/js'); ?>

</body>

</html>
