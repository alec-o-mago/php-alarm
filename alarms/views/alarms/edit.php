<?php
  $equipments = $equipmentController->index();
  $alarm = $alarmController->get($_GET['id']);
  if (isset($_POST['edit_alarm'])) {
      echo $alarmController->update($_GET['id'],$_POST['name'], $_POST['type'], $_POST['equipment_id']);
      $_SESSION['message'] = 'Alarme editado com sucesso';
      header('Location:index.php?entity=alarm');
  }
?>
    <div class="col-auto container mt-5">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>
                Editar Alarme (ID: <?= $_GET['id'] ?>) &nbsp;&nbsp;&nbsp;
                <a href="index.php?entity=alarm" class="btn btn-danger float-end">Voltar</a>
              </h4>
            </div>
            <div class="card-body">
              <form action="index.php?entity=alarm&action=edit&id=<?= $_GET['id'] ?>" method="POST">
                <div class="mb-3">
                    <label>Nome</label>
                    <input type="text" name="name" value="<?=$alarm['name']?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Tipo</label>
                    <select name="type" class="form-select">
                        <option value="Urgente" <?php if($alarm['type'] == 'Urgente'){echo "selected";}?> >Urgente</option>
                        <option value="Emergente" <?php if($alarm['type'] == 'Emergente'){echo "selected";}?> >Emergente</option>
                        <option value="Ordinário" <?php if($alarm['type'] == 'Ordinário'){echo "selected";}?> >Ordinário</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Equipamento</label>
                    <select name="equipment_id" class="form-select">
                        <?php foreach ($equipments as $equipment): ?>
                            <option value="<?=$equipment['id']?>" <?php if($alarm['equipment_id'] == $equipment['id']){echo "selected";}?> ><?=$equipment['name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                  <button type="submit" name="edit_alarm" class="btn btn-primary">Salvar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>