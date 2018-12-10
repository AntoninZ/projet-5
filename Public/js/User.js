/* Function for signIn, signUp, signOut*/

var User = {
    
    createUser: function()
    {
	$('#btnCreateUser').click(function(e)
	{
	    e.preventDefault();
	    
	    var btn = $(this);
	    
	    var requiredUsername = DataValidate.required($('#username').attr('id'));
            var requiredPassword = DataValidate.required($('#password').attr('id'));
	    
	    if(!requiredUsername || !requiredPassword)
            {
		DataValidate.confirm(btn, 'Erreur : Champs vide(s).');
            }
	    else
	    {
		$.post(
		    'index.php?action=createUser',
		    {
			username: $('#username').val(),
			password: $('#password').val(),
			gender: $('#gender').val(),
			role: $('#role').val(),
			adeliNumber : $('#adeliNumber').val()
		    },
		
		    function(data){
			if(data.error)
			{
			    DataValidate.confirm(btn, data.error);
			}
			else
			{
			    location.reload();
			}
		    }
		);
	    }
	});
    },
    
    signIn: function()
    {
        $('#connexion').click(function(e)
        {
            e.preventDefault();
            
	    var btn = $(this);
	    
            var requiredUsername = DataValidate.required($('#username').attr('id'));
            var requiredPassword = DataValidate.required($('#password').attr('id'));
            
            if(!requiredUsername || !requiredPassword)
            {
		DataValidate.confirm(btn, 'Erreur : champs vide(s).');
            }
            else
            {
                $.post(
		    'index.php?connexion',
		    {
			username : $('#username').val(),
			password : $('#password').val()
		    },
                
		    function(data)
		    {
			if(data.error)
			{
			    DataValidate.confirm(btn, data.error);
			}
			else
			{
			    location.reload();
			}
		   }
		);
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
	    
	    var btn = $(this);
	    
	    var requiredUsername = DataValidate.required($('#username').attr('id'));
	    
	    if(!requiredUsername)
	    {
		DataValidate.confirm(btn, 'Erreur : champs vide.');
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
		    
		    function(data)
		    {
			if(data.error)
			{
			    DataValidate.confirm(btn, data.error);
			}
			else
			{
			    DataValidate.confirm(btn, 'Informations sauvegardées !');
			}
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
	    
	    var btn = $(this);
	    
	    var requiredPassword = DataValidate.required($('#password').attr('id'));
	    var requiredPasswordCheck = DataValidate.required($('#passwordCheck').attr('id'));
	    
	    if(!requiredPassword || !requiredPasswordCheck)
	    {
		DataValidate.confirm(btn, 'Erreur : champs vide(s).');
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
			
			function(data)
			{
			    if(data.error)
			    {
				DataValidate.confirm(btn, data.error);
			    }
			    else
			    {
				DataValidate.confirm(btn, 'Informations sauvegardées !');
			    }
			}
		    );
		}
		else
		{
		    DataValidate.confirm(btn, 'Erreur : les mots de passe ne sont pas identiques.');
		}
	    }
	});
    }
    
};

User.createUser();
User.signIn();
User.signOut();
User.updateUserAccount();
User.updateUserPassword();