<?php
  $equipment = $equipmentController->get($_GET['id']);
  if (isset($_POST['edit_equipment'])) {
      echo $equipmentController->update($_GET['id'],$_POST['name'], $_POST['serial_number'], $_POST['type']);
      $_SESSION['message'] = 'Alarme editado com sucesso';
      header('Location:index.php?entity=equipment');
  }
?>
    <div class="col-auto container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>
                Editar Equipamento (ID: <?= $_GET['id'] ?>) &nbsp;&nbsp;&nbsp;
                <a href="index.php?entity=equipment" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
              <form action="index.php?entity=equipment&action=edit&id=<?= $_GET['id'] ?>" method="POST">
                <div class="mb-3">
                    <label>Nome</label>
                    <input type="text" name="name" value="<?=$equipment['name']?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Número de Série</label>
                    <input type="text" name="serial_number" value="<?=$equipment['serial_number']?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Tipo</label>
                    <select name="type" class="form-select">
                        <option value="Tensão" <?php if($equipment['type'] == 'Tensão'){echo "selected";}?> >Tensão</option>
                        <option value="Corrente" <?php if($equipment['type'] == 'Corrente'){echo "selected";}?> >Corrente</option>
                        <option value="Óleo" <?php if($equipment['type'] == 'Óleo'){echo "selected";}?> >Óleo</option>
                    </select>
                </div>
                <div class="mb-3">
                  <button type="submit" name="edit_equipment" class="btn btn-primary">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>