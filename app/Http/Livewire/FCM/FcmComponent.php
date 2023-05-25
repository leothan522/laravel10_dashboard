<?php

namespace App\Http\Livewire\FCM;

use App\Models\User;
use App\Services\FirebaseCloudMessagingService;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Livewire\Component;

class FcmComponent extends Component
{
    use LivewireAlert;

    public $title, $body, $fcm_token;
    private $messaging;

    public function render()
    {
        $users = User::where('fcm_token', '!=', null)->get();
        return view('livewire.f-c-m.fcm-component')
            ->with('listarUsers', $users);
    }

    protected $rules = [
        'title' => 'required|min:4',
        'body' => 'required|min:4',
        'fcm_token' => 'required',
    ];

    public function sendMessage()
    {
        $this->validate();
        $this->messaging = FirebaseCloudMessagingService::connect();
        $notificacion = Notification::fromArray([
            'title'     =>  $this->title,
            'body'   =>  $this->body
        ]);
        $message = CloudMessage::withTarget('token', $this->fcm_token)
            ->withNotification($notificacion);
        $this->messaging->send($message);
        $this->alert(
            'success',
            'Mensaje enviado.'
        );
    }


}
