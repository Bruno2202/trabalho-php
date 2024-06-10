---- Arquitetura MVC ----

Foi utilizado arquitetura MVC (Model View Controler) para obter uma maior versatilidade no código, facilitando futuras manutenções no código.

Divisão de camadas do código:

> BLL (Business Logic Layer): 
Camada de regra de negócios, onde serão implementadas as validações (caso houver), por exemplo.

> DAL (Data Acess Layer):
Camada de acesso ao banco de dados. Nela, serão implementados os métodos de interação com Banco de Dados, como: Select, Delete, Update...

> MODEL:
Modelagem das classes que iremos utilizar. Implementação de métodos como "Construtor Padrão", Get's, Set's...

> VIEW:
Camada que exibição gráfica, ou seja, a página a qual será exibida ao usuário (HTML, CSS..).
