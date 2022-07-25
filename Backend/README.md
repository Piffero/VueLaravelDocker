<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### Compilar a imagens
```sh
docker-compose build app
```

### Criar variáveis de usuario e grupo
```sh
export USUID=$(id -u) && export GRPID=$(id -g)
```

### Criar/subir containers(build)
```sh
docker-compose up --build -d
```

### Criar/subir containers(sem build)
```sh
docker-compose up -d
```

### Verificar se os containers subiram
```sh
docker-compose ps
```

### URL de acesso
http://localhost:8080


### Dependencias e configurações
```sh
docker-compose exec app composer install
docker-compose exec app composer run post-root-package-install
```

### Migrations
#### Migrate
```sh
docker-compose exec app php artisan migrate
```
#### Migrate rollback
```sh
docker-compose exec app php artisan migrate:rollback
```

### Seeder
#### Seed
```sh
docker-compose exec app php artisan db:seed
```