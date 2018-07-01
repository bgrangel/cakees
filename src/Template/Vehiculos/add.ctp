<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="page-header">
            <h2>Registrar vehículo</h2>
        </div>
        <?= $this->Form->create($vehiculo) ?>
        <fieldset>
            <?php
                echo $this->Form->input('marca');
                echo $this->Form->input('modelo');
                echo $this->Form->input('placa');
            ?>
        </fieldset>
        <?= $this->Form->button('Registrar') ?>
        <?= $this->Form->end() ?>
    </div>
</div>