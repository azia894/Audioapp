
<link href="<?=base_url('assets')?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?=base_url('assets')?>/css/jquery-ui.min.css" rel="stylesheet" type="text/css">

<script src="<?=base_url('assets')?>/js/bootstrap.min.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
<script src="<?php echo base_url(); ?>assets/js/jquery-2.2.4.min.js"></script>

<div class="container">
    <h1>Ajax Pagination in CodeIgniter Framework</h1>
    <div class="row">
       <div class="post-list" id="postList">
         <div class="loading" style="display: none;"><div class="content"><img src="<?php echo base_url().'assets/images/loadingimage.gif'; ?>"/></div></div>
            <?php if(!empty($posts)): foreach($posts as $post): ?>
                <div class="list-item"><a href="javascript:void(0);"><h2><?php echo $post['bk_name']; ?></h2></a></div>
            <?php endforeach; else: ?>
            <p>Post(s) not available.</p>
            <?php endif; ?>
            <?php echo $this->ajax_pagination->create_links(); ?>
        </div>
       
    </div>
</div>
<style>



</style>