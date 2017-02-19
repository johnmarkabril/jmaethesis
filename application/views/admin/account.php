<div class="padding-top">
	<h3 class="no-margin text-bold" style="color: #0076BE;">Account</h3>
</div>
<div class="padding-top">
	<hr class="no-margin"/>
</div>
<div class="row">
	<div class="col-md-6 padding-top">
		<div class="widget style1 navy-bg no-margin no-border-radius">
	        <div class="text-center">
	        	<span> All users </span>
	            <h2 class="font-bold"><?php echo $get_num_rows_all_user; ?></h2>
	        </div>
	    </div>
	</div>
	<div class="col-md-6 padding-top">
		<div class="widget style1 navy-bg no-margin no-border-radius">
	        <div class="text-center">
	        	<span> Current Month </span>
	            <h2 class="font-bold"><?php echo $get_num_rows_curmonth; ?></h2>
	        </div>
	    </div>
	</div>

	<div class="col-md-12 padding-top-bottom">
        <div class="ibox float-e-margins no-margins">
            <div class="ibox-content full-height" id="search">
                <div class="input-group full-width">
                    <input type="text" placeholder="Search a name, email, username or date.." class="input-sm form-control search">
                </div>
                <br/>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name </th>
                            <th>Email Address </th>
                            <th>Username </th>
                            <th>RegTime </th>
                        </tr>
                        </thead>
                        <tbody class="list">
                            <?php
                                if ( !empty($get_all_user) ) {
                                    foreach ( $get_all_user as $gau ) :
                            ?>
                                        <tr>
                                            <td class="name"><?php echo $gau->FIRSTNAME.' '.$gau->LASTNAME; ?></td>
                                            <td class="email"><?php echo $gau->EMAIL; ?></td>
                                            <td class="username"><?php echo $gau->USERNAME; ?></td>
                                            <td class="date"><?php echo $gau->DATE.' '.$gau->TIME; ?></td>
                                        </tr>
                            <?php 
                                    endforeach;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
       	</div>
    </div>
</div>