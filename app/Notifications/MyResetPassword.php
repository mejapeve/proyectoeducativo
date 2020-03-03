<?php

namespace App\Notifications;

use App\Models\AfiliadoEmpresa;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class MyResetPassword extends Notification
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
            ->subject('Recuperar contraseña')
            ->greeting('Hola '.$notifiable->name.' '.$notifiable->last_name)
            ->line('Estás recibiendo este correo porque hiciste una solicitud de recuperación de contraseña para tu cuenta.')
            ->action('Recuperar contraseña', route('password.reset', ['empresa'=>$this->company_name, 'token'=>$this->token]))
            ->line('Si no realizaste esta solicitud, no es necesario realizar ninguna acción.')
            ->line('Saludos,')
            ->line('Equipo técnico')
            ->salutation('Conexiones');
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
