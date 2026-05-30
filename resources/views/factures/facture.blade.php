<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ticket</title>

    <?php
    $style = '
    <style>
        * {
            font-family: "consolas", sans-serif;
        }
        p {
            display: block;
            margin: 3px;
            font-size: 10pt;
        }
        table td {
            font-size: 9pt;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }

        @media print {
            @page {
                margin: 0;
                size: 75mm 
    ';
    ?>
    <?php 
    $style .= 
        ! empty($_COOKIE['innerHeight'])
            ? $_COOKIE['innerHeight'] .'mm; }'
            : '}';
    ?>
    <?php
    $style .= '
            html, body {
                width: 70mm;
            }
            .btn-print {
                display: none;
            }
        }
    </style>
    ';
    ?>

    {!! $style !!}
</head>
<body onload="window.print()">
    <button class="btn-print" style="position: absolute; right: 1rem; top: rem;" onclick="window.print()">Print</button>
    <div class="text-center">
        <h3 style="margin-bottom: 5px;">Ticket</h3>
        <p>ARCHANGEL</p>
    </div>
    <br>
    <div>
        <p style="float: left;">{{ date('d-m-Y') }}</p>
        <p style="float: right"></p>
    </div>
    <div class="clear-both" style="clear: both;"></div>
    
    <p>No:0001</p>
    <p class="text-center">===================================</p>
    
    <br>
    <table width="100%" style="border: 0;">
    @foreach($contents as $single)
      
            <tr>
                <td colspan="3">{{$single->name}}</td>
            </tr>
            <tr>
                <td>{{$single->price}} x {{$single->qty}}</td>
                <td></td>
                <td class="text-right">{{$single->qty*$single->price}}</td>
            </tr>
      @endforeach
    </table>
    <p class="text-center">-----------------------------------</p>

    <table width="100%" style="border: 0;">
        <tr>
            <td> Sous Total :</td>
            <td class="text-right">{{Cart::subtotal()}}</td>
        </tr>
        <tr>
            <td>T.V.A :</td>
            <td class="text-right">{{Cart::tax()}}</</td>
        </tr>
        <tr>
            <td>Total:</td>
            <td class="text-right">{{Cart::total()}}</td>
        </tr>
    </table>

    <p class="text-center">===================================</p>
    <p class="text-center">--A BIENTOT--</p>

    <script>
        let body = document.body;
        let html = document.documentElement;
        let height = Math.max(
                body.scrollHeight, body.offsetHeight,
                html.clientHeight, html.scrollHeight, html.offsetHeight
            );
            
        document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "innerHeight="+ ((height + 50) * 0.264583);
    </script>
</body>
</html>