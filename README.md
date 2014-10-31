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

Com o WordPress instalado baixe o [tema na versão mais recente](https://github.com/PHPSP/phpsp-blog-theme/releases) e instale pelo gerenciador de temas do WordPress.

É necessário instalar os [plugins](#plugins-e-depend%C3%AAncias) e ativá-los;

#### Localmente

Baixe a versão mais recente do WordPress e instale-a em seu ambiente de desenvolvimento. Após isto, clone este repositório na pasta `themes`:

```shell
cd seu-ambiente-de-desenvolvimento/wp-content/themes/
git clone git@github.com:PHPSP/phpsp-blog-theme.git
```

Após instalar o tema, instale os plugins e dependências executando o arquivo de
build com o `phing`.

Finalize a instalação seguindo as [instruções no final](#finalizando-a-instala%C3%A7%C3%A3o).

#### Com Vagrant

Se você ainda não tiver, realize a instalação das ultimas versões do VirtualBox
e do Vagrant no seu ambiente de desenvolvimento. Em seguida navegue pelo
terminal até o diretório desse repositório e execute o seguinte comando:

```shell
vagrant up
```

Finalize a instalação seguindo as [instruções na seção abaixo](#finalizando-a-instala%C3%A7%C3%A3o).

Crie uma referência no seu arquivo de hosts de `blog.phpsp.dev` para `192.168.56.131`.

O Painel Administrativo poderá ser acessado em http://blog.phpsp.dev.

#### Finalizando a Instalação

1. Acesse o painel administrativo do Wordpress
2. Ative todos os plugins na aba **Plugins**
3. Ative o Tema do PHPSP na aba **Aparencia**
4. Acesse a sub-aba **Cabeçalho** e inclua a imagem presente em `img/cropped-banner.jpg`.

### Plugins e dependências

*  [WP No Category Base](https://wordpress.org/plugins/wp-no-category-base/)
*  [Disqus Comment System](https://wordpress.org/plugins/disqus-comment-system/)
*  [Crayon Syntax Highlighter](https://wordpress.org/plugins/crayon-syntax-highlighter/)
*  [Event Organiser](http://wordpress.org/plugins/event-organiser/)
*  [Social Login](https://wordpress.org/plugins/oa-social-login/)

### Configurando o Social Login

1. Crie uma conta no site [OneAll](https://app.oneall.com/signin/)
2. Adicione um novo Site e guarde as infromações Subdomain, Public Key e Private Key.
![Alt text](/oneall-api-credentials.png?raw=true "Informações OneAll")
3. Configure o Plugin na aba **Social Login** do Wordpress (Seção API Settings),
com as informações acima.
![Alt text](/oneall-wp-api-settings.png?raw=true "Configuração Social Plugin")
4. Habilite o plugin para usar o GitHub como identity provider.
5. Registre a aplicação no GitHub (Developer applications) para usar GitHub API com
a conta do OneAll criada no passo 2.
    register-app-github.png
![Alt text](/register-app-github.png?raw=true "Registro app GitHub")

### Bugs

Quando encontrar um bug, reporte-o no [sistema de issues](https://github.com/PHPSP/phpsp-blog-theme/issues) aqui do GitHub.

### Sugestões

Quer dar uma sugestão de mudança? Cadastre no [sistema de issues](https://github.com/PHPSP/phpsp-blog-theme/issues).

Você também pode [abrir um Pull Request](https://github.com/PHPSP/phpsp-blog-theme/pulls) com a implementação de sua sugestão.

### Licença

![Licença Creative Commons](http://i.creativecommons.org/l/by-nc-nd/3.0/88x31.png)
