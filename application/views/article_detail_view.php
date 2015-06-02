
<div class="element clearfix col3-3 home">
    <?php
    foreach ($article_images as $article_image) {
        ?>
        <a href="<?php echo base_url(); ?>uploads/articles/ar_<?php echo $article->id; ?>/<?php echo $article_image->image_path; ?>" data-title="<?php echo $article->title; ?>" data-fancybox-group="group1" class="popup">
            <figure class="images"> <img src="<?php echo base_url(); ?>uploads/articles/ar_<?php echo $article->id; ?>/<?php echo $article_image->image_path; ?>" alt="" />
            </figure>
        </a>
        <div class="break"></div>
        <?php
    }
    ?>
</div>
<div class="element clearfix col1-3 home grey auto">
    <h3><strong><?php echo $article->title; ?></strong></h3>
    <div class="ct-part">
        <p class="small">Category</p>
        <p><?php echo $article->category_name; ?></p>
        <p class="small">Date</p>
        <p><?php echo date('F d, Y ',strtotime($article->added_date)); ?></p>
        <p class="small">Client</p>
        <p><?php echo $article->client; ?></p>
    </div>
    <div class="ft-part">
        <ul class="social-list">
            <li><i>Share it:</i></li>
            <li><a href="#" class="git"></a></li>
            <li><a href="#" class="pinterest"></a></li>
            <li><a href="#" class="instagram"></a></li>
            <li><a href="#" class="dribbble"></a></li>
            <li><a href="#" class="twitter"></a></li>
        </ul>
    </div>
</div>
<div class="element clearfix col1-3 home grey auto">
    <h4><strong>Challenge</strong></h4>
    <p><?php echo $article->challenge; ?></p>
</div>
<div class="element clearfix col1-3 home grey auto">
    <h4><strong>Solution</strong></h4>
    <p><?php echo $article->solution; ?> </p>

</div>
<div class="element clearfix col1-3 home grey auto">
    <h4><strong>Result</strong></h4>
    <p><?php echo $article->result; ?></p>
</div>
<?php if ($article->description != '') { ?>
    <div class="element  clearfix col1-3 home grey auto">
        <div class="icon-holder quote"></div>
        <blockquote>
            <p><?php echo $article->description; ?></p>
            <!--<p class="small">Jessica Max, CEO</p>-->
        </blockquote>
    </div>
<?php } ?>
<div class="element  clearfix col1-3 home"> <a href="#" title="">
        <figure class="images"> <img src="images/work07.jpg" alt="Previous<span>Invitation Greeting Card</span><i>â†’</i>" class="slip" /> </figure>
    </a> </div>
<div class="element  clearfix col1-3 home"> <a href="#" title="">
        <figure class="images"> <img src="images/work04.jpg" alt="Next<span>Square Magazine</span><i>â†’</i>" class="slip" /> </figure>
    </a> </div>
<div class="element clearfix col1-3 home grey back-button"><a href="index-2.html#portfolio" title="" class="whole-tile">
        <h5>Back to Portfolio<span class="arrow">â†’</span></h5>
    </a>
</div>