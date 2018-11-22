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
                    date : $('#date').val(),
		    aptitude : $('#aptitude').val(),
		    psychologistNote : $('#psychologistNote').val(),
		    downPayment : $('#downPayment').val(),
		    price : $('#price').val(),
		    computerStation : $('#computerStation').val()  
                },
                
                function(data){
                    window.location.replace("?page=candidates&idSession="+data);

                }
            );
        });
    }
}

Session.createSession();