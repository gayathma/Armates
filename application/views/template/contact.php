<script type="text/javascript" src="<?php echo base_url(); ?>application_resources/js/jquery.validate.min.js"></script>
<div class="element  clearfix col2-3 contact auto">
    <div class="col2-3 auto">
        <figure class="images"> <img src="images/27_preview27.jpg" alt="" /></figure>
    </div>
    <div class="col2-3 auto white-bottom">
        <p class="small">Contact</p>
        <h3>Just drop us a line if you want to work together. We'll get back to you asap.</h3>
    </div>
</div>

<div class="element  clearfix col1-3 contact grey">
    <a href="http://maps.google.com/" target="_blank" class="whole-tile">
        <p class="small">Google Maps
        <h3 class="linked">Need Directions?</h3>
        <div class="bottom">
            <div class="icons map"></div>
            <p class="alignleft">Find them here</p>
            <span class="arrow">→</span></div>
    </a>
</div>
<div class="element clearfix col1-3 contact auto">
    <div class="elem-content">
        <p class="small">Contact Form</p>
        <h3>Drop Us a Line</h3>
        <form class="form-part" method="post" name="contactform" id="contactformcustom" autocomplete="off">
            <input name="name" type="text" id="name" size="30" title="Name" />
            <input name="email" type="text" id="email" size="30" title="Email" />
            <textarea name="comments" cols="40" rows="3" id="comments" title="Tell us what you think!"></textarea>
            <div class="input-wrapper clearfix">
                <input type="submit" class="send-btn" value="Send" id="submit" name="Submit" />
                <span id="message"></span></div>
        </form>
    </div>
</div>
<div class="element  clearfix col1-3 contact grey">
    <p class="small">Address</p>
    <h3>ARMATES</h3>
    <ul class="unordered-list">
        <li>Colombo, <br />
            Sri Lanka. </li>
        <li>(094)&nbsp;75-8376047</li>
        <li><a href="mailto:shamaingdd@yahoo.com" title="Write Email">shamaingdd@yahoo.com</a></li>
    </ul>
</div>
<div class="element  clearfix col1-3 pricing white"> <a href="#contact" data-title="" class="whole-tile">
        <div class="icons chat"></div>
        <h4>Not finding the right deal, can't decide or have any other questions?</h4>
        <div class="bottom">
            <p class="alignleft">Send us an email</p>
            <span class="arrow">→</span></div>
    </a> 
</div>
<script>
    $("form#contactformcustom").validate({
        rules: {
            name: 'required',
            email: {
                required: true,
                email: true
            },
            comments: 'required'

        }, submitHandler: function(form)
        {
            $("#message").fadeOut(200, function() {
                $('#message').hide();
                $('#submit').attr('disabled', 'disabled');

                $.post('<?php echo site_url(); ?>/home/send_contact_request', $('#contactformcustom').serialize(), function(msg)
                {
                    if (msg == 1) {
                        $('#message').html('success');
                        $('#message').fadeIn(200);
                        $('.hide').hide(0);
                        $('#submit').removeAttr('disabled');
                    } else {
                        $("#add_project_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">advertisement </a>has failed.</div>');
                    }
                });
            });
        }
    });
</script>