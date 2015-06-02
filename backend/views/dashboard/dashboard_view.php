<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Dashboard
                <span class="tools pull-right">
                    <a href="javascript:;" class="fa fa-chevron-down"></a>
                    <a href="javascript:;" class="fa fa-times"></a>
                </span>
            </header>
            <div class="panel-body">
                <!--state overview start-->
                <div class="row state-overview">
<!--                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                            <div class="symbol terques">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="value">
                                <h1 class="count">
                                    <?php echo $reg_user_count; ?>
                                </h1>
                                <p>New Users</p>
                            </div>
                        </section>
                    </div>-->
<!--                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                            <div class="symbol red">
                                <i class="fa fa-flag-o"></i>
                            </div>
                            <div class="value">
                                <h1 class=" count2">
                                    <?php echo $pending_count; ?>
                                </h1>
                                <p>Pending Advertisements</p>
                            </div>
                        </section>
                    </div>-->
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                            <div class="symbol yellow">
                                <i class="fa fa-picture-o"></i>
                            </div>
                            <div class="value">
                                <h1 class=" count3">
                                    <?php echo $approved_count; ?>
                                </h1>
                                <p>Approved  Articles</p>
                            </div>
                        </section>
                    </div>
<!--                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                            <div class="symbol blue">
                                <i class="fa fa-comment-o"></i>
                            </div>
                            <div class="value">
                                <h1 class=" count4">
                                    <?php echo $reviews_count; ?>
                                </h1>
                                <p>New Reviews</p>
                            </div>
                        </section>
                    </div>-->
                </div>
                <!--state overview end-->
            </div>
        </section>
    </div>
</div>


<!-- active selected menu -->

<script type="text/javascript">
    $('#dashboard_menu').addClass('active');

    //reg user count
    countUp(<?php echo $reg_user_count; ?>);

    //pending advertisemnets
    countUp2(<?php echo $pending_count; ?>);

    //approved advertisemnets
    countUp3(<?php echo $approved_count; ?>);

    //Comments count
    countUp4(<?php echo $reviews_count; ?>);
</script>