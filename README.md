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

#### Produção 
Com o WordPress instalado baixe o [thema na versão mais recente](https://github.com/PHPSP/phpsp-blog-theme/releases) e instale pelo gerenciador de temas do WordPress.
É necessário instalar os [plugins]() e ativalos;

#### Localmente

Baixe a versão mais recente do WordPress e instale-a em seu ambiênte de desenvolvimento. Após isto clone este repositório em na pasta `themes`:

```shell
cd seu-ambiente-de-desenvolvimento/wp-content/themes/
git clone git@github.com:PHPSP/phpsp-blog-theme.git
```

Após instalar o tema instale os plugins e dependências executando o arquivo de
build com o `phing`

Finalize a instalação seguindo as instruções no final.

#### Com Vagrant

Se você ainda não tiver, realize a instalação das ultimas versões do VirtualBox
e do Vagrant no seu ambiente de desenvolvimento. Em seguida navegue pelo
terminal até o diretório desse repositório e execute o seguinte comando

```shell
vagrant up
```

Finalize a instalação seguindo as instruções na seção abaixo

Crie uma referencia no seu arquivo de hosts de blog.phpsp.dev para 192.168.56.131

O Painel Administrativo poderá ser acessado em http://blog.phpsp.dev

#### Finalizando a Instalação

1. Acesse o painel administrativo do Wordpress
2. Ative todos os plugins na Aba "Plugins"
3. Ative o Tema do PHPSP na aba "Aparencia"
4. Acesse a sub-aba 'Cabeçalho' e inclua a imagem presente em `img/cropped-banner.jpg`.

### Plugins e dependências
*  [WP No Category Base](https://wordpress.org/plugins/wp-no-category-base/)
*  [Disqus Comment System](https://wordpress.org/plugins/disqus-comment-system/)
*  [Crayon Syntax Highlighter](https://wordpress.org/plugins/crayon-syntax-highlighter/)
*  [Event Organiser](http://wordpress.org/plugins/event-organiser/)

### Bugs

Quando encontrar um bug reporte-o no sistema de issues aqui do Github

### Sugestões

Quer dar uma sugestão de mudança? cadastre no sistema de issues também
Você também pode abrir um Pull Request com a implementação de sua sugestão

### Licença

![Licença Creative Commons](http://i.creativecommons.org/l/by-nc-nd/3.0/88x31.png)

