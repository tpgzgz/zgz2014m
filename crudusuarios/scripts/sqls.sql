-- Insertar datos en gender
INSERT INTO genders (gender) VALUES ('o'); 

-- Insertar datos en languages
INSERT INTO languages (language) VALUES ('Castellano');
INSERT INTO languages (language) VALUES ('English');

-- Insertar datos en pets
INSERT INTO pets (pet) VALUES ('Gato');
INSERT INTO pets (pet) VALUES ('Tigre');
INSERT INTO pets (pet) VALUES ('Lince');
INSERT INTO pets (pet) VALUES ('Puma');

-- Inserta un usuario
INSERT INTO users SET 
			iduser = 'b8633638-dfad-4b6c-8fae-6aaf91e23e14',
			name = 'Agustin',
            lastname = 'Calderon',
            email = 'agustincl2@gmail.com',
            password = '1234',
            description = 'descripcion',
            photo = 'image.png',
            cities_idcity = 1,
            genders_idgender = 3;

-- Update un usuario
UPDATE users SET 
			name = 'Sebastian',
            lastname = 'Calderon'
WHERE 
iduser = 'b8633638-dfad-4b6c-8fae-6aaf91e23e14';
	
INSERT INTO users SET 
			iduser = '4ea8f86a-0488-42cd-9730-cfdb0974c395',
			name = 'KAKA',
            lastname = 'kaka',
            email = 'kaka@gmail.com',
            password = '1234',
            description = 'descripcion',
            photo = 'image.png',
            cities_idcity = 1,
            genders_idgender = 3;
      
-- Delete un usuario

DELETE FROM users 
WHERE
iduser = '4ea8f86a-0488-42cd-9730-cfdb0974c395';
			
-- Insertar lenguajes al usuario
INSERT INTO users_has_languages SET
		users_iduser = '846f600e-7baa-11e4-b116-123b93f75cba',
        languages_idlanguage =1;

INSERT INTO users_has_languages SET
		users_iduser = '846f600e-7baa-11e4-b116-123b93f75cba',
        languages_idlanguage =2;        
        
-- SELECT usuarios
SELECT * FROM users;
SELECT name, email FROM users;
SELECT name FROM users WHERE password ='1234';

SELECT languages_idlanguage FROM users_has_languages
WHERE users_iduser = '846f600e-7baa-11e4-b116-123b93f75cba';

SELECT name, languages_idlanguage FROM users 
JOIN users_has_languages ON users_iduser = iduser
WHERE iduser = '846f600e-7baa-11e4-b116-123b93f75cba';

SELECT name, language FROM users 
JOIN users_has_languages ON users_iduser = iduser
JOIN languages ON idlanguage = languages_idlanguage
WHERE iduser = '846f600e-7baa-11e4-b116-123b93f75cba';


SELECT name, group_concat(language) FROM users 
JOIN users_has_languages ON users_iduser = iduser
JOIN languages ON idlanguage = languages_idlanguage
WHERE iduser = '846f600e-7baa-11e4-b116-123b93f75cba'
GROUP BY name; 


