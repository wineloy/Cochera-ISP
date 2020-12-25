CREATE PROCEDURE `ValidarUsuario` (
	in _email varchar(250),
    in _password text
)
BEGIN

	if exists (select 1 from usuarios where email = _email ) = 1 then 
		if exists(select 1 from usuarios where contraseña = _password) = 1 then 
			select 1; #Te do la autentificacion 
		else 
			select -2; #Contraseña erronea
		end if;
    else
		select -1; #Este email no existe
	end if;
END
