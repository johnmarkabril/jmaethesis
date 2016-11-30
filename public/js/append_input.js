
    $(document).ready(function() {
    var limit1       = $("input[name='max']").val();
    var max_fields1  = 5-limit1; //maximum input boxes allowed
    var wrapper      = $(".input_fields_wrap");
    var add_button   = $(".add_field_button"); //Add button ID
    
    var x = 1; //initial text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields1){ //max input box allowed
            x++; //text box increment
            $(wrapper).append(

               /* 
                    LAYOUT OF APPENDING CONTACT NUMBER
                    '<input type="hidden" id="contact_id" name="contact_id[]" value="<?php echo $contact_id;?>">
                    <div id="form" class="col-md-12">
                        <div class="form-group col-md-2 no-padding-right" align="right"> 
                            <h4>Contact Type</h4>
                        </div>
                        <div class="form-group col-md-9 no-padding-left no-padding-right" >
                            <select name="contact_type[]" class="form-control mbottom1">
                                <option value="Mobile">Mobile</option>
                                <option value="Home">Home</option>
                                <option value="Work">Work</option>
                                <option value="Fax">Fax</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <input type="checkbox" class="icheckbox_square-green" id="contact_cb" name="contact_cb[]" value="Y">
                        </div>
                        <div class="form-group col-md-2 no-padding-right" align="right"> 
                            <h4>Number</h4>
                        </div>
                        <div class="form-group col-md-9 no-padding-left no-padding-right" >
                            <input type="text" class="form-control mbottom1" name="contact_number[]" placeholder="Mobile number">
                        </div>
                        <div class="form-group col-md-1 no-padding-left no-padding-right" >
                            <a id="remove" href="#" class="remove_field">
                                        <span class="glyphicon glyphicon-remove-sign pull-right "></span>
                            </a>
                        </div>
                    </div>'*/
            '<input type="hidden" id="contact_id" name="contact_id[]" value="<?php echo $contact_id;?>"><div id="form" class="col-md-12"><div class="form-group col-md-2 no-padding-right" align="right"><h4>Contact Type</h4></div><div class="form-group col-md-9 no-padding-left no-padding-right"><select name="contact_type[]" class="form-control mbottom1"><option value="Mobile">Mobile</option><option value="Home">Home</option><option value="Work">Work</option><option value="Fax">Fax</option></select></div><div class="col-md-1"><input type="checkbox" class="icheckbox_square-green" id="contact_cb" name="contact_cb[]" value="Y"></div><div class="form-group col-md-2 no-padding-right" align="right"><h4>Number</h4></div><div class="form-group col-md-9 no-padding-left no-padding-right" ><input type="text" class="form-control mbottom1" name="contact_number[]" placeholder="Mobile number"></div><div class="form-group col-md-1 no-padding-left no-padding-right" ><a id="remove" href="#" class="remove_field"><span class="glyphicon glyphicon-remove-sign pull-right "></span></a></div></div>'
            ); 

           
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $('#form').remove(); x--;
    })
    /*DELETED "append_input2.js and merged it to this file"*/
    var limit2       = $("input[name='max2']").val();
    var max_fields2  = 5-limit2; //maximum input boxes allowed
    var wrapper_2    = $(".input_fields_wrap_2");
    var add_button_2 = $(".add_field_button_2"); //Add button ID
    
    var y = 1; //initial text box count
    $(add_button_2).click(function(e){ //on add input button click
        e.preventDefault();
        if(y < max_fields2){ //max input box allowed
            y++; //text box increment
            $(wrapper_2).append(
                /* 
                    LAYOUT OF APPENDING CONTACT NUMBER
                    '<input type="hidden" id="email_id" name="email_id[]" value="<?php echo $email_id;?>">
                    <div id="form2" class="col-md-12">
                        <div class="form-group col-md-2 no-padding-right" align="right"> 
                            <h4>Email Type</h4>
                        </div>
                        <div class="form-group col-md-9 no-padding-left no-padding-right" >
                            <select name="email_type[]" class="form-control mbottom1">
                                <option value="Yahoo">Yahoo</option>
                                <option value="Gmail">Gmail</option>
                                <option value="Hotmail">Hotmail/Outlook</option>
                                <option value="Zoho">Zoho</option>
                                <option value="ICloud">ICloud</option>
                                <option value="Yandex">Yandex</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <input type="checkbox" class="icheckbox_square-green" id="email_cb" name="email_cb[]" value="Y">
                        </div>
                        <div class="form-group col-md-2 no-padding-right" align="right"> 
                            <h4>Email</h4>
                        </div>
                        <div class="form-group col-md-9 no-padding-left no-padding-right" >
                            <input type="text" class="form-control mbottom1" placeholder="Email" name="contact_email[]">
                        </div>
                        <div class="form-group col-md-1 no-padding-left no-padding-right" >
                            <a id="remove" href="#" class="remove_field2">
                                        <span class="glyphicon glyphicon-remove-sign pull-right "></span>
                            </a>
                        </div>
                    </div>'*/
               '<input type="hidden" id="email_id" name="email_id[]" value="<?php echo $email_id;?>"><div id="form2" class="col-md-12"><div class="form-group col-md-2 no-padding-right" align="right"><h4>Email Type</h4></div><div class="form-group col-md-9 no-padding-left no-padding-right" ><select name="email_type[]" class="form-control mbottom1"><option value="Yahoo">Yahoo</option><option value="Gmail">Gmail</option><option value="Hotmail">Hotmail/Outlook</option><option value="Zoho">Zoho</option><option value="ICloud">ICloud</option><option value="Yandex">Yandex</option><option value="Other">Other</option></select></div><div class="col-md-1"><input type="checkbox" class="icheckbox_square-green" id="email_cb" name="email_cb[]" value="Y"></div><div class="form-group col-md-2 no-padding-right" align="right"><h4>Email</h4></div><div class="form-group col-md-9 no-padding-left no-padding-right" ><input type="text" class="form-control mbottom1" placeholder="Email" name="contact_email[]"></div><div class="form-group col-md-1 no-padding-left no-padding-right" ><a id="remove" href="#" class="remove_field2"><span class="glyphicon glyphicon-remove-sign pull-right "></span></a></div></div>'
            ); 

           
        }
    });
    $(wrapper_2).on("click",".remove_field2", function(e){ //user click on remove text
        e.preventDefault(); $('#form2').remove(); y--;
    })
});