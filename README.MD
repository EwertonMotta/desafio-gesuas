# Desafio GESUAS

---

<a href="CHALLENGE.MD">Regras do desafio</a>

---

## Como executar o programa

> É necessário ter o `docker compose` e `composer` instalado na maquina.

Executar `docker compose` para startar os containers da aplicação.

```shell
docker composer up -d
```

Executar o `composer` para carregar o autoload.

```shell
composer install
```

Executar as querys do arquivo `CREATE_DATABASE.sql` que se encontra na pasta `database`.
