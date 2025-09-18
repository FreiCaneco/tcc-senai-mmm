<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Formulário de Cadastro</title>
     <!-- links -->
    <link rel="stylesheet" href="Style.css">  <!-- Css -->
     <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- Fonte -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;600&display=swap" rel="stylesheet">

  </head>
  <body>
     <?php 
        include "navbar.php"
      ?>

    

    <!-- novo professor. -->
    <h1>Novo Professor<br></h1>

    <form>
      <fieldset>
        <!-- legenda -->
        <legend>Preencha corretamente</legend>

        <!--Nome e Sobrenome -->
        <div class="row g-3">
          <div class="col">
            <input type="text" class="form-control" placeholder="Nome" aria-label="Nome">
          </div>
          <div class="col">
            <input type="text" class="form-control" placeholder="Sobrenome" aria-label="Sobrenome">
          </div>
        </div>

        <!--Email -->
        <div class="mb-3">
          <label for="disabledTextInput" class="form-label">e-mail</label>
          <input type="email" id="disabledTextInput" class="form-control" placeholder="nome.sobrenome@exemplo">
        </div>

        <!--Capacitações-->
        <label for="exampleDataList" class="form-label">Capacitações</label>
        <select class="form-select" aria-label="Default select example">
  <option selected>Selecine</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select><br>

        <!--Turno e Carga Hóraria-->
        <div class="row g-3">
            <div class="col">
                <label for="inputState" class="form-label">Turno</label>
                <select id="inputState" class="form-select">
                  <option selected>Selecione</option>
                  <option>Manha</option>
                  <option>Tarde</option>
                  <option>Noite</option>
                  <option>Manha e Tarde</option>
                  <option>Manha e Noite</option>
                  <option>Tarde e Noite</option>
                </select>
              </div>


              <div class="col">
                <label for="inputState" class="form-label">Carga Hóraria</label>
                <select id="inputState" class="form-select">
                  <option selected>Selecione</option>
                  <option>20 Horas</option>
                  <option>40 Horas</option>
                </select>
              </div>
              
        <!--Trabalha aos sabados ou não-->          
       <div class="form-check">
  <input class="form-check-input" type="checkbox" value="trabalha" id="trabalha">
  <label class="form-check-label" for="trabalha">
    Trabalha aos sábados
  </label>
</div>

<div class="form-check">
  <input class="form-check-input" type="checkbox" value="não_trabalha" id="não_trabalha" checked>
  <label class="form-check-label" for="não_trabalha">
    Não trabalha aos sábados
  </label>
</div>

<!-- Campo dinâmico para adicionar múltiplas capacitações -->
<fieldset>
                <legend>Capacitações do Professor</legend>
                <div id="capacitacoes-container">
                    <div class="capacitation-group mb-4 border p-3 position-relative">
                        <div class="mb-3">
                            <label for="cursoNome" class="form-label">Nome do Curso/Capacitação</label>
                            <input type="text" class="form-control" placeholder="Digite o nome do curso">
                        </div>
                        <button type="button"
                            class="btn btn-danger btn-sm position-absolute top-0 end-0 me-2 mt-2 btn-remover">Remover</button>
                    </div>
                </div>
                <!-- Botão para adicionar mais capacitação -->
                <button id="add-capacitacao" type="button" class="btn btn-secondary" id="adicionarCapacitacao">Adicionar Nova
                    Capacitação</button>
            </fieldset>


            <!-- Botões de Ação -->
            <div class="mt-4">
                <button  id="bt-primary" type="submit" class="btn btn-primary">Salvar</button>
                <button  id="bt-secondary" type="reset" class="btn btn-secondary">Cancelar</button>
            </div>
        </form>
    </div><br>

    <!-- Script para adicionar novos campos de capacitação -->
    <script>
        document.getElementById('adicionarCapacitacao').addEventListener('click', function () {
            const newGroup = document.createElement('div');
            newGroup.classList.add('capacitation-group', 'mb-4', 'border', 'p-3', 'position-relative');
            newGroup.innerHTML = `
        <div class="mb-3">
            <label for="cursoNome" class="form-label">Nome do Curso/Capacitação</label>
            <input type="text" class="form-control" placeholder="Digite o nome do curso">
        </div>
        <button type="button" class="btn btn-danger btn-sm position-absolute top-0 end-0 me-2 mt-2 btn-remover">Remover</button>
    `;

            // Adiciona o novo grupo de capacitação ao container
            document.getElementById('capacitacoes-container').appendChild(newGroup);
        });

        // Delegação de evento para o botão remover (funciona para todos os botões, inclusive os adicionados dinamicamente)
        document.getElementById('capacitacoes-container').addEventListener('click', function (event) {
            if (event.target && event.target.classList.contains('btn-remover')) {
                const group = event.target.closest('.capacitation-group');
                if (group) {
                    group.remove();
                }
            }
        });

    </script>
      <br>


        <!--Botão enviar--> 
        <button id=btEnviar-forms type="submit" class="btn btn-primary">Enviar</button>
      </fieldset>
    </form>

  </body>
</html>
