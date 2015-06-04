
<div id="menu-close-button">&times;</div>
<ul id="options" class="option-set clearfix" data-option-key="filter">
    <li class="selected"> <a href="#home">Home</a> </li>
    <li> <a href="#portfolio" class="sub-nav-toggle">Portfolio</a>
        <ul class="sub-nav hidden">
            <?php
            foreach ($cats as $cat) {
                ?>
            <li> <a href="<?php echo site_url(); ?>/home#<?php echo strtolower($cat->name); ?>"><?php echo ucfirst($cat->name); ?></a> </li>
                <?php
            }
            ?>
        </ul>
    </li>
    <li> <a href="#services">Services</a> </li>
    <li> <a href="#about">About</a> </li>
    <li> <a href="#blog">Blog</a> </li>
    <li> <a href="#contact">Contact</a> </li>
</ul>

<div class="social-links">
    <ul class="social-list clearfix">
        <li> <a href="#" class="pinterest"></a> </li>
        <li> <a href="#" class="twitter"></a> </li>
        <li> <a href="#" class="gplus"></a> </li>
        <li> <a href="#" class="facebook"></a> </li>
    </ul>
</div>