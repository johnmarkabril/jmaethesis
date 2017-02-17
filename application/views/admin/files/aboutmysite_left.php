<div class="ibox no-margin">
    <div class="ibox-title no-border">
        List
        <span class="pull-right"><a data-toggle="modal" data-target="#createModal">Create</a></span>
    </div>
    <div class="ibox-content min-height" id="search">
        <div class="no-margins">
            <div class="row">
                <div class="col-md-12">
                    <h4><input type="text" class="form-control search" placeholder="Search"/></h4>
                    <div class="table-responsive">

                        <table class="table table-striped text-center">
                            <?php if(!empty($get_all_aboutmysite)) {?>
                                <tbody class="list">

                                    <?php foreach($get_all_aboutmysite as $gaa) :?>
                                        <tr>
                                            <td class="title">
                                                <a href="<?php echo base_url();?>admin/about_my_site/information/<?php echo $gaa->NO;?>"><?php echo $gaa->TITLE;?></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated pulse">
            <div class="modal-header">
                <h4 class="modal-title">About My Site - Create</h4>
            </div>
            <div class="modal-body no-padding-bottom">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" id="ams_title" />
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea style="min-height: 150px;max-height: 150px;max-width: 100%" id="ams_description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-success full-width" id="ams_create" data-dismiss="modal" value="Submit"/>
                </div>
            </div>
        </div>
    </div>
</div>