###################
Blog de artigos Techcode
###################

Blog de artigos sobre tecnologia, notícias e programação desenvolvido em PHP utilizando o Framework Codeigniter 3 e Bootstrap 4.

*******************
Libraries
*******************

As bibliotecas utilizadas foram:

- Upload
- Form Validation
- Session 
- Database
- Email
- Pagination

**************************
HOOKS
**************************

O uso de hooks foi para comprimir o HTML de saída utilizando o compress para que a aplicação carregue mais rápido.

**************************
Helpers
**************************

Os auxiliares utilizados foram:

- URL 
- FORM 
- Auxiliares_helper (Auxiliares gerais da aplicação)

**************************
PHP Mailer
**************************

A biblioteca PHPMailer para envio de email está sendo utilizada também.
Por estar sendo utilizado o servidor o local, o e-mail final está sendo enviado para uma conta com permissões de acesso a baixa segurança

**************************
CRUD
**************************

O sistema de administração do blog possui Cadastro de Conteúdo e Usuários, Update e Delete de dados. 
Possui outras consultas no banco para paginação, registros, categorias etc..


**************************
OBSERVAÇÕES
**************************

- As imagens para Upload de artigos devem possuir largura de 540px e altura de 230px para que no Blog possuam as mesmas dimensões. Recomendado criar um retângulo utilizando o Figma e importar a imagem em PNG para formatar.
- O envio de e-mail via a biblioteca PHPMailer está comentada pois como é utiizado em servidor local gera erros se o e-mail de destinatário não estiver liberado para minima segurança.  
- Os dois sistemas de filtro para pesquisa de artigos são: por categoria e por titulo utilizando LIKE
