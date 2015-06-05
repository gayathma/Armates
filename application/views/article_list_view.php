<?php
$articles_images_service = new Article_images_service();
foreach ($results as $value) {
    $image = $articles_images_service->get_main_image_for_article($value->id);
    ?>
    <?php
    if (!empty($image)) {
        ?>
        <div class="element  clearfix <?php echo $value->css_class; ?> home <?php echo strtolower($value->category_name); ?> photography">
            <a href="<?php echo site_url(); ?>/home/article_detail/<?php echo $value->id; ?>" title="">
                <figure class="images"> <img src="<?php echo base_url(); ?>uploads/articles/ar_<?php echo $value->id; ?>/<?php echo $image->image_path; ?>" alt="<span><?php echo $value->title; ?></span><i>→</i>" class="slip" /> </figure>
            </a>
        </div>
        <?php
    } else if (!empty($value->video_link)) {
        ?>
        <div class="element  clearfix <?php echo $value->css_class; ?> home  <?php echo strtolower($value->category_name); ?> grey"> <a href="<?php echo $value->video_url; ?>" data-title="<?php echo $value->title; ?>" class="video-popup whole-tile">
                <p class="small"><?php echo $value->category_name; ?></p>
                <h3><?php echo $value->title; ?></h3>
                <div class="bottom">
                    <div class="icons video"></div>
                    <p class="alignleft">Play the Video</p>
                    <span class="arrow">→</span></div>
            </a> 
        </div>
        <?php
    } else {
        ?>
        <div class="element  clearfix <?php echo $value->css_class; ?> home <?php echo strtolower($value->category_name); ?> grey"> <a href="<?php echo site_url(); ?>/home/article_detail/<?php echo $value->id; ?>" data-title="" class="whole-tile">
                <p class="small"><?php echo $value->category_name; ?></p>
                <h3><?php echo $value->title; ?></h3>
                <div class="bottom">
                    <div class="icons like"></div>
                    <p class="alignleft">Follow Us</p>
                    <span class="arrow">→</span></div>
            </a> </div>
        <?php
    }
}
?>