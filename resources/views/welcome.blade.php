<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
    <form action="{{ route('employee-add-card-save') }}">
        <input type="hidden" value="%3Cdocument%3E%3Cbank+name%3D%22Kazkommertsbank+JSC%22%3E%3Ccustomer+name%3D%22TEST+TEST%22+mail%3D%22khangrey%40comiq.kz%22+phone%3D%22%22+lang%3D%22ru%22%3E%3Cmerchant+cert_id%3D%2200c183d68d%22+name%3D%22Demo+Shop+3%22%3E%3Corder+order_id%3D%22123512351%22+currency%3D%22398%22+amount%3D%2250%22%3E%3Cdepartment+merchant_id%3D%2292061102%22+amount%3D%22null%22+abonent_id%3D%229%22%2F%3E%3C%2Forder%3E%3C%2Fmerchant%3E%3Cmerchant_sign+type%3D%22RSA%22%2F%3E%3C%2Fcustomer%3E%3Ccustomer_sign+type%3D%22RSA%22%2F%3E%3Cresults+timestamp%3D%222019-11-12+17%3A25%3A40%22%3E%3Cpayment+merchant_id%3D%2292061102%22+amount%3D%2250%22+approval_code%3D%22172539%22+reference%3D%22191112172539%22+response_code%3D%2200%22+Secure%3D%22No%22+card_bin%3D%22USA%22+CardHash%3D%22452423-XX-XXXX-5245%22+exp_month%3D%2204%22+exp_year%3D%2224%22+CardId%3D%22900000018261%22+abonent_id%3D%229%22+recepient%3D%229%22+sessionid%3D%22null%22+approve%3D%221%22+c_hash%3D%2215A92310B03BE495AF96670703A18E5B%22%2F%3E%3C%2Fresults%3E%3C%2Fbank%3E%3Cbank_sign+cert_id%3D%2200c183d690%22+type%3D%22SHA%2FRSA%22%3EI%2FQEWCZ%2BD49nY99d6LAjgtx8jL8NVcMYFOB%2B0F%2F2aJeCkqK47lshe1yXF6g1UwAle%2Fh8UeAli1OVXTrJ%2BiSBTtDL1wxaoIgrVr7f984ypHLTZLHU3EDom0Y9kVMS%2BkXu2plGE%2BV33s3U48prR%2FVz8nThfnuyQb5aTwaiqRqpN0A%3D%3C%2Fbank_sign%3E%3C%2Fdocument%3E">
        <button type="submit">Submit</button>
    </form>
    </body>
</html>
