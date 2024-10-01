# Urna Eletrônica Simples 🗳️

Bem-vindo à minha urna eletrônica didática! 🎉 Este projeto foi criado para fins educativos e demonstra como construir uma urna eletrônica básica usando PHP e MySQL. Se você está aprendendo sobre programação web ou quer brincar com simulações de eleições, você está no lugar certo! 😎

## Do que se trata?

Esta urna eletrônica permite que você simule uma votação com cinco candidatos. Você pode escolher seu candidato preferido, votar em branco ou anular o voto. No fim, temos uma página de apuração que mostra o total de votos para cada candidato. 🗳️✨

## Como instalar? 🤔

### 1. Clone o repositório
Primeiro, clone este repositório no seu ambiente local:
```bash
git clone https://github.com/profedney/urna.git
```

### 2. Configurando o banco de dados MySQL 💾

1. Abra o **phpMyAdmin** (ou sua ferramenta favorita para gerenciar MySQL).
2. Crie um banco de dados chamado `eleicao`. 📦
3. Importe o arquivo `urna.sql` localizado na pasta `/banco` para dentro do seu novo banco de dados. 💥
   - No **phpMyAdmin**, vá até a aba **Importar**, selecione o arquivo `urna.sql`, e clique em **Executar**.
   
Pronto! O banco de dados está criado e suas tabelas estão prontas para receber votos. ✅

### 3. Configurando o ambiente PHP 🌐

- Certifique-se de ter um servidor local configurado (como o XAMPP, WAMP ou MAMP).
- Coloque os arquivos do projeto na pasta `htdocs` (ou equivalente) do seu servidor local.

### 4. Ajustando a conexão com o banco de dados 🔌

- No arquivo `conexao.php`, as configurações já estão definidas da seguinte forma:

```php
<?php
// Configurações do banco de dados
$host = 'localhost'; // Nome do host
$dbname = 'eleicao'; // Nome do banco de dados
$username = 'root'; // Nome de usuário do banco de dados
$password = ''; // Senha do banco de dados

// Criar conexão com o banco de dados
$conn = mysqli_connect($host, $username, $password, $dbname);

// Verificar a conexão
if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
?>
```

Verifique se esses dados estão corretos para o seu ambiente local. Caso necessário, modifique o nome do banco de dados, usuário ou senha para coincidir com as configurações do seu sistema.

### 5. Testando a urna 🖥️

Agora que tudo está configurado, acesse o projeto pelo navegador, digitando no seu browser:
```
http://localhost/urna
```

Escolha seu candidato, vote, e veja os resultados na página de apuração! 🎉🗳️

## E aí, vamos votar? 😎

Este projeto é uma ferramenta divertida e educativa. Se você quiser aprender mais, ou sugerir melhorias, fique à vontade para explorar o código, fazer forks, pull requests e compartilhar com amigos!

Divirta-se votando (sem política envolvida, por favor)! 🎉
