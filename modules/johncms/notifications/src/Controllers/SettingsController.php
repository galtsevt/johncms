<?php

namespace Johncms\Notifications\Controllers;

class SettingsController extends \Johncms\Controller\BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->navChain->add(__('Notifications'), route('notification.index'));
    }

    public function index()
    {

    }
}
