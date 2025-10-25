# 📝 To-Do List – Aplicación de Gestión de Tareas con Laravel

Ejercicio práctico
Aplicación web básica para la gestión de tareas (To-Do List) con autenticación de usuarios, validación de formularios y operaciones CRUD completas.

## 🧱 Tecnologías utilizadas
### Backend

- PHP 8.2 (Laravel 10)
- MySQL 8
- Composer (gestor de dependencias)
- Nginx (servidor web)
- Docker y Docker Compose (orquestación)

### Frontend
- HTML, CSS (personalizado)
- Blade Templates (Laravel)
- JavaScript (con SweetAlert2 para mensajes)
- Validaciones básicas en formularios

## ⚙️ Requisitos previos

Asegúrate de tener instalados en tu sistema:
- Docker Desktop
- Docker Compose
- Git
- Navegador web moderno

## 🐳 Configuración con Docker

El proyecto incluye un entorno completo con Laravel + MySQL + PhpMyAdmin + Nginx, todo dentro de contenedores.

1️⃣ Clonar el repositorio

```bash
git clone https://github.com/tu-usuario/to-do-list.git

cd to-do-list
```

2️⃣ Construir y levantar los contenedores

```bash
docker-compose up -d --build
```
Esto creará los contenedores de Laravel, MySQL, PhpMyAdmin y Nginx.

3️⃣ Instalar dependencias de Laravel
```
docker exec -it to-do-list bash
```

Luego ejecuta:
```bash
composer install
cp .env.example .env
php artisan key:generate
```

4️⃣ Configurar la base de datos
Edita el archivo .env y asegúrate de que las variables coincidan con las del docker-compose.yml:

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
```

Luego ejecuta las migraciones:

```bash
php artisan migrate
```

🌐 Acceso a la aplicación
Servicio	URL
Aplicación Laravel http://localhost o http://localhost:8000


### Credenciales por defecto de phpMyAdmin:
phpMyAdmin	http://localhost:8080

Usuario: laravel

Contraseña: secret
