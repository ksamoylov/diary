# Diary

To build project you need to:

- Copy env-files:

```bash
cp .env_php.dist .env_php && cp .env_mysql.dist .env_mysql
```
- Execute docker containers:

```bash
docker-compose up -d
```

- Execute migrations:

```bash
vendor/bin/phpmig migrate
```
