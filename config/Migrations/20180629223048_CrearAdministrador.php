<?php
use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class CrearAdministrador extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);
        $populator->addEntity('Users',1,[
            'first_name' => 'Bryan',
            'last_name' => 'Rangel',
            'email' => 'adm@bgrangel.com.ve',
            'password' => function () {
                $hasher=new DefaultPasswordHasher();
                return $hasher->hash('secret');
            },
            'role' => 'admin'
        ]);

        $populator->execute();
    }
}
