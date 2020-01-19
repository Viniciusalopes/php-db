# php-db
Manipulação de bancos de dados com PHP

## A idéia
  A idéia inicial é desenvolver uma solução com o máximo de abstração de conexão com a maioria dos bancos de dados conhecidos, encapsulando e abstraindo a conexão com o banco, os métodos do CRUD, as tabelas e etc.

  O objetivo principal é ter um ponto de partida pronto para utilização em novos projetos, bastando apenas setar as configurações de conexão com o banco em um arquivo ___.json___ como este:

```
{
    "comment": "dbconfig - config file for database connection",
    "author": "Vovolinux",
    "date": "2020-01-19",
    "type": "mysql",
    "host": "http://localhost or 111.222.333.444",
    "database": "database-name",
    "user": "username",
    "password": "NASA-password"
}
```

## Funcionalidades desejadas

  Após a configuração da conexão, a solução deverá obter a estrutura de tabelas do banco e gerar ___automaGicamente___ os arquivos __.json__ com a estrutura de dados, dispensando a necessidade de digitar strings de SQL, que serão construídas a partir da base de informações dos arquivos ___.json___.


  Numa segunda etapa, pretendo transformar a aplicação em uma api para consumir dados desses bancos.
  
  Idéia anotada, mão na massa!

[GitHub Repository](https://github.com/Viniciusalopes/php-db)
[GitHub Project](https://github.com/users/Viniciusalopes/projects/4)
