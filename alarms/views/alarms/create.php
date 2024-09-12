<?php
    $equipments = $equipmentController->index();
    if (isset($_POST['create_alarm'])) {
        $alarmController->store($_POST['name'], $_POST['type'], $_POST['equipment_id']);
        $_SESSION['message'] = 'Equipamento criado com sucesso';
        header('Location:index.php?entity=alarm');
    }
?>
    <div class="col-auto container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>
                Adicionar Alarme &nbsp;&nbsp;&nbsp;
                <a href="index.php?entity=alarm" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
              <form action="index.php?entity=alarm&action=create" method="POST">
                <div class="mb-3">
                    <label>Nome</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Tipo</label>
                    <select name="type" class="form-select">
                        <option value="Urgente">Urgente</option>
                        <option value="Emergente">Emergente</option>
                        <option value="Ordinário">Ordinário</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Equipamento</label>
                    <select name="equipment_id" class="form-select">
                        <?php foreach ($equipments as $equipment): ?>
                            <option value="<?=$equipment['id']?>"><?=$equipment['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                  <button type="submit" name="create_alarm" class="btn btn-primary">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>