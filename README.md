
<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>



## Sobre Sistema de Gestão

Detalhes de cada tela do sistema:

- Login
  <p>Autenticação de email e senha, utilização Validator</p>
  <p>Campos Obrigatórios.</p>
  <p>Campo <b>Email</b> com validação como tipo email</p>
  <p>Campo <b>Senha</b> maior que 5 caracteres.  </p>
 
- Dashboard
  <p>Tela Inicial com menu lateral contendo(Dashboard/Clientes/Sair)</p>
  <p>Painel central. Quantidade de Clientes Cadastrados</p> 
  
- Clientes

    <p>Pesquisar Personalizado - <b>OBS: ESTÁTICO</b> Apenas Visual
    <p>Tabela listado com (Nome|Email|Idade|Telefone|Alterar|Deletar)</p>
    <p>Campo <b>Idade</b> Cálculo realizado para encontrar a idade do cliente a partir da Dt. de Nascimento.</p>
    <p>Botão <b>Alterar</b> function edit para alterar dados encaminhado para Tela de Alterar.</p>
    <p>Botão <b>Deletar</b> function destroy de acordo com id </p>
    <p>Botão <b>Pesquisar</b> ESTÁTICO</p>
    <p>Botão <b>Cliente</b> Cadastra um novo cliente function create()</p>

- Cadastrar Cliente

    <p>Validação de campos Nome/Email/Dt. Nascimento/ Telefone</p>
    <p>Máscara no telefone / Aceita padrão tel.fixo e móvel</p>
    <p>Botão <b>Cancelar</b> volta para tela de listagem</p>
    <p>Botão <b>Salvar</b> Salva os dados e volta para tela de Listagem.</p>

- Alterar Cliente
    
    <p>Qualquer campo pode ser alterado Nome/ Email / Dt.Nascimento / Telefone utilizando a function update</p>


## Ferramenta Desenvolvimento e Recursos

- PhpStorm 2020.1.2
- Bootstrap
- Js
- Láravel
- Git
- Heroku
- MySQL


## License

Todos os direitos reservados @João Victor Ferreira Souto
