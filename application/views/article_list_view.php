<?php
foreach ($results as $value) {
    ?>
    <?php if ($value->image_path != '') { ?>
        <div class="element  clearfix col1-3 home portfolio photography">
            <a href="<?php echo site_url();?>/home/article_detail/<?php echo $value->id; ?>" title="">
                <figure class="images"> <img src="<?php echo base_url(); ?>uploads/articles/ar_<?php echo $value->id; ?>/<?php echo $value->image_path; ?>" alt="<span><?php echo $value->title; ?></span><i>→</i>" class="slip" /> </figure>
            </a>
        </div>
        <?php
    } else {
        ?>
        <div class="element  clearfix col1-3 home grey"> <a href="http://player.vimeo.com/video/98330466?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff=0&amp;autoplay=1" data-title="<?php echo $value->title; ?>" class="video-popup whole-tile">
                <p class="small"><?php echo $value->category_name; ?></p>
                <h3><?php echo $value->title; ?></h3>
                <div class="bottom">
                    <div class="icons video"></div>
                    <p class="alignleft">Play the Video</p>
                    <span class="arrow">→</span></div>
            </a> 
        </div>
        <?php
    }
}
?>