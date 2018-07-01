<?php
use Migrations\AbstractMigration;

class CrearTablaVehiculo extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table=$this->table('vehiculo');
        $table->addColumn('marca','string',array('limit'=>100))
              ->addColumn('modelo','string',array('limit'=>100))
              ->addColumn('placa','string',array('limit'=>100))
              ->addColumn('create','datetime')
              ->create();
        $refTable = $this->table('vehiculo');
        $refTable->addColumn('user_id', 'integer', array('signed'=>'disable'))
                 ->addForeignKey('user_id','users','id',array('delete'=>'CASCADE','update'=>'NO_ACTION'))
                ->update();
    }
}
