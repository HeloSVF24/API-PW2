# 🔎 BuscaCEP — Consulta de Endereços

Aplicação web desenvolvida em **PHP, HTML, CSS e JavaScript** para consultar endereços brasileiros por meio do CEP, utilizando a API pública ViaCEP.

O sistema permite que o usuário informe um CEP, realize uma consulta HTTP e visualize dinamicamente as informações de endereço retornadas pela API no formato JSON.

---

## 📌 Sobre o projeto

O BuscaCEP foi desenvolvido como um projeto acadêmico com o objetivo de praticar o consumo de APIs públicas em aplicações web.

A aplicação utiliza o PHP para realizar requisições HTTP à API ViaCEP, receber os dados no formato JSON, interpretar a resposta e apresentar as informações ao usuário por meio de uma interface simples, organizada e responsiva.

O projeto também implementa validação do CEP informado e tratamento de erros, oferecendo mensagens quando o CEP é inválido, não é encontrado ou ocorre algum problema durante a consulta.

## 🎯 Objetivo

Desenvolver uma aplicação web capaz de:

* Realizar requisições HTTP para uma API pública.
* Receber e interpretar dados no formato JSON.
* Processar informações utilizando PHP.
* Apresentar resultados dinamicamente em uma página web.
* Validar os dados informados pelo usuário.
* Tratar erros durante as consultas.
* Aplicar conhecimentos de HTML, CSS, JavaScript e PHP.

## ✨ Funcionalidades

* 🔎 **Consulta de CEP:** pesquisa endereços brasileiros pelo código postal.
* 🌐 **Integração com API:** realiza requisições HTTP GET para a API ViaCEP.
* 📦 **Processamento de JSON:** converte a resposta da API em dados utilizáveis pelo PHP.
* 📍 **Exibição de endereço:** apresenta CEP, logradouro, bairro, cidade, estado e DDD.
* ✅ **Validação de entrada:** verifica se o CEP possui oito dígitos.
* ⚠️ **Tratamento de erros:** informa quando o CEP não é encontrado ou quando ocorre uma falha na comunicação com a API.
* 📱 **Interface responsiva:** adapta a apresentação para computadores e dispositivos móveis.
* 🎨 **Design organizado:** apresenta formulário de pesquisa, área de resultados e mensagens informativas.

## 🛠️ Tecnologias utilizadas

| Tecnologia         | Finalidade                                                    |
| ------------------ | ------------------------------------------------------------- |
| PHP                | Processamento dos dados e comunicação com a API.              |
| HTML5              | Estruturação da página web.                                   |
| CSS3               | Estilização e organização visual da interface.                |
| JavaScript         | Formatação automática do CEP no campo de pesquisa.            |
| API REST ViaCEP    | Fornecimento dos dados de endereço.                           |
| JSON               | Formato utilizado para receber e interpretar os dados da API. |
| cURL               | Realização das requisições HTTP pelo PHP.                     |
| XAMPP              | Ambiente local para executar a aplicação PHP.                 |
| Visual Studio Code | Editor utilizado no desenvolvimento.                          |
| GitHub             | Armazenamento e compartilhamento do código-fonte.             |

## 🌐 API utilizada

O projeto utiliza a API pública ViaCEP, que permite consultar informações de endereços brasileiros a partir de um CEP.

**Site oficial:** https://viacep.com.br/

**Exemplo de requisição:**

https://viacep.com.br/ws/01001000/json/

A requisição utiliza o método HTTP GET para obter os dados correspondentes ao CEP informado.

### Exemplo de resposta JSON

```json
{
  "cep": "01001-000",
  "logradouro": "Praça da Sé",
  "complemento": "lado ímpar",
  "unidade": "",
  "bairro": "Sé",
  "localidade": "São Paulo",
  "uf": "SP",
  "estado": "São Paulo",
  "regiao": "Sudeste",
  "ibge": "3550308",
  "gia": "1004",
  "ddd": "11",
  "siafi": "7107"
}
```

Os campos podem variar de acordo com o endereço consultado. Algumas informações podem ser retornadas vazias pela API.

## ⚙️ Como funciona o sistema

O funcionamento da aplicação ocorre nas seguintes etapas:

1. O usuário acessa a página inicial do BuscaCEP.
2. Informa o CEP no campo de pesquisa.
3. Clica no botão **Consultar**.
4. O formulário envia os dados ao próprio arquivo `index.php` utilizando o método HTTP POST.
5. O PHP remove os caracteres que não sejam números e verifica se o CEP possui oito dígitos.
6. Se o CEP for válido, o PHP utiliza cURL para realizar uma requisição HTTP GET à API ViaCEP.
7. A API retorna os dados do endereço no formato JSON.
8. O PHP utiliza a função `json_decode()` para interpretar a resposta.
9. Os dados são apresentados dinamicamente na página.
10. Caso ocorra algum erro, o sistema apresenta uma mensagem informativa ao usuário.

## 📂 Estrutura do projeto

```text
BuscaCEP/
│
├── index.php
│
├── README.md
│
└── css/
    └── style.css
```

### Descrição dos arquivos

**`index.php`**

Arquivo principal da aplicação. Contém o formulário de pesquisa, a validação do CEP, a requisição HTTP realizada com cURL, o processamento da resposta JSON, o tratamento de erros e a exibição dos resultados.

**`css/style.css`**

Arquivo responsável pela aparência visual do sistema, incluindo cores, fontes, espaçamentos, formulário, cartões de resultados e adaptação para dispositivos móveis.

**`README.md`**

Arquivo de documentação que apresenta o projeto, suas funcionalidades, as tecnologias utilizadas e as instruções de instalação e execução.

## 💻 Requisitos para execução

Para executar o projeto localmente, são necessários:

* Computador com Windows, Linux ou sistema compatível.
* XAMPP ou outro ambiente com suporte a PHP.
* PHP com a extensão cURL habilitada.
* Navegador atualizado.
* Conexão com a internet para acessar a API ViaCEP.

Não é necessário utilizar banco de dados, pois as informações são consultadas diretamente na API.

## 🚀 Como instalar e executar

### 1. Instalar o XAMPP

Faça o download pelo site oficial:

https://www.apachefriends.org/

Instale o programa e abra o painel de controle do XAMPP.

### 2. Copiar a pasta do projeto

Copie a pasta `BuscaCEP` para o diretório `htdocs` do XAMPP.

No Windows, o caminho normalmente será:

```text
C:\xampp\htdocs\BuscaCEP
```

### 3. Iniciar o servidor

Abra o XAMPP Control Panel e inicie o módulo **Apache**.

O MySQL não é necessário para este projeto.

### 4. Verificar a extensão cURL

O PHP precisa ter a extensão cURL habilitada para realizar as requisições HTTP.

Se ocorrer um erro relacionado a `curl_init()`, verifique a configuração da extensão no arquivo `php.ini` e reinicie o Apache após habilitá-la.

### 5. Acessar a aplicação

Abra o navegador e acesse:

http://localhost/BuscaCEP/

A página inicial do BuscaCEP será exibida, permitindo realizar as consultas.

## 🧪 Exemplos de testes

| Teste                     | Entrada                     | Resultado esperado                                               |
| ------------------------- | --------------------------- | ---------------------------------------------------------------- |
| Consulta válida           | `01001000`                  | Exibição do endereço correspondente à Praça da Sé, em São Paulo. |
| Consulta válida com hífen | `01001-000`                 | Consulta realizada normalmente.                                  |
| CEP incompleto            | `12345`                     | Mensagem solicitando um CEP válido com oito números.             |
| CEP inexistente           | `00000000`                  | Mensagem de CEP não encontrado, conforme a resposta da API.      |
| Falha de conexão          | CEP válido sem acesso à API | Mensagem informando que não foi possível realizar a consulta.    |

Os resultados dependem da resposta atual da API e da disponibilidade da conexão com a internet.

## 🔐 Validação e tratamento de erros

A aplicação utiliza mecanismos para melhorar a segurança e a confiabilidade do sistema:

* Verificação do método de envio do formulário.
* Remoção de caracteres não numéricos do CEP.
* Validação da quantidade de dígitos informados.
* Definição de limites de tempo para a conexão e a requisição HTTP.
* Verificação de erros na comunicação com a API.
* Verificação do código de resposta HTTP.
* Validação da interpretação do JSON.
* Tratamento de CEPs não encontrados.
* Uso de `htmlspecialchars()` para proteger a saída de dados exibida na página.

Esses mecanismos ajudam a evitar entradas inválidas e a apresentar mensagens mais claras ao usuário.

## 📚 Conceitos aplicados

Durante o desenvolvimento, foram utilizados os seguintes conceitos de programação e desenvolvimento web:

**Requisições HTTP:** comunicação entre a aplicação PHP e um serviço externo por meio do protocolo HTTP.

**API REST:** serviço que disponibiliza informações para outras aplicações por meio de requisições.

**JSON:** formato de intercâmbio de dados utilizado pela API para retornar as informações do endereço.

**cURL:** recurso do PHP utilizado para enviar requisições HTTP e receber respostas de servidores externos.

**`json_decode()`:** função responsável por converter o JSON recebido em uma estrutura de dados que pode ser utilizada pelo PHP.

**Formulários HTML:** utilizados para receber o CEP informado pelo usuário.

**JavaScript:** utilizado para formatar o CEP automaticamente durante a digitação.

**CSS responsivo:** utilizado para adaptar o layout a diferentes tamanhos de tela.

## 🎓 Finalidade acadêmica

Este projeto tem finalidade educacional e foi desenvolvido para demonstrar, na prática, o consumo de uma API pública em uma aplicação web.

A atividade permite compreender como uma aplicação recebe dados do usuário, realiza uma requisição HTTP, interpreta uma resposta JSON e apresenta as informações obtidas de maneira dinâmica.

## 🔮 Possíveis melhorias futuras

O projeto poderá receber novas funcionalidades, como:

* Histórico das últimas consultas.
* Botão para limpar os resultados.
* Opção para copiar o endereço encontrado.
* Integração com outras APIs públicas.
* Exibição de informações adicionais do endereço.
* Melhorias de acessibilidade.
* Testes automatizados.

## 👩‍💻 Autoria

**Projeto:** BuscaCEP — Consulta de Endereços

**Desenvolvido por:** [Seu nome]

**Disciplina:** [Nome da disciplina]

**Instituição:** [Nome da escola]

**Ano:** 2026

## 📄 Licença

Este projeto foi desenvolvido para fins acadêmicos e de aprendizagem. A API ViaCEP é um serviço externo, sujeito às suas próprias condições de uso.

---

⭐ Projeto desenvolvido para praticar PHP, requisições HTTP, consumo de APIs públicas e processamento de dados JSON.
