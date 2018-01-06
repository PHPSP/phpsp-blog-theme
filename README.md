                   __
            ____  / /_  ____  ____ ____
           / __ \/ __ \/ __ \/ ___/ __ \
          / /_/ / / / / /_/ (__  ) /_/ /
         / .___/_/ /_/ .___/____/ .___/
        /_/         /_/        /_/.org.br

## Blog

> Este tema foi gentilmente cedido ao PHPSP pela Soyuz
[http://www.soyuz.com.br]

## Contribua

### Instalação

#### Em Produção

Com o WordPress instalado baixe o [tema na versão mais recente](https://github.com/PHPSP/phpsp-blog-theme/releases) e instale pelo gerenciador de temas do WordPress.

É necessário instalar os [plugins](#plugins-e-depend%C3%AAncias) e ativá-los;

#### Em Desenvolvimento

##### Via Docker Compose (recomendado)

Garanta que tenha a última versão do [Docker](https://www.docker.com/) e do [Docker Compose](https://docs.docker.com/compose/).

Em seguida navegue pelo terminal até este diretório clonado na sua máquina, e execute o seguinte comando:

```shell
docker-compose up
```

Crie uma referência no seu arquivo de hosts de `blog.phpsp.dev` para `127.0.0.1`, algo como:

```
127.0.0.1 localhost blog.phpsp.dev
```

O tema já estará ativado quando você acessar <http://blog.phpsp.dev/>.

Caso seja necessário acessar o painel administrativo, <http://blog.phpsp.dev/login>, o usuário é `wordpress` e a senha `wordpress`.

##### Manualmente

Baixe a versão mais recente do WordPress e instale-a em seu ambiente de desenvolvimento.

Após isto, clone este repositório na pasta `themes`:

```shell
cd seu-ambiente-de-desenvolvimento/wp-content/themes/
git clone https://github.com/phpsp-blog-theme.git
```

Após instalar o tema, instale os plugins e dependências executando o arquivo de
build com o `phing`.

Por fim:

1. Acesse o painel administrativo do Wordpress
2. Ative todos os plugins na aba **Plugins**
3. Ative o Tema do PHPSP na aba **Aparencia**
4. Acesse a sub-aba **Cabeçalho** e inclua a imagem presente em `img/cropped-banner.jpg`.

### Plugins e dependências

*  [WP No Category Base](https://wordpress.org/plugins/wp-no-category-base/)
*  [Disqus Comment System](https://wordpress.org/plugins/disqus-comment-system/)
*  [Crayon Syntax Highlighter](https://wordpress.org/plugins/crayon-syntax-highlighter/)
*  [Event Organiser](http://wordpress.org/plugins/event-organiser/)
*  [Easy WP SMTP](https://wordpress.org/plugins/easy-wp-smtp/)
*  [Meetup Widgets](https://wordpress.org/plugins/meetup-widgets/)

### Bugs

Quando encontrar um bug, reporte-o no [sistema de issues](https://github.com/PHPSP/phpsp-blog-theme/issues) aqui do GitHub.

### Sugestões

Quer dar uma sugestão de mudança? Cadastre no [sistema de issues](https://github.com/PHPSP/phpsp-blog-theme/issues).

Você também pode [abrir um Pull Request](https://github.com/PHPSP/phpsp-blog-theme/pulls) com a implementação de sua sugestão.

### Licença

![Licença Creative Commons](http://i.creativecommons.org/l/by-nc-nd/3.0/88x31.png)

