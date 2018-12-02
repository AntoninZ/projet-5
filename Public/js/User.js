/* Function for signIn, signUp, signOut*/

var User = {
    
    signIn: function()
    {
        $('#connexion').click(function(e)
        {
            e.preventDefault();
            
            var username = $('#username').val();
            var password = $('#password').val();
            
            if(username.length <= 0)
            {
                $('username').css('border', '1px solid #ff4f4f');
                $('#error').html('Vous devez remplir tous les champs du formulaire.');
            }
            else if(password.length <= 0)
            {
                $('#password').css('border', '1px solid #ff4f4f');
                $('#error').html('Vous devez remplir tous les champs du formulaire.');
            }
            else
            {
                $.post('index.php?connexion',
                {
                    username : username,
                    password : password
                },
                
                function(data)
                {
                   if(data)
                   {
                       $(location).attr('href',"?page=dashboard");
                   }
                   else
                   {
                       $('#error').html('Erreur: Pseudo ou mot de passe invalide.');
                   }
                });
            }
        });
    },
    
    signOut: function()
    {
        $("#signOut").click(function()
        {
            $.get('index.php?signOut',
            function()
            {
                $(location).attr('href',"index.php");
            });
        });
    },
    
    updateUserAccount: function()
    {
	$("#btnUpdateUserAccount").click(function(e)
	{
	    e.preventDefault();
	    
	    $.post(
		'index.php?action=updateUserAccount',
		{
		    username : $('#username').val(),
		    gender : $('#gender').val(),
		    role : $('#role').val(),
		    adeliNumber : $('#adeliNumber').val(),
		    idUser : $('#idUser').val()
		}
	    );
	});
    },
    
    updateUserPassword: function()
    {
	$("#btnUpdateUserPassword").click(function(e)
	{
	    e.preventDefault();

	    if($('#password').val() == $('#passwordCheck').val())
	    {
		$.post(
		    'index.php?action=updateUserPassword',
		    {
			password : $('#password').val(),
			idUser : $('#idUser').val()
		    }
		)
	    }
	});
    }
    
};

User.signIn();
User.signOut();
User.updateUserAccount();
User.updateUserPassword();