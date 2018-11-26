var Company = {
    
    createCompany: function()
    {
        $('#btnCreateCompany').click(function(e)
        {
            e.preventDefault();
            
            $.post(
                'index.php?action=createCompany',
                {
		    name : $('#name').val()   
                },
                
                function(data){
                    window.location.replace('?page=clients&idCompany='+data);
                }
            );
        });
    },
    
    updateCompany: function()
    {
        $('#btnUpdateCompany').click(function(e)
        {
            e.preventDefault();
            
            $.post(
                'index.php?action=updateCompany',
                {
		    name : $('#name').val()
                },
                
                function(data){
		    location.reload();
                }
            );
        });
    }
    
    
};

Company.createCompany();
Company.updateCompany();