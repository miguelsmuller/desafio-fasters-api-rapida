# **Desafio de API rápida**

## **Apresentação**
Para o teste técnico, deve-se criar uma API REST (Web App) com as seguintes premissas: 
* Disponibilizar um endpoint que retorna informações de temperatura de uma determinada cidade a ser definida por parâmetro.
* Os dados devem climáticos devem ser coletados na API do OpenWeather (https://openweathermap.org/api);
* A cada requisição, os dados climáticos devem ser armazenadas em uma tabela no banco de dados a fim de serem usadas como cache.
* Ao solicitar os dados para uma cidade, deve-ser verificar se existe dados climáticos armazenados banco de dados nos últimos 20 minutos. Se houver, retonar esses dados via API. Somente então se não houver dados para serem usados como cache, consultar os do openweathermap. O objetivo é evitar chamadas desnecessárias ao openweathermap e retornar um resultado mais rápido.

## **Solução**

Foram feitas 2 soluções para o problema apresentado. Um solução NÃO UTILIZA framework e a outra solução UTILIZA Lumen Framework.

Qualquer uma das soluções pode ser rodada com o comando abaixo e acessada através do *http://localhost:8000*

```sh
# Iniciar o buil-in server inside {PROJECT}/www/ folder
php -S localhost:8000 -t public
```

`composer dumpautoload -o`


## **Docker and DataBase**
### **Modelo de Banco de dados utilizado**
```sql
CREATE TABLE IF NOT EXISTS fasters.cities (
    id INT NOT NULL AUTO_INCREMENT, 
    name VARCHAR(50) NOT NULL,
    date DATETIME NOT NULL,
    measurement DECIMAL(4,2) NOT NULL, 
    PRIMARY KEY (id)
);
```

### **Utilização do Docker**
```sh
# Subir o container
docker-compose up --detach --force-recreate --build

# Iniciar o container
docker-compose start

# Reiniciar o container
docker-compose restart
```

### **PHPMyAdmin**
`http://127.0.0.1:8002`







