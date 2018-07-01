<?php
use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class CrearDatosUsuarios extends AbstractMigration
{
    public function up() 
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);
        $populator->addEntity('Users',200, [
            'first_name' => function () use ($faker) {
                return $faker->firstName();
            },
            'last_name' => function () use ($faker) {
                return $faker->lastName();
            },
            'email' => function () use ($faker) {
                return $faker->safeEmail();
            },
            'password' => function () {
                $hasher=new DefaultPasswordHasher();
                return $hasher->hash('secret');
            },
            'role' => 'user'
        ]);
        $populator->execute();
    }
}
