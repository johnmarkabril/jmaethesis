<nav class="navbar-default navbar-static-side" role="navigation" id="admin">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <?php
                    foreach ( $get_admin_specific as $gas ) :
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
                                <span class="text-muted text-xs block"><?php echo $gas->ACCOUNT_TYPE; ?></span> 
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <?php if ( in_array("Profile", $permission) ) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/profile">Profile</a></li>
                            <?php } ?>
                            <?php if ( in_array("Contact", $permission) ) { ?>
                                <li><a href="<?php echo base_url(); ?>admin/contact">Contact</a></li>
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
                foreach ( $get_admin_specific as $gas ) :
                    $permission = explode('|',$gas->PERMISSION);
                endforeach;
            ?>

            <?php if ( in_array("About My Site", $permission) ) { ?>
                <li class="<?php echo ($this->curpage == 'About My Site') ? 'active' : ''; ?>">
                    <a href="<?php echo base_url(); ?>admin/about_my_site"><i class="fa fa-file-text"></i> <span class="nav-label">About My Site</span></a>
                </li>
            <?php } ?>

            <?php if ( in_array("Dashboard", $permission) ) { ?>
                <li class="<?php echo ($this->curpage == 'Dashboard') ? 'active' : ''; ?>">
                    <a href="<?php echo base_url(); ?>admin"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>
            <?php } ?>

            <?php if ( in_array("Events", $permission) ) { ?>
                <li class="<?php echo ($this->curpage == 'Events') ? 'active' : ''; ?>">
                    <a href="<?php echo base_url(); ?>admin/events"><i class="fa fa-list-alt"></i> <span class="nav-label">Events</span></a>
                </li>
            <?php } ?>

            <?php if ( in_array("Message", $permission) ) { ?>
                <li class="<?php echo ($this->curpage == 'Message') ? 'active' : ''; ?>">
                    <a href="<?php echo base_url(); ?>admin/message"><i class="fa fa-envelope"></i> <span class="nav-label">Message</span></a>
                </li>
            <?php } ?>
            
            <?php if ( in_array("Notification", $permission) ) { ?>
                <li class="<?php echo ($this->curpage == 'Notification') ? 'active' : ''; ?>">
                    <a href="<?php echo base_url(); ?>admin/notification"><i class="fa fa-bell"></i> <span class="nav-label">Notification</span></a>
                </li>
            <?php } ?>

            <?php if ( in_array("Settings", $permission) ) { ?>
                <li class="<?php echo ($this->curpage == 'Settings' || $this->curpage == 'PayPal Configuration') ? 'active' : ''; ?>">
                    <a href="#"><i class="fa fa-cog"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <?php if ( in_array("PayPal Configuration", $permission) ) { ?>
                            <li><a href="<?php echo base_url(); ?>admin/paypal_configuration">PayPal Configuration</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            
            <?php if ( in_array("Statistics", $permission) ) { ?>
                <li class="<?php echo ($this->curpage == 'Reports') ? 'active' : ''; ?>">
                    <a href="<?php echo base_url(); ?>admin/reports"><i class="fa fa-area-chart"></i> <span class="nav-label">Reports</span></a>
                </li>
            <?php } ?>
            
            <?php if ( in_array("Team", $permission) ) { ?>
                <li class="<?php echo ($this->curpage == 'Team') ? 'active' : ''; ?>">
                    <a href="<?php echo base_url(); ?>admin/team"><i class="fa fa-users"></i> <span class="nav-label">Team</span></a>
                </li>
            <?php } ?>
            
            <?php if ( in_array("User Management", $permission) ) { ?>
                <li class="<?php echo ($this->curpage == 'User Management' || $this->curpage == 'Account' || $this->curpage == 'Agent' || $this->curpage == 'Co-Administrator') ? 'active' : ''; ?>">
                    <a href="#"><i class="fa fa-cogs"></i> <span class="nav-label">User Management</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">

                        <?php if ( in_array("Accounts", $permission) ) { ?>
                            <li><a href="<?php echo base_url(); ?>admin/account">Account</a></li>
                        <?php } ?>

                        <?php if ( in_array("Agent", $permission) ) { ?>
                            <li><a href="<?php echo base_url(); ?>admin/agent">Agent</a></li>
                        <?php } ?>

                        <?php if ( in_array("Co-Administrator", $permission) ) { ?>
                            <li><a href="<?php echo base_url(); ?>admin/co_administrator">Co-Administrator</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
            
            <?php if ( in_array("Website", $permission) ) { ?>
                <li class="<?php echo ($this->curpage == 'Website Template' || $this->curpage == 'Website Online') ? 'active' : ''; ?>">
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Website</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">

                        <?php if ( in_array("Website Online", $permission) ) { ?>
                            <li><a href="<?php echo base_url(); ?>admin/website_online">Website Online</a></li>
                        <?php } ?>

                        <?php if ( in_array("Website Template", $permission) ) { ?>
                            <li><a href="<?php echo base_url(); ?>admin/website_template">Website Template</a></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>

