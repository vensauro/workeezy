# workeezy
Projeto iniciado na disciplina de Economia da Inovação.

## O que é o Workeezy?

É uma plataforma que visa gamificar atividades corporativas de novos colaboradores, com foco especial/inicial em estagiários, aprendizes e trainees. Buscando aumentar o engajamento e melhorar a qualidade no aprendizado e adaptação dos novos colaboradores à empresa.

## Instruções de instalação do projeto:

Antes de mais nada, verifique que possui uma versão do PHP e uma do NodeJS instalada em seu computador, caso já possua, digite o comando no terminal:

`npm install` ou, se preferir (eu recomendo) `yarn` (sim, apenas yarn *-*)

Agora rode o comando para instalar as dependências do _Composer_

`composer install`

Após isso, será necessário copiar o conteúdo do arquivo de configuração _".env.example"_ para um novo arquivo _".env"_, utilize o comando:

###### Caso use Windows
`copy .env.example .env`

###### Caso use algum SO baseado em Unix (Linux, MacOS...)
`cp .env.example .env`

Agora digite o comando pra gerar uma key do Laravel para sua aplicação

`php artisan key:generate`

### Beleza, mas como eu visualizo o projeto no navegador?

Simples, basta rodar primeiro o servidor do artisan com o comando:

`php artisan serve`

E logo depois rodar o servidor do webpack para monitorar as alterações no código:

`npm run watch` ou `yarn watch` (recomento usar o yarn s2)

#### Autenticação e serviços:

Verifique que possui uma base de dados (_mysql_) com o nome _workeezy_ criada, caso já possua, rode o comando para criar as tabelas utilizando as _migrations_ e os _seeders_ (atualmente existe as migrations padrão do laravel 6.x):

`php artisan migrate --seed`

### Pronto, agora é só meter a mão na massa e #BORACODAR!!!