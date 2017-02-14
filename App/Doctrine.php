<?php 
require_once __DIR__ . "/../vendor/autoload.php";
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [
    __DIR__ . '/Entity'
];

$isDevMode = true;

$dbParams = [
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => 'root',
    'dbname'   => 'tasksDoctrine'
];

$config = Setup::createAnnotationMetadataConfiguration($paths,$isDevMode);
$entityManager = EntityManager::create($dbParams,$config);

$platform = $entityManager->getConnection()->getDatabasePlatform();
$platform->registerDoctrineTypeMapping('enum', 'string');

function getEntityManager(){
	global $entityManager;
	return $entityManager;
}
