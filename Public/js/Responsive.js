var Responsive = {
    
    menu : function()
    {
	$('#menu-responsive').click(function(){
	    $('#nav-responsive').slideToggle('slow');
	});
    }, 

    reduce : function()
    {
	if($('.colored-title').length > 1)
	{
	    $('.colored-title:not(:first)').next().css('display', 'none');
	    
	    $('.colored-title').click(function(){
		$(this).next().slideToggle();
		
		if($(this).children('svg').attr('class') == 'svg-inline--fa fa-plus fa-w-14')
		{
		    $(this).children('svg').attr('class', 'svg-inline--fa fa-minus fa-w-14');
		}
		else
		{
		    $(this).children('svg').attr('class', 'svg-inline--fa fa-plus fa-w-14');
		}
	    });
	    
	}
    }
            
};

Responsive.menu();
Responsive.reduce();