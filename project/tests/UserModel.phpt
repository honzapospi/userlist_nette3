<?php
use Tester\Assert;
/**
 * @var \Nette\DI\Container $container
 */
$container = require(__DIR__.'/bootstrap.php');
$userModel = $container->getByType(\Model\UserModel::class);

Assert::true($userModel->getUser(0) === null, 'Test of $userModel->getUser(0) should return null');
Assert::true($userModel->getUsers() instanceof \Nette\Database\Table\Selection, 'Test of $userModel->getUsers() should be instance of Selection');
