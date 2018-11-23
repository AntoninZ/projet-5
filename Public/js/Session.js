var Session = {
    
    createSession: function()
    {
        $('#btnCreateSession').click(function(e)
        {
            e.preventDefault();
            
            $.post(
                'index.php?action=createSession',
                {
		    idUser : $('#idUser').val(),
		    idCandidate : $('#idCandidate').val(),
		    idCompany : $('#idCompany').val(),
                    date : $('#date').val(),
		    aptitude : $('#aptitude').val(),
		    psychologistNote : $('#psychologistNote').val(),
		    price : $('#price').val(),
		    computerStation : $('#computerStation').val()  
                },
                
                function(data){
                    location.reload();
                }
            );
        });
    },
    
    updateSession: function()
    {
        $('#btnUpdateSession').click(function(e)
        {
            e.preventDefault();
            
            $.post(
                'index.php?action=updateSession',
                {
		    idSession : $('#idSession').val(),
		    idUser : $('#idUser').val(),
		    idCompany : $('#idCompany').val(),
                    date : $('#date').val(),
		    aptitude : $('#aptitude').val(),
		    psychologistNote : $('#psychologistNote').val(),
		    price : $('#price').val(),
		    computerStation : $('#computerStation').val()  
                },
                
                function(data){
                    location.reload();
                }
            );
        });
    }
    
    
};

Session.createSession();
Session.updateSession();