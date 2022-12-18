# Short Url 

## Sobre 📚
É um simples encurtador de urls desenvolvido utilizando-se testes automatizados, Livewire e Tailwind, nesta aplicação o usuário pode criar e gerenciar uma url curta, podendo observar o desempenho de visualizações diárias, semanais, etc...

## Configuração ⚙️
```bash
    # Faça o clone do repositório
    git clone https://github.com/Ronildo-Sousa/short-url.git
```
```bash
   # Entre na pasta do projeto e instale as dependências utilizando o Docker
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v $(pwd):/var/www/html \
        -w /var/www/html \
        laravelsail/php81-composer:latest \
        composer install --ignore-platform-reqs
```
```bash
    # Crie o arquivo .env
    cp .env.example .env

    # Inicialize o container Sail
    ./vendor/bin/sail up -d

    # Crie a chave da aplicação
    ./vendor/bin/sail artisan key:generate

    # instale as dependências do frontend
    npm install && npm run build

    # acesse o projeto no navegador
    http://localhost
```