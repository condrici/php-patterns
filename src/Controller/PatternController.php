<?php

namespace App\Controller;

use App\Model\DataMapper\StorageAdapter;
use App\Model\DataMapper\User;
use App\Model\DataMapper\UserMapper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PatternController extends AbstractController
{
    /**
     * @Route("/pattern", name="pattern")
     */
    public function index(): Response
    {
        $this->testDataMapper();

        return $this->render('pattern/index.html.twig', [
            'controller_name' => 'PatternController',
        ]);
    }

    /**
     * Data Mapper Pattern
     */
    private function testDataMapper()
    {
        $data = [1 => ['username' => 'james', 'email' => 'james@bond.com']];
        $storageAdapter = new StorageAdapter($data);
        $userMapper = new UserMapper($storageAdapter);
        $user = $userMapper->findById(1);

        $success = 'Data Mapper Pattern: Success';
        $fail = 'Data Mapper Pattern: Fail';

        echo $user instanceof User ? $success : $fail;
    }
}
