<?php

namespace App\Controller;

use App\Model\Bridge\HelloWorldService;
use App\Model\Bridge\PlainTextFormatter;
use App\Model\DataMapper\StorageAdapter;
use App\Model\DataMapper\User;
use App\Model\DataMapper\UserMapper;
use App\Model\Observer\UserObserver;
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
        echo '<br>';
        $this->testBridge();
        echo '<br>';
        $this->testObserver();

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

    private function testBridge()
    {
        $plainTextFormatter = new PlainTextFormatter();
        $service = new HelloWorldService($plainTextFormatter);

        $success = 'Bridge Pattern: Success';
        $fail = 'Bridge Pattern: Fail';

        echo is_string($service->get()) ? $success : $fail;
    }

    private function testObserver()
    {
        $user = new \App\Model\Observer\User();
        $observer = new UserObserver();
        $user->attach($observer);
        $user->changeEmail();
        $changes = count($observer->getChangedUsers());

        $success = 'Observer Pattern: Success';
        $fail = 'Observer Pattern: Fail';

        echo $changes === 1 ?  $success : $fail;
    }
}
