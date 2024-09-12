<?php
    if (isset($_POST['create_equipment'])) {
        $equipmentController->store($_POST['name'], $_POST['serial_number'], $_POST['type']);
        $_SESSION['message'] = 'Equipamento criado com sucesso';
        header('Location:index.php?entity=equipment');
    }
?>
    <div class="col-auto container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>
                Adicionar Equipamento &nbsp;&nbsp;&nbsp;
                <a href="index.php?entity=equipment" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
              <form action="index.php?entity=equipment&action=create" method="POST">
                <div class="mb-3">
                    <label>Nome</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Número de Série</label>
                    <input type="text" name="serial_number" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Tipo</label>
                    <select name="type" class="form-select">
                        <option selected value="Tensão">Tensão</option>
                        <option value="Corrente">Corrente</option>
                        <option value="Óleo">Óleo</option>
                    </select>
                </div>
                <div class="mb-3">
                  <button type="submit" name="create_equipment" class="btn btn-primary">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>