<div class="landing-page">
    <section id="contact" class="gray-section contact no-margin">
        <div class="container">
            <div class="row m-b-lg">
                <div class="col-lg-12 text-center">
                    <div class="navy-line padding-top"></div>
                    <h2 class="no-margin-bottom text-bold">Contact Us</h2>
                </div>
            </div>
            <div class="row m-b-lg no-margin">
                <div class="col-md-3 col-md-offset-1">
                    <address>
                        <span class="glyphicon glyphicon-map-marker"></span> 655 D. Guillermo St. Tondo, Manila<br/>
                        <span class="glyphicon glyphicon-envelope"></span> johnmarkabril@gmail.com<br/>
                        <span class="glyphicon glyphicon-phone"></span> +63-948-441-0511<br/>
                        <span class="glyphicon glyphicon-phone-alt"></span> 2519476
                    </address>
                </div>
                <div class="col-md-6">
                    <p class="text-color">
                        <?php
                            if ( !empty($get_active) ) {
                                foreach ( $get_active as $ga ) :
                        ?>
                                    <strong><span class="navy"><?php echo $ga->TITLE; ?></span></strong> <?php echo $ga->DESCRIPTION; ?>
                        <?php
                                endforeach;
                            }
                        ?>
                    </p>
                </div>
                <div class="col-md-2">
                    <strong>Follow Us: </strong><br/>
                    <h2 class="no-margin"><ul class="list-inline">
                         <li><a href="https://www.facebook.com/jmaesiteprovider/" target="_blank" ><i class="fa fa-facebook"></i></a></li>
                         <li><a href="https://twitter.com/jmaesiteprovide" target="_blank" ><i class="fa fa-twitter"></i></a></li>
                    </ul></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg margin-top-bottom">
                    <strong>&copy; 2016 JMAE Company</strong><br/>
                </div>
            </div>
        </div>
    </section>
</div>