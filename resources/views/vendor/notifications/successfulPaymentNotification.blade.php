@component('mail::message')
<div>
    <table style="width:700px;margin-left:auto;margin-right:auto">
        <tbody>
            <tr style="height:340.088px">
                <td style="width:10.7244px;height:340.088px">
                    <img alt="" height="341" src="https://ci6.googleusercontent.com/proxy/wofwaAycUZToSfwMPm5FDEwB3gHXXuRyJpOanyri_6OCJvYMSAsH9kg-c768MMMauiHSN3_lFd6-1CRRIaQpLrTTag=s0-d-e1-ft#http://www.jlnsoftware.com.br/pse/email/img1.jpg" style="display:block;margin-left:auto;margin-right:auto" width="700" class="CToWUd a6T" tabindex="0"><div class="a6S" dir="ltr" style="opacity: 0.01; left: 655px; top: 307px;"><div id=":qb" class="T-I J-J5-Ji aQv T-I-ax7 L3 a5q" role="button" tabindex="0" aria-label="Descargar el archivo adjunto " data-tooltip-class="a1V" data-tooltip="Descargar"><div class="aSK J-J5-Ji aYr"></div></div></div>
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
                                            <span style="color:#999999">Estado de la Transacción: Aprobada
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
                                            Fecha de Transacción: {{$transaction_date}}<br>
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