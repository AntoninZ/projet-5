var Candidate = {
    
    search: function()
    {
        $('#search').keyup(function(e)
        {
            e.preventDefault();

            $.post(
                'index.php?action=search',
                {
                    lastname : $('#search').val(),
                    email : $('#search').val(),
                    phoneNumber : $('#search').val(),
                    cellphoneNumber : $('#search').val()
                },

                function(data)
                {
                    $('#result').html(data);
                }
            );
        });
    },
    
    createCandidate: function()
    {
        $('#btnCreateCandidate').click(function(e)
        {
            e.preventDefault();
            
            $.post(
                'index.php?action=createCandidate',
                {
                    lastname : $('#lastname').val(),
                    firstname : $('#firstname').val(),
                    birthDate : $('#birthDate').val()
                },
                
                function(data){
                    window.location.replace("?page=candidates&idCandidate="+data);
                }
            );
        });
    },
    
    updateCandidate: function()
    {
        $('#btnUpdateCandidate').click(function(e)
        {
            e.preventDefault();
        
            $.post(
                'index.php?action=updateCandidate',
                {
                    firstname : $('#firstname').val(),
                    lastname : $('#lastname').val(),
                    birthDate : $('#birthDate').val(),
                    gender : $('#gender').val(),
                    email : $('#email').val(),
                    phoneNumber : $('#phoneNumber').val(),
                    cellphoneNumber : $('#cellphoneNumber').val(),
                    address : $('#address').val(),
                    allowable : $('#allowable').val(),
                    idCandidate : $('#idCandidate').val()
                },
                
                function(data){
                    location.reload();
                }
            );
        });
    }
};

Candidate.search();
Candidate.createCandidate();
Candidate.updateCandidate();
