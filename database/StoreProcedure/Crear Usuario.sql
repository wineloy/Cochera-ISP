CREATE PROCEDURE `crearUsuario` (
	in _nombre varchar(150),
    in _apellidos varchar(250),
    in _telefono varchar(20),
    in _email varchar(250),
    in _password text
)
BEGIN

	DECLARE idUsuario integer;
    START transaction;
    INSERT INTO CLIENTES () VALUES(NULL,_nombre, _apellidos, _telefono);
	SELECT IDCLIENTE FROM CLIENTES ORDER BY IDCLIENTE DESC LIMIT 1 INTO idUsuario;
    IF exists(SELECT 1 FROM USUARIOS WHERE EMAIL = _email) <> 1 THEN 
		INSERT INTO USUARIOS () VALUES (NULL, idUsuario,  _email, _password);
		SELECT 1; #sE REGISTRO 
    ELSE
		SELECT -1; #CORREO REPETIDO
	END IF;
    COMMIT;
END
