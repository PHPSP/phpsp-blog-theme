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

Existem várias formas de instalar esse plugin, escolha a que melhor lhe agradar:

#### Localmente

Baixe a versão mais recente do WordPress e instale-a em seu ambiênte de
desenvolvimento. Após isto clone este repositório em na pasta `themes`:

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

#### Finalizando a Instalação

1. Crie uma referencia no seu arquivo de hosts de blog.phpsp.dev para 192.168.56.131
1. Acesse o painel administrativo do Wordpress em http://blog.phpsp.dev
2. Ative todos os plugins na Aba "Plugins"
3. Ative o Tema do PHPSP na aba "Aparencia"
4. Acesse a sub-aba 'Cabeçalho' e inclua a imagem presente em `img/cropped-banner.jpg`.

#### Bugs

Quando encontrar um bug reporte-o no sistema de issues aqui do Github

#### Sugestões

Quer dar uma sugestão de mudança? cadastre no sistema de issues também
Você também pode abrir um Pull Request com a implementação de sua sugestão
