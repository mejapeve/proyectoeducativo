<?php

namespace App\Notifications;

use App\Models\AfiliadoEmpresa;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class WelcomeMail extends Notification
{
    use Queueable;
    private $token;
    private $company_name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token, $company_name)
    {
        $this->company_name = $company_name;
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        $users = AfiliadoEmpresa::where('email',$notifiable->email)->get();
        
        return (new MailMessage)->markdown(
            'vendor.notifications.email', ['data' => $users]
        )
            ->from(env('MAIL_USERNAME','Conexiones'))
            ->subject('Bienvenido a la plataforma')
            ->greeting('Hola '.$notifiable->name.' '.$notifiable->last_name)
            ->line('Tu registro ha sido realizado exitosamente en la plataforma, por favor accede al siguiente link para establecer tu contraseña y finalizar el registro.')
            ->action('Recuperar contraseña', route('password.reset', ['empresa'=>$this->company_name, 'token'=>$this->token]))
            ->line('Si no realizaste esta solicitud, no se requiere realizar ninguna otra acción.')
            ->salutation('Saludos, '. config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}