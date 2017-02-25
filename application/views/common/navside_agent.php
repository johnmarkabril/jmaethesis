<nav class="navbar-default navbar-static-side" role="navigation" id="admin">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <?php
                    foreach ( $get_agent_specific as $gas ) :
                        $permission = explode('|', $gas->PERMISSION);
                ?>
                    <div class="dropdown profile-element"> 
                        <span>
                            <center>
                                <img alt="image" class="img-circle img-responsive img-prof-sidebar" src="<?php echo base_url();?>public/img/<?php echo $gas->IMAGEURL;?>" />
                            </center>
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear text-center"> 
                                <span class="block m-t-xs">
                                    <strong class="font-bold"><?php echo $gas->FIRSTNAME." ".$gas->LASTNAME; ?> <b class="caret"></b></strong>
                                </span>
                                <span class="text-muted text-xs block">User Position: <?php echo $gas->ACCOUNT_TYPE; ?></span> 
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <?php if ( in_array("Profile", $permission) ) { ?>
                                <li><a href="<?php echo base_url(); ?>agent/profile">Profile</a></li>
                            <?php } ?>
                            <?php if ( in_array("Contact", $permission) ) { ?>
                                <li><a href="<?php echo base_url(); ?>agent/contact">Contact</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php
                    endforeach;
                ?>
                <div class="logo-element no-padding">
                    <img src="<?php echo base_url(); ?>public/img/headlogo.png" class="img-responsive " style="height: 50px;width:150px;"/>
                </div>
            </li>

            <?php
                foreach ( $get_agent_specific as $gas ) :
                    $permission = explode('|',$gas->PERMISSION);
                endforeach;
            ?>

            <?php if ( in_array("Issue Tracker", $permission) ) { ?>
                <li class="<?php echo ($this->curpage == 'Issue Tracker') ? 'active' : ''; ?>">
                    <a href="<?php echo base_url(); ?>agent/issue_tracker"><i class="fa fa-file-text"></i> <span class="nav-label">Issue Tracker</span></a>
                </li>
            <?php } ?>

            <?php if ( in_array("Events", $permission) ) { ?>
                <li class="<?php echo ($this->curpage == 'Events') ? 'active' : ''; ?>">
                    <a href="<?php echo base_url(); ?>agent/events"><i class="fa fa-list-alt"></i> <span class="nav-label">Events</span></a>
                </li>
            <?php } ?>

            <?php if ( in_array("Message", $permission) ) { ?>
                <li class="<?php echo ($this->curpage == 'Message') ? 'active' : ''; ?>">
                    <a href="<?php echo base_url(); ?>agent/message"><i class="fa fa-envelope"></i> <span class="nav-label">Message</span></a>
                </li>
            <?php } ?>
            
            <?php if ( in_array("Notification", $permission) ) { ?>
                <li class="<?php echo ($this->curpage == 'Notification') ? 'active' : ''; ?>">
                    <a href="<?php echo base_url(); ?>agent/notification"><i class="fa fa-bell"></i> <span class="nav-label">Notification</span></a>
                </li>
            <?php } ?>
            
            <?php if ( in_array("Template", $permission) ) { ?>
                <li class="<?php echo ($this->curpage == 'Purchased Template' || $this->curpage == 'Templates') ? 'active' : ''; ?>">
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Template</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">

                        <?php if ( in_array("Purchased Template", $permission) ) { ?>
                            <li><a href="<?php echo base_url(); ?>agent/purchased_template">Purchased Template</a></li>
                        <?php } ?>

                        <?php if ( in_array("Templates", $permission) ) { ?>
                            <li><a href="<?php echo base_url(); ?>agent/templates">Templates</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>

