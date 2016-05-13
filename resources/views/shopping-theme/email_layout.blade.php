<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>
</head>
<body marginheight="0" marginwidth="0">
<div align="center" style="background-color:#f2f2f2;font-family:Tahoma;font-size:11px;padding:15px 10px;">
    <div style="width:600px;border:1px solid #6f6f6f;background-color:#ffffff;border-radius:5px;">
        <div style="height:31px;background-color:#9b9b9b;color:#FFF;">
            <a href="http://zarinpal.com">
                <img src="http://zarinpal.com/img/mail/main_zarinpal_logo.png" title="ZarinPal" alt="ZarinPal"
                     align="left"/>
                <img src="http://zarinpal.com/img/mail/main_zarinpal_title.png" title="Guarantees your payment"
                     alt="ZarinPal" align="right"/>
            </a>
        </div>

        <div style="padding:8px;text-align:right;direction:rtl;">
            @yield('content')
            <div style="clear:both"></div>
        </div>

        <div style="border-top:1px solid #6f6f6f;padding:8px;height:75px;">
            <a href="https://www.facebook.com/zarinpal" alt="Facebook" title="Facebook">
                <img src="http://zarinpal.com/img/mail/main_facebook.png" title="ZarinPal" alt="ZarinPal" align="left"/>
            </a>

            <div style="float:right; width:380px; text-align:right;">
                <div style="font-size: small">
                    <p>{{\App\Zarinpal\Setting::NAME}}</p>

                    <p>{{\App\Zarinpal\Setting::EMAIL}}</p>

                    <p>{{trans('Tel')}} : {{\App\Zarinpal\Setting::PHONE_NUMBER}}</p>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
    </div>

</div>
</body>
</html>