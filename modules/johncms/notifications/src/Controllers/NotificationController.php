<?php

namespace Johncms\Notifications\Controllers;

use Johncms\Http\Response\RedirectResponse;
use Johncms\Http\Session;
use Johncms\Notifications\Notification;
use Carbon\Carbon;

class NotificationController extends \Johncms\Controller\BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->navChain->add(__('Notifications'), route('notification.index'));
    }

    public function index()
    {
        $this->metaTagManager->setAll(__('Notifications'));

        $notifications = Notification::query()->orderBy('created_at', 'desc')->paginate();
        Notification::query()->whereIn('id', $notifications->pluck('id'))->unread()
            ->update([
                         'read_at' => Carbon::now(),
                     ]);

        $this->render->render('johncms/notification::index', [
            'notifications' => $notifications,
        ]);
    }

    public function destroyAll(Session $session): RedirectResponse
    {
        Notification::query()->delete();
        $session->flash('success_message', __('Notifications are cleared!'));
        return new RedirectResponse(route('notification.index'));
    }
}
