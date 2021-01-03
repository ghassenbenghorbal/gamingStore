@php
    $order_id = '#'.str_pad($sale->id + 1, 5, "0", STR_PAD_LEFT);
@endphp
<div class="">
<div class="aHl"></div>
<div id=":17p" tabindex="-1"></div>
<div id=":17e" class="ii gt">
    <div id=":17d" class="a3s aiL msg-3153953269851397110">
        <div class="adM">
        </div>
        <u></u>
        <div bgcolor="#eeeeee">
            <table bgcolor="#eeeeee" cellspacing="0" cellpadding="0" border="0" width="100%" style="text-align:left;border-collapse:collapse;border:0;width:100%;max-width:800px" align="center">
            <tbody>
                <tr>
                    <td style="margin:0px auto" align="center">
                        <div style="padding:0;width:800px;margin:0 auto;display:block">
                        <table bgcolor="#FFFFFF" align="center" cellspacing="0" cellpadding="0" border="0" width="800" style="text-align:left;width:800px;border-collapse:collapse;border:0;margin:auto">
                            <tbody>
                                <tr>
                                    <td style="padding:0">
                                    <table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border:0;width:100%" width="100%">
                                        <tbody>
                                            <tr>
                                                <td valign="top" style="padding:0 25px 30px" align="left">
                                                <h2 style="font-size:17px;font-weight:bold;line-height:22px;margin:0 0 11px 0">Hello <strong>{{ $name }}</strong>,</h2>
                                                <p style="font-size:14px;line-height:16px;margin:0 0 16px 0">Your Shipment for Order {{$order_id}}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0">
                                    <table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border:0;width:100%" width="100%">
                                        <tbody>
                                            <tr>
                                                <td valign="top" style="padding:0 25px" align="left">
                                                <table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border:0;width:100%" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top" style="padding:16px 0 20px;border-top:1px solid #e3e4e6" align="left">
                                                            <p style="font-size:17px;font-weight:bold;line-height:22px;margin:0">Your order number</p>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" style="padding:0" align="center">
                                                            <div style="width:100%;height:55px;font-size:20px;font-weight:bold;line-height:55px;color:#4e4e5a;background-color:#f2f2fa;text-align:center;border-radius:5px">{{$order_id}}</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td valign="top" style="padding:15px 0 0" align="right" class="m_-3153953269851397110oderCheckStatus">
                                                            <p style="font-size:14px;line-height:16px;margin:0">Check status of your order by <a href="http://localhost/gamingStore/public/login" style="color:#4197e7;text-decoration:none" target="_blank">Log in to My Account</a></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding:0">
                                    <table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border:0;width:100%" width="100%">
                                        <tbody>
                                            <tr>
                                                <td valign="top" style="padding:0px 25px">
                                                <table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border:0;width:100%" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top" style="padding:20px 0 15px;border-bottom:4px solid #d1d1d9" align="left">
                                                            <p style="font-size:17px;font-weight:bold;line-height:22px;margin:0">Your item/s</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </td>
                                </tr>
                                <tr>

                                    <td style="padding:0">
                                    <table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border:0;width:100%" width="100%">
                                        <tbody>
                                            @foreach ($sale->commands as $command)
                                            @php
                                                $product = App\Product::find($command->product_id);
                                            @endphp
                                            <tr>
                                                <td valign="top" style="padding:0px 15px 15px 15px">
                                                <table align="left" border="0" style="border-collapse:collapse;border:0;float:none;width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <td style="padding:20px 0 10px">
                                                            <table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border:0;width:100%" width="100%">
                                                                <tbody>
                                                                    <tr>

                                                                        <td valign="top" align="left" style="padding-left:18px">
                                                                        <table cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border:0;width:100%" width="100%">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td style="border-top:1px solid #d1d1d9;color:#4197e7;font-size:13px;line-height:16px;padding-bottom:14px;padding-top:17px;vertical-align:top">
                                                                                    <div style="float:left">
                                                                                        <a href="{{route('user.view',['id'=>$product->id])}}" style="color:#006cff;display:block;font-size:18px;font-weight:bold;line-height:18px;text-decoration:none" target="_blank">{{$product->name}}</a>
                                                                                    </div>
                                                                                    <div style="float:right">
                                                                                        <b style="font-size:16px;font-weight:bold;color:#000">subtotal &nbsp;&nbsp;</b>
                                                                                        <div style="font-size:18px;float:right;color:#D10024;font-weight:bold">
                                                                                            {{$command->subtotal}} TND
                                                                                        </div>
                                                                                    </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                    <a style="padding:10px 20px;background-color:#006cff;border-radius:5px;color:#ffffff;font-size:12px;height:34px;line-height:34px;text-align:center;text-decoration:none;margin-bottom:10px;font-weight:bold" href="{{route('user.key', $command->id)}}" target="_blank" >
                                                                                    Get your key(s)                                                                                                     </a>
                                                                                    <br>
                                                                                    <br>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td style="color:#444444;font-size:12px;line-height:20px;padding-bottom:18px;padding-top:2px">Quantity: <strong>{{$command->quantity}}</strong></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td style="border-top:1px solid #d1d1d9;padding:20px 20px 10px;margin:10px 0;color:#000">
                                                <div style="text-align:right;font-size:20px;font-weight:bold">
                                                    Total : <span style="color:#D10024;font-size:20px;margin-left:5px">{{$sale->price}} TND</span>
                                                </div>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    </td>

                                </tr>


                                <tr>
                                    <td style="width:100%;padding:0">
                                    <table width="100%" cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse;border:0;width:100%">
                                        <tbody>
                                            <tr>
                                                <td valign="top" style="padding:40px 25px;font-size:14px">
                                                <table style="margin-top:20px" cellpadding="0" cellspacing="0">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                            Thank you, <strong>GKeys</strong>
                                                            </td>


                                                        </tr>
                                                    </tbody>
                                                </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                        </div>
                    </td>
                </tr>
            </tbody>
            </table>

        </div>
    </div>
</div>

</div>
