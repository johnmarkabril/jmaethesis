/*JS FUNCTIONS MADE BY DEX & JOHN PAUL*/
var parents = ['um','cm','re','gr','pr','pb','co','bl'];
var psize = parents.length;
var ctr = 0;
//<-------Move all items to the select listbox------->
function moveAll1() 
{
    $('#from option').removeClass('choice').addClass('select');
    $('#from option').detach().appendTo('#to'); 
//After execution, it rearranges the listboxes and rebinds the collapse-expand actions
    rearrange();
    bindings();
}

//<-------Move all items to the choice listbox------->
function moveAll2()
{
    $('#to option').removeClass('select').addClass('choice');
    $('#to option').detach().appendTo('#from'); 
//After execution, it rearranges the listboxes and rebinds the collapse-expand actions
    rearrange();
    bindings();
}

//<-------Move one item to the select listbox------->
function moveSelected1()
{
    var match = 0;
    for(ctr=0;ctr<psize;ctr++){
        if($('#from option:selected').text()== $('option.'+parents[ctr]+'parent.choice').text())
        {
            $('#from option:selected').removeClass('choice').addClass('select').detach().appendTo('#to');
            $('option.'+parents[ctr]+'child.choice').removeClass('choice').addClass('select').detach().appendTo('#to');
            match++;
        }
    }
    if(match==0){
        $('#from option:selected').removeClass("choice").addClass("select").detach().appendTo('#to');
    }
    parenttrap();
    
//After execution, it rearranges the listboxes and rebinds the collapse-expand actions
    rearrange();
    bindings();
    return;    
}

//<-------Move one item to the choice listbox------->
function moveSelected2()
{
    var match = 0;
    for(ctr=0;ctr<psize;ctr++){
        if($('#to option:selected').text()== $('option.'+parents[ctr]+'parent.select').text())
        {   
            $('#to option:selected').removeClass('select').addClass('choice').detach().appendTo('#from');
            $('option.'+parents[ctr]+'child.select').removeClass('select').addClass('choice').detach().appendTo('#from');
        }
    }
    if(match==0){
        $('#to option:selected').removeClass("select").addClass("choice");
        $('#to option:selected').detach().appendTo('#from');
    }
    //checks if one element in a set of elements were moved to choice while the parent is in select
    parenttrap2();
    
//After execution, it rearranges the listboxes and rebinds the collapse-expand actions
    rearrange();
    bindings();
}
    
function bindings()
{
    //For the Cancel button in User Management
    $("#back").bind("click", function(){
            history.go(-1);
        });

/*<-------Expansion and Collapsing of parent classes--------->*/
    for(ctr=0;ctr<psize;ctr++)
    {
        $('.'+parents[ctr]+'parent').unbind('dblclick');
    }
    if($('.umparent.choice').length)
    {
        $('.umparent.choice').bind('dblclick', function()
        { 
            //If Um has conflicting elements(there are elements that are expanded AND collapsed)
            if($('.umchild.choice').hasClass('in')&&$('.umchild.choice').hasClass('hidden'))
            {
                $('.umchild.choice').removeClass('in').removeClass('hidden');
            }
            //If user wants to collapse Um
            else if($('.umchild.choice').hasClass('in'))
            {
                $('.umchild.choice').removeClass('in').addClass('hidden');
            }
            //If user wants to expand Um
            else
            {
                $('.umchild.choice').addClass('in').removeClass('hidden');
            }
        });
    }
    if($('.umparent.select').length)
    {
        $('.umparent.select').bind('dblclick', function()
        { 
            if($('.umchild.select').hasClass('in')&&$('.umchild.select').hasClass('hidden'))
            {
                $('.umchild.select').removeClass('in').removeClass('hidden');
            }
            else if($('.umchild.select').hasClass('in'))
            {
                $('.umchild.select').removeClass('in').addClass('hidden');
            }
            else
            {
                $('.umchild.select').addClass('in').removeClass('hidden');
            }
            });
    }
    if($('.cmparent.choice').length)
    {
        $('.cmparent.choice').bind('dblclick', function()
        { 
            if($('.cmchild.choice').hasClass('in')&&$('.cmchild.choice').hasClass('hidden'))
            {
                $('.cmchild.choice').removeClass('in').removeClass('hidden');
            }
            else if($('.cmchild.choice').hasClass('in'))
            {
                $('.cmchild.choice').removeClass('in').addClass('hidden');
            }
            else
            {
                $('.cmchild.choice').addClass('in').removeClass('hidden');
            }
        });
    }
    if($('.cmparent.select').length)
    {
        $('.cmparent.select').bind('dblclick', function()
        { 
            if($('.cmchild.select').hasClass('in')&&$('.cmchild.select').hasClass('hidden'))
            {
                $('.cmchild.select').removeClass('in').removeClass('hidden');
            }
            else if($('.cmchild.select').hasClass('in'))
            {
                $('.cmchild.select').removeClass('in').addClass('hidden');
            }
            else
            {
                $('.cmchild.select').addClass('in').removeClass('hidden');
            }
            });
    }
    if($('.reparent.choice').length)
    {
        $('.reparent.choice').bind('dblclick', function()
        {
            if($('.rechild.choice').hasClass('in')&&$('.rechild.choice').hasClass('hidden'))
            {
                $('.rechild.choice').removeClass('in').removeClass('hidden');
            }
            else if($('.rechild.choice').hasClass('in'))
            {
                $('.rechild.choice').removeClass('in').addClass('hidden');
            }
            else
            {
                $('.rechild.choice').addClass('in').removeClass('hidden');
            }
        });
    }
    if($('.reparent.select').length)
    {
        $('.reparent.select').bind('dblclick', function()
        { 
            if($('.rechild.select').hasClass('in')&&$('.rechild.select').hasClass('hidden'))
            {
                $('.rechild.select').removeClass('in').removeClass('hidden');
            }
            else if($('.rechild.select').hasClass('in'))
            {
                $('.rechild.select').removeClass('in').addClass('hidden');
            }
            else
            {
                $('.rechild.select').addClass('in').removeClass('hidden');
            }
            });
    }
    if($('.grparent.choice').length)
    {
        $('.grparent.choice').bind('dblclick', function()
        { 
            if($('.grchild.choice').hasClass('in')&&$('.grchild.choice').hasClass('hidden'))
            {
                $('.grchild.choice').removeClass('in').removeClass('hidden');
            }
            else if($('.grchild.choice').hasClass('in'))
            {
                $('.grchild.choice').removeClass('in').addClass('hidden');
            }
            else
            {
                $('.grchild.choice').addClass('in').removeClass('hidden');
            }
        });
    }
    if($('.grparent.select').length)
    {
        $('.grparent.select').bind('dblclick', function()
        { 
            if($('.grchild.select').hasClass('in')&&$('.grchild.select').hasClass('hidden'))
            {
                $('.grchild.select').removeClass('in').removeClass('hidden');
            }
            else if($('.grchild.select').hasClass('in'))
            {
                $('.grchild.select').removeClass('in').addClass('hidden');
            }
            else
            {
                $('.grchild.select').addClass('in').removeClass('hidden');
            }
            });
    }
    if($('.prparent.choice').length)
    {
        $('.prparent.choice').bind('dblclick', function()
        { 
            if($('.prchild.choice').hasClass('in')&&$('.prchild.choice').hasClass('hidden'))
            {
                $('.prchild.choice').removeClass('in').removeClass('hidden');
            }
            else if($('.prchild.choice').hasClass('in'))
            {
                $('.prchild.choice').removeClass('in').addClass('hidden');
            }
            else
            {
                $('.prchild.choice').addClass('in').removeClass('hidden');
            }
        });
    }
    if($('.prparent.select').length)
    {
        $('.prparent.select').bind('dblclick', function()
        { 
            if($('.prchild.select').hasClass('in')&&$('.prchild.select').hasClass('hidden'))
            {
                $('.prchild.select').removeClass('in').removeClass('hidden');
            }
            else if($('.prchild.select').hasClass('in'))
            {
                $('.prchild.select').removeClass('in').addClass('hidden');
            }
            else
            {
                $('.prchild.select').addClass('in').removeClass('hidden');
            }
            });
    }
    if($('.pbparent.choice').length)
    {
        $('.pbparent.choice').bind('dblclick', function()
        {
            if($('.pbchild.choice').hasClass('in')&&$('.pbchild.choice').hasClass('hidden'))
            {
                $('.pbchild.choice').removeClass('in').removeClass('hidden');
            }
            else if($('.pbchild.choice').hasClass('in'))
            {
                $('.pbchild.choice').removeClass('in').addClass('hidden');
            }
            else
            {
                $('.pbchild.choice').addClass('in').removeClass('hidden');
            }
        });
    }
    if($('.pbparent.select').length)
    {
        $('.pbparent.select').bind('dblclick', function()
        { 
            if($('.pbchild.select').hasClass('in')&&$('.pbchild.select').hasClass('hidden'))
            {
                $('.pbchild.select').removeClass('in').removeClass('hidden');
            }
            else if($('.pbchild.select').hasClass('in'))
            {
                $('.pbchild.select').removeClass('in').addClass('hidden');
            }
            else
            {
                $('.pbchild.select').addClass('in').removeClass('hidden');
            }
            });
    }
    if($('.coparent.choice').length)
    {
        $('.coparent.choice').bind('dblclick', function()
        {
            if($('.cochild.choice').hasClass('in')&&$('.cochild.choice').hasClass('hidden'))
            {
                $('.cochild.choice').removeClass('in').removeClass('hidden');
            }
            else if($('.cochild.choice').hasClass('in'))
            {
                $('.cochild.choice').removeClass('in').addClass('hidden');
            }
            else
            {
                $('.cochild.choice').addClass('in').removeClass('hidden');
            }
        });
    }
    if($('.coparent.select').length)
    {
        $('.coparent.select').bind('dblclick', function()
        { 
            if($('.cochild.select').hasClass('in')&&$('.cochild.select').hasClass('hidden'))
            {
                $('.cochild.select').removeClass('in').removeClass('hidden');
            }
            else if($('.cochild.select').hasClass('in'))
            {
                $('.cochild.select').removeClass('in').addClass('hidden');
            }
            else
            {
                $('.cochild.select').addClass('in').removeClass('hidden');
            }
            });
    }
    if($('.blparent.choice').length)
    {
        $('.blparent.choice').bind('dblclick', function()
        {
            if($('.blchild.choice').hasClass('in')&&$('.blchild.choice').hasClass('hidden'))
            {
                $('.blchild.choice').removeClass('in').removeClass('hidden');
            }
            else if($('.blchild.choice').hasClass('in'))
            {
                $('.blchild.choice').removeClass('in').addClass('hidden');
            }
            else
            {
                $('.blchild.choice').addClass('in').removeClass('hidden');
            }
        });
    }
    if($('.blparent.select').length)
    {
        $('.blparent.select').bind('dblclick', function()
        { 
            if($('.blchild.select').hasClass('in')&&$('.blchild.select').hasClass('hidden'))
            {
                $('.blchild.select').removeClass('in').removeClass('hidden');
            }
            else if($('.blchild.select').hasClass('in'))
            {
                $('.blchild.select').removeClass('in').addClass('hidden');
            }
            else
            {
                $('.blchild.select').addClass('in').removeClass('hidden');
            }
            });
    }
}

//These following conditions are for number 5 (see above)
function parenttrap(){  
    for(ctr=0;ctr<psize;ctr++){
        if($('option.'+parents[ctr]+'child.choice').length==0)
        {
            $('option.'+parents[ctr]+'parent.choice').removeClass('choice').addClass('select').detach().appendTo('#to');
        }
    }
}

//These following conditions are for number 4 (see above)
function parenttrap2(){
    for(ctr=0;ctr<psize;ctr++){
        if($('option.'+parents[ctr]+'child.choice').length!=0&&$('option.'+parents[ctr]+'parent.select').length!=0)
        {
            $('option.'+parents[ctr]+'parent.select').removeClass('select').addClass('choice').detach().appendTo('#from');
        }
    }
}

//This is self-explanatory and for problem number 6 (see above)
function rearrange(){
    //for Admin
    for($a=0;(($a-4)!=$('input[name="maxpermission"]').val());$a++){
        $('option.choice#ad'+$a).detach().appendTo('#from');
        $('option.select#ad'+$a).detach().appendTo('#to');
    }
    //for Tenant
    for($a=0;(($a-8)!=$('input[name="maxpermission"]').val());$a++){
        $('option.choice#t'+$a).detach().appendTo('#from');
        $('option.select#t'+$a).detach().appendTo('#to');
    }
    //for Supervisors
    for($a=0;(($a)!=$('input[name="maxpermission"]').val());$a++){
        $('option.choice#s'+$a).detach().appendTo('#from');
        $('option.select#s'+$a).detach().appendTo('#to');
    }
    //for Agent
    for($a=0;(($a)!=$('input[name="maxpermission"]').val());$a++){
        $('option.choice#ag'+$a).detach().appendTo('#from');
        $('option.select#ag'+$a).detach().appendTo('#to');
    }
}

$( document ).ready(function() {
    //If user management edits an account
    if($('#Mainform').hasClass('editform')){
       $('#createform').removeClass('disabled');
       $('#savediv').removeClass('hidden'); 
       $('#spacediv').removeClass('hidden'); 
       $('#deletediv').removeClass('hidden'); 

       $('#backdiv').addClass('hidden'); 
       $('#creatediv').addClass('hidden'); 
    }
    parenttrap();
    parenttrap2();
    rearrange();
    bindings();
    });