<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendRejectedPaymentNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $shoppingCart;
    private $ratingPlan;
    private $afiliadoEmpresa;

    public function __construct($shoppingCart, $ratingPlan, $afiliadoEmpresa)
    {
        //
        $this->shoppingCart = $shoppingCart;
        $this->ratingPlan = $ratingPlan;
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
            ->markdown('vendor.notifications.rejectedPaymentNotification',
                [   'shoppingCart' => $this->shoppingCart,
                    'ratingPlan' => $this->ratingPlan,
                    'afiliadoEmpresa' => $this->afiliadoEmpresa,
                ])
            ->subject('Conexiones - Notificación de pago rechazado');

    }
}
