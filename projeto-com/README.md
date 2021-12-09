# **Projeto de API rápida**

## **Apresentação**
Fazer 2... um com lumem e outro sem... e dizer que se tivesse tido tempo tinha estudado sobre cache com redis

teria feito o scape melhor no parametro da URL
treia trabalhado melhor os heards de resposta

php -S localhost:8000 -t public


## **DataBase**
```
CREATE TABLE IF NOT EXISTS fasters.cities (
    id INT NOT NULL AUTO_INCREMENT, 
    name VARCHAR(50) NOT NULL,
    date DATETIME NOT NULL,
    measurement DECIMAL(4,2) NOT NULL, 
    PRIMARY KEY (id)
);
```

## **UP DataBase**
`docker-compose up --detach --force-recreate --build`

## **RUNNING**
`docker-compose start`
`docker-compose restart`

## **ACCESSING**
Material - `http://127.0.0.1:8001/{folder}/{exemplo}.php`
DataBase - `http://127.0.0.1:8002`

`docker-compose exec app bash`
`docker-compose exec db bash` 







1. Quanto tempo você usou para completar a solução apresentada? O que você faria se tivesse mais tempo?
2. Se usou algum framework, qual foi o motivo de ter usado este? Caso contrário, por que não utilizou nenhum?
