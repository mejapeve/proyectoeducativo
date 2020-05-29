<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendSuccessfulPaymentNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $shoppingCart;
    private $request;
    private $afiliadoEmpresa;

    public function __construct($shoppingCart, $request, $afiliadoEmpresa)
    {
        //
        $this->shoppingCart = $shoppingCart;
        $this->request = $request;
        $this->afiliadoEmpresa = $afiliadoEmpresa;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return
        $this->from('contacto@educonexiones.com')
            ->markdown('vendor.notifications.successfulPaymentNotification',
                [   'shoppingCart' => $this->shoppingCart,
                    'request' => $this->request,
                    'afiliadoEmpresa' => $this->afiliadoEmpresa
                ])
            ->subject('Conexiones - Notificación de pago exitoso');

    }
}
