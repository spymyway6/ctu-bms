<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('Homepage/common/css'); ?>
<body>

    <?php $this->load->view('Homepage/common/header'); ?>
    
    <section class="page-header">
        <div class="container">
            <h1><?=$page['page_name']?></h1>
        </div>
    </section>

    <section class="page-content">
        <div class="container">
            <p><?=$page['page_content']?></p>
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
