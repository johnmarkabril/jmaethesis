<div class="padding-top">
    <div class="ibox no-margin">
        <div class="ibox-title no-border">
            Small todo list: <span><small>Only 7 todo allowed</small></span>
            <span class="pull-right"><a data-toggle="modal" data-target="#createTodoDashModal">Add</a></span>
        </div>
        <div class="ibox-content no-padding-top" style="min-height:335px;">
            <ul class="todo-list m-t small-list">
                <?php
                    foreach ( $get_all_todo_for_specific_admin as $gatfsa ) :
                ?>
                        <?php
                            if ( $gatfsa->LISTSTATUS == '1' ) {
                        ?>
                                <input type="text" id="dashTodoNo<?php echo $gatfsa->NO; ?>" value="<?php echo $gatfsa->NO; ?>" style="display: none;"/>
                                <li>
                                    <a id="dashTodoCheckID<?php echo $gatfsa->NO; ?>" class="check-link">
                                        <i class="fa fa-check-square"></i> 
                                    </a>
                                    <span class="m-l-xs todo-completed"><?php echo $gatfsa->LISTNAME;?></span>
                                </li>
                        <?php
                            } else {
                        ?>
                                <input type="text" id="dashTodoNo<?php echo $gatfsa->NO; ?>" value="<?php echo $gatfsa->NO; ?>" style="display: none;"/>
                                <li>
                                    <a id="dashTodoNotCheckID<?php echo $gatfsa->NO; ?>" class="check-link">
                                        <i class="fa fa-square-o"></i> 
                                    </a>
                                    <span class="m-l-xs"><?php echo $gatfsa->LISTNAME;?></span>
                                </li>
                        <?php
                            }
                        ?>
                <?php
                    endforeach;
                ?>
            </ul>

            <div class="form-group padding-top">
                <a href="<?php echo base_url(); ?>admin/dashboard/deleteTodoTask/<?php echo $this->session->userdata('user_session')->NO; ?>" class="btn btn-danger full-width">Delete checked task</a>
            </div>
        </div>
    </div>
</div>

<div class="modal inmodal" id="createTodoDashModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content animated pulse">
            <div class="modal-header">
                <h4 class="modal-title">Add new todo</h4>
            </div>
            <div class="modal-body no-padding-bottom">
                <form role="form" id="formContactDash" method="post" action="<?php echo base_url(); ?>admin/dashboard/insertToDo">
                    <div class="form-group">
                        <label>* Title</label>
                        <input type="text" class="form-control" name="dashTodo_title_create" required/>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="dashTodo_create" class="btn btn-success full-width" value="Submit"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>