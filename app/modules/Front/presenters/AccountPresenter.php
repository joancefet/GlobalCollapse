<?php

declare(strict_types=1);

namespace App\FrontModule\Presenters;

use App\Model\UserRepository;

final class AccountPresenter extends BasePresenter
{
    private UserRepository $userRepository;
    private ?object $userData = null;

    public function __construct(
	    UserRepository $userRepository
	)
	{
    parent::__construct();
    $this->userRepository = $userRepository;
  }

    protected function startup()
    {
        parent::startup();

        if (!$this->user->isLoggedIn())
            $this->redirect('Login:default', ['backlink' => $this->storeRequest()]);
    }

    public function actionLogout()
    {
        $this->user->logout();
        $this->redirect('Default:');
    }
}