
# Sistema Web para Consultórios Odontológicos 

## Descrição
Sistema web para gestão de consultórios odontológicos, permitindo o cadastro de pacientes, agendamento de consultas, controle de pagamentos, entre outras funcionalidades.

## Tecnologias Utilizadas
- **Frontend:** HTML, CSS, JavaScript e Bootstrap 4
- **Backend:** PHP.
- **Banco de Dados:** MySQL.
- **Ferramentas:** BrModelo, MySQL Workbench

## Instalação
1. Clonar o repositório:
   ```bash
   git clone https://github.com/filipibarbosa08/sisodonto.git
   ```
2. Instalar o PHP:

3. Instalar o MySQL:
   ```bash
   composer install
   ```
4. Criar o banco de dados com base nas configurações setadas no arquivo presente em 'config/Database.php.
5. Criar as tabelas no banco criado com base no arquivo 'config/DDL.txt':
   ```bash
   o arquivo 'DDL.txt' possui o script para a criação de todas as tabelas.
   ```
6. Via terminal ir até a pasta 'src/classes/' e executar o arquivo 'cadastrarUsuario.php' para cadastar o usuário inicial :
   ```bash
   executar o seguinte comando: php cadastrarUsuario.php
   ```

## Funcionalidades
- Cadastro de pacientes.
- Agendamento de consultas.
- Controle de pagamentos.
- Emissão de atestados e receituário.
- Área financeira.

## Uso
Após a instalação, inicie o servidor embutido do PHP:.

   ```bash
   va até a pasta raiz do projeto e execute o seguinte comando: php -S localhost:8000
   feito isso, basta acessar o sistema via navegador pelo seguinte endereço: http://localhost:8000
   ```

## Screenshots

![Captura de tela de 2025-03-27 17-50-58](https://github.com/user-attachments/assets/a647ea36-d10c-45d5-b4a5-49181acc7e7c)

![Captura de tela de 2025-03-27 17-52-18](https://github.com/user-attachments/assets/b186b33e-9511-4a7b-9735-62b7b66e59e5)
