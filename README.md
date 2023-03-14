# Correr el Contenedor con el Demo del Pasaporte Digital
``` 
docker-compose run --rm frontend sh
``` 

# Empezar la aplicación dentro del contenedor.
```
npm start
```

# Pasaporte Digital (Desarollo)

```
docker-compose up
docker exec -it mysql_backend bash
mysql -u root -p # enter password (docker-compose.yaml)
create database stuff;
use stuff;
create table usuarios(usuario_id int unsigned not null auto_increment,nombre varchar(50),contraseña varchar(50),pasaporte varchar(50),creditos int(4),correo varchar(50),primary key(usuario_id));
insert into usuarios(nombre,contraseña,pasaporte,creditos,correo) values ("quinn","qubit","pasaporte",20,"q-bit@gmail.com");

```