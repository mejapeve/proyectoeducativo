@component('mail::message')
<div>
    <table style="width:700px;margin-left:auto;margin-right:auto">
        <tbody>
            <tr style="height:340.088px">
                <td style="width:10.7244px;height:340.088px">
                    <img src="https://educonexiones.com/images/sliderCarrucelHome/slide3.jpg"  data-skip-embed>
                </td>
            </tr>
            <tr style="height:235px">
                <td style="width:10.7244px;height:235px">
                    <table style="width:531.54px;margin-left:auto;margin-right:auto">
                        <tbody>
                            <tr style="height:29px">
                                <td style="text-align:center;width:526.54px;height:29px">
                                    <span style="font-family:helvetica,arial,sans-serif;font-size:18pt;color:#105ea8;font-weight:bold">
                                        {{$afiliadoEmpresa->name}} {{$afiliadoEmpresa->last_name}}
                                    </span>
                                </td>
                            </tr>
                            <tr style="height:190.173px">
                                <td style="width:526.54px;height:190.173px">
                                <br>
                                    <b style="color:#0059a4;font-family:Roboto,sans-serif;font-size:16px;text-align:center">
                                        <span color="#0059a4" face="Roboto, sans-serif">
                                            <b>
                                                <span style="font-family:helvetica,arial,sans-serif">
                                                    <span style="color:#999999;font-size:14pt">
                                                        Gracias por utilizar los servicios de EDUCONEXIONES.&nbsp;
                                                    </span>
                                                    <span style="color:#999999;font-size:14pt">Los siguientes son los datos de tu transacción:
                                                    </span>
                                                </span>
                                            </b>
                                        </span>
                                    </b>
                                    <br>
									<br>
                                    <span style="font-size:12pt;font-family:helvetica,arial,sans-serif">
                                        <span color="#0059a4" face="Roboto, sans-serif">
                                            <span style="color:#999999">Estado de la Transacción: Rechazada
                                            </span>
                                        </span>
                                        <br>
                                        <span color="#0059a4" face="Roboto, sans-serif">
                                            <span style="color:#999999">Identificador de la transacción: {{$request->collection_id}}
                                            </span>
                                            <br>
                                            <span style="color:#999999">Usuario: {{$afiliadoEmpresa->user_name}}
                                            </span>
                                            <br>
                                            <span style="color:#999999">Descripción:&nbsp;
                                            </span>
                                        </span>
                                        <span style="color:#999999">Compra Educonexiones<br>
									        Valor de la Transacción: {{$price_callback}} COP<br>
                                            Fecha de Transacción: {{$transaction_date->payment_process_date}}<br>
                                            Id de preferencia: {{$request->preference_id}}
                                        </span>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>