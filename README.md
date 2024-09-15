**RESUMO PARA A PROVA - Visão Geral do Framework MVC**

Este framework é uma implementação simples do padrão arquitetural MVC (Model-View-Controller) em PHP. Ele foi construído para gerenciar operações CRUD (Create, Read, Update, Delete) para entidades como clientes, veículos e aluguéis em um contexto de aplicação web.

---

### **Estrutura de Diretórios**

A estrutura de diretórios é organizada da seguinte forma:

- **controller/**: Contém os controladores que gerenciam as requisições e coordenam a interação entre modelos e visões.
- **dao/**: Data Access Objects (DAOs) que interagem com o banco de dados.
  - **interface/**: Interfaces que definem os métodos que os DAOs devem implementar.
  - **mysql/**: Implementações específicas dos DAOs usando MySQL.
- **generic/**: Contém classes genéricas e utilitárias que suportam o funcionamento do framework.
- **public/**: Arquivos públicos acessíveis via URL, como páginas HTML e formulários.
- **service/**: Contém classes de serviço que contêm a lógica de negócios da aplicação.
- **template/**: Classes relacionadas ao template da aplicação.
- **view/**: Contém as classes de visão que renderizam o conteúdo para o usuário.

---

### **Fluxo de Execução**

1. **Roteamento de Requisições**

   - Todas as requisições entram pelo arquivo `index.php`.
   - O `index.php` verifica se o parâmetro `param` está definido na URL (por exemplo, `/mvc20242/cliente/lista`).
   - O controlador genérico (`generic/Controller.php`) usa este parâmetro para determinar qual ação executar.

2. **Controller Genérico**

   - A classe `Controller` mantém um array `$arrChamadas` que mapeia rotas para objetos `Acao`.
   - Cada objeto `Acao` contém o nome da classe do controlador específico e o método a ser executado.
   - O método `verificarCaminho($rota)` verifica se a rota existe no array e, se existir, executa a ação correspondente.

3. **Classe Acao**

   - Localizada em `generic/Acao.php`, a classe `Acao` é responsável por instanciar o controlador específico e chamar o método apropriado.
   - Permite uma maneira dinâmica de chamar métodos de controladores com base na rota.

4. **Controladores Específicos**

   - Os controladores específicos (por exemplo, `ClienteController`, `VeiculoController`, `AluguelController`) estão localizados na pasta `controller/`.
   - Cada controlador possui métodos que correspondem às ações possíveis (listar, criar, alterar, deletar).
   - Os controladores interagem com os serviços correspondentes para realizar operações de negócios.

5. **Serviços**

   - As classes de serviço (por exemplo, `ClienteService`, `VeiculoService`, `AluguelService`) estão na pasta `service/`.
   - São responsáveis por implementar a lógica de negócios da aplicação.
   - Interagem com os DAOs para acessar o banco de dados.
   - Podem conter validações e regras específicas antes de persistir ou recuperar dados.

6. **DAOs e Interfaces**

   - As interfaces dos DAOs estão em `dao/interface/` e definem os métodos que devem ser implementados.
   - As implementações específicas usando MySQL estão em `dao/mysql/`.
   - Os DAOs estendem a classe `MysqlFactory`, que fornece acesso à instância do banco de dados.

7. **Conexão com o Banco de Dados**

   - A classe `MysqlSingleton` em `generic/MysqlSingleton.php` implementa o padrão Singleton para garantir que apenas uma conexão com o banco de dados seja usada durante o ciclo de vida da aplicação.
   - Oferece o método `executar($sql, $param)` para executar consultas parametrizadas de forma segura.

8. **Visões e Templates**

   - As classes de visão estão em `view/` e estendem a classe genérica `View`.
   - As visões são responsáveis por renderizar os dados recebidos dos controladores.
   - Utilizam templates definidos em `template/` para estruturar o cabeçalho e o rodapé das páginas.
   - Os arquivos HTML/PHP que compõem o conteúdo estão em `public/`.

---

### **Detalhes Importantes**

#### **AutoLoad**

- O arquivo `generic/AutoLoad.php` configura o autoloader para carregar automaticamente as classes necessárias com base no namespace e no caminho do arquivo.
- Isso elimina a necessidade de incluir manualmente cada arquivo de classe.

#### **Namespaces**

- O uso de namespaces organiza o código e evita conflitos de nomes entre classes.
- Cada pasta principal tem seu próprio namespace (por exemplo, `controller`, `service`, `dao\mysql`).

#### **Padrão MVC**

- **Model (Modelo)**: Representado pelos DAOs que interagem com o banco de dados.
- **View (Visão)**: Classes em `view/` que renderizam os dados em páginas HTML.
- **Controller (Controlador)**: Classes em `controller/` que processam as requisições e coordenam entre modelos e visões.

#### **Rotas**

- As rotas são definidas como chaves no array `$arrChamadas` do `Controller` genérico.
- Cada rota segue o padrão `entidade/ação` (por exemplo, `cliente/lista`, `veiculo/criar`).
- As rotas estão diretamente ligadas aos métodos dos controladores.

#### **Fluxo de Dados**

1. O usuário faz uma requisição para uma rota específica.
2. O `index.php` encaminha a requisição para o `Controller` genérico.
3. O `Controller` identifica a ação a ser executada e instancia o controlador específico.
4. O controlador específico chama o método correspondente.
5. O método do controlador chama o serviço para realizar a lógica de negócios.
6. O serviço, se necessário, interage com o DAO para acessar o banco de dados.
7. Os dados retornados são passados para a visão.
8. A visão renderiza os dados utilizando templates e os apresenta ao usuário.

#### **Interação com o Banco de Dados**

- As consultas SQL são parametrizadas para prevenir ataques de injeção SQL.
- O método `executar` na classe `MysqlSingleton` prepara e executa as consultas, vinculando os parâmetros fornecidos.
- As operações CRUD são implementadas nos DAOs correspondentes a cada entidade.

#### **Templates e Views**

- A separação entre lógica e apresentação é mantida através das visões e templates.
- A classe `View` utiliza um objeto que implementa `ITemplate` para renderizar o cabeçalho e o rodapé.
- O conteúdo específico é incluído dinamicamente através do método `conteudo`.

---

### **Exemplo Prático: Fluxo de Listagem de Clientes**

1. **Requisição**

   - O usuário acessa a rota `/mvc20242/cliente/lista`.

2. **Roteamento**

   - O `index.php` captura o parâmetro `param` como `cliente/lista`.
   - O `Controller` genérico verifica a rota e identifica que deve executar o método `listarClientes` do `ClienteController`.

3. **Controlador**

   - O `ClienteController` chama o método `listaClientes` do `ClienteService`.

4. **Serviço**

   - O `ClienteService` chama o método `listar` do `ClienteDAO`.

5. **DAO**

   - O `ClienteDAO` executa a consulta SQL para recuperar a lista de clientes do banco de dados.

6. **Retorno de Dados**

   - Os dados são retornados ao `ClienteService`, que os passa de volta ao `ClienteController`.

7. **Visão**

   - O `ClienteController` instancia o `ClienteView` e chama o método `listaClientes`, passando os dados.

8. **Renderização**

   - O `ClienteView` chama o método `conteudo` da classe `View`, que inclui o arquivo `public/ListaCliente.php`.
   - O arquivo `ListaCliente.php` itera sobre os dados e gera a tabela de clientes.

9. **Resposta**

   - O conteúdo renderizado é enviado ao navegador do usuário.

---

### **Considerações sobre a Implementação**

- **Simplicidade**: O framework é simples e focado no entendimento do padrão MVC.
- **Extensibilidade**: Novas entidades podem ser adicionadas seguindo o mesmo padrão (controlador, serviço, DAO, visão).
- **Segurança**: O uso de consultas parametrizadas ajuda a prevenir injeção de SQL.
- **Organização**: A separação clara entre modelos, visões e controladores facilita a manutenção e a escalabilidade.

---

### **Possíveis Melhorias**

- **Validações**: Implementar validações nos dados recebidos antes de persistir no banco.
- **Tratamento de Erros**: Adicionar handling de exceções e erros para melhorar a robustez.
- **Autenticação e Autorização**: Implementar mecanismos de login e controle de acesso.
- **Layouts**: Melhorar os templates para oferecer uma interface mais amigável.
- **Refatoração do Autoloader**: Usar o PSR-4 para autoloading de classes.

---

### **Conclusão**

Este framework oferece uma base sólida para compreender os princípios fundamentais do padrão MVC em uma aplicação PHP. Através da separação de responsabilidades e da organização modular do código, ele facilita o desenvolvimento e a manutenção de aplicações web estruturadas.

Para estudar corretamente para a prova, recomendo que você:

- **Entenda o Fluxo de Requisição**: Saiba como uma requisição é roteada e processada pelo framework.
- **Conheça as Responsabilidades de Cada Componente**: Diferencie claramente o papel dos controladores, serviços, DAOs e visões.
- **Analise o Código**: Leia e compreenda cada arquivo chave para entender como eles interagem.
- **Pratique**: Tente adicionar novas funcionalidades ou entidades para solidificar o entendimento.
- **Reflita sobre o Padrão MVC**: Entenda os benefícios e as razões para usar este padrão arquitetural.

Espero que este resumo tenha sido útil e que facilite seus estudos sobre o funcionamento do framework. Boa sorte na sua prova!
