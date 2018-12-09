/* Function for signIn, signUp, signOut*/

var User = {
    
    signIn: function()
    {
        $('#connexion').click(function(e)
        {
            e.preventDefault();
            
            var requiredUsername = DataValidate.required($('#username').attr('id'));
            var requiredPassword = DataValidate.required($('#password').attr('id'));
            
            if(!requiredUsername || !requiredPassword)
            {
		if($('#confirm').length === 0)
		{
		    $('#connexion').after('<p id="confirm">Erreur : champs vide(s).</p>');
		    setInterval(function(){
			$('#confirm').fadeOut('slow', function(){
			    $('#confirm').remove();
			});
		    }, 2000);
		}
            }
            else
            {
                $.post('index.php?connexion',
                {
                    username : $('#username').val(),
                    password : $('#password').val()
                },
                
                function(data)
                {
                   if(data)
                   {
                       location.reload();
                   }
                   else
                   {
                       $('#connexion').after('<p id="confirm">Erreur : Le pseudo ou le mot de passe est invalide</p>');
			setInterval(function(){
			    $('#confirm').fadeOut('slow', function(){
				$('#confirm').remove();
			    });
			}, 2000);
                   }
                });
            }
        });
    },
    
    signOut: function()
    {
        $(".signOut").click(function()
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
	    
	    var requiredUsername = DataValidate.required($('#username').attr('id'));
	    
	    if(!requiredUsername)
	    {
		if($('#confirm').length === 0)
		{
		    $('#btnUpdateUserAccount').after('<p id="confirm">Erreur : champs vide.</p>');
		    setInterval(function(){
			$('#confirm').fadeOut('slow', function(){
			    $('#confirm').remove();
			});
		    }, 2000);
		}
	    }
	    else
	    {
		$.post(
		    'index.php?action=updateUserAccount',
		    {
			username : $('#username').val(),
			gender : $('#gender').val(),
			role : $('#role').val(),
			adeliNumber : $('#adeliNumber').val(),
			idUser : $('#idUser').val()
		    },
		    
		    function(){
			$('#btnUpdateUserAccount').after('<p id="confirm">Informations sauvegardées.</p>');
			setInterval(function(){
			    $('#confirm').fadeOut('slow', function(){
				$('#confirm').remove();
			    });
			}, 2000);
		    }
		);
	    }
	});
    },
    
    updateUserPassword: function()
    {
	$("#btnUpdateUserPassword").click(function(e)
	{
	    e.preventDefault();
	    
	    var requiredPassword = DataValidate.required($('#password').attr('id'));
	    var requiredPasswordCheck = DataValidate.required($('#passwordCheck').attr('id'));
	    
	    if(!requiredPassword || !requiredPasswordCheck)
	    {
		if($('#error').length === 0)
		{
		    $('#btnUpdateUserPassword').after('<p id="confirm">Erreur : champs vide(s).</p>');
		    setInterval(function(){
			$('#confirm').fadeOut('slow', function(){
			    $('#confirm').remove();
			});
		    }, 2000);
		}
	    }
	    else
	    {
		if($('#password').val() == $('#passwordCheck').val())
		{
		    $.post(
			'index.php?action=updateUserPassword',
			{
			    password : $('#password').val(),
			    idUser : $('#idUser').val()
			},
		    
			function(){
			    $('#btnUpdateUserPassword').after('<p id="confirm">Informations sauvegardées.</p>');
			    setInterval(function(){
				$('#confirm').fadeOut('slow', function(){
				    $('#confirm').remove();
				});
			    }, 2000);
			}
		    );
		}
		else
		{
		    $('#btnUpdateUserPassword').after('<p id="confirm">Erreur : les mots de passe ne correspondent pas.</p>');
		    setInterval(function(){
			$('#confirm').fadeOut('slow', function(){
			    $('#confirm').remove();
			});
		    }, 2000);
		}
	    }
	});
    }
    
};

User.signIn();
User.signOut();
User.updateUserAccount();
User.updateUserPassword();