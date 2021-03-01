<?php

function akBank()
{
    $ch = curl_init('https://www.akbank.com/_vti_bin/AkbankServicesSecure/FrontEndServiceSecure.svc/GetExchangeData?_=' . time());
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true
    ]);

    $output = curl_exec($ch);
    curl_close($ch);


    $output = json_decode($output, true);
    $results = json_decode($output['GetExchangeDataResult'], true);
    // print_r($results['Currencies']);

    $eur = $results['Currencies'][6];
    $usd = $results['Currencies'][16];
    $gold = $results['Currencies'][17];

    return [
        'EURO' => [
            'rate' => $eur['Rate'],
            'buy' => $eur['Buy'],
            'sell' => $eur['Sell'],
        ],
        'USD' => [
            'rate' => $usd['Rate'],
            'buy' => $usd['Buy'],
            'sell' => $usd['Sell'],
        ],
        'GOLD' => [
            'rate' => $gold['Rate'],
            'buy' => $gold['Buy'],
            'sell' => $gold['Sell'],
        ],
    ];
}

function isBank()
{

    $ch = curl_init('https://www.isbank.com.tr/_vti_bin/DV.Isbank/FinancialData/FinancialDataService.svc/GetFinancialData?_=' . time());
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true
    ]);
    $output = curl_exec($ch);
    curl_close($ch);

    $output = json_decode($output, true);
    $results = $output['Data']['Market'];
    $eur = $results[1];
    $usd = $results[0];
    $gold = $results[3];


    return [
        'EURO' => [
            'buy' => $eur['FxRateBuy'],
            'sell' => $eur['FxRateSell'],
        ],
        'USD' => [
            'buy' => $usd['FxRateBuy'],
            'sell' => $usd['FxRateSell'],
        ],
        'GOLD' => [
            'buy' => $gold['FxRateBuy'],
            'sell' => $gold['FxRateSell'],
        ],
    ];
}


$akbank = akBank();
$isbank = isBank();
?>

<div style="display:flex; justify-content:space-evenly;">
    <ul>
        <h2>AKBANK</h2>
        <?php foreach ($akbank as $key => $value) : ?>

            <li>
                <?= $key ?> <br>
                <ul>
                    <li>Buy: <?= $value['buy'] ?></li>
                    <li>Sell: <?= $value['sell'] ?></li>
                    <li style="color: <?= $value['rate'] > 0 ? '#66E725' : 'red' ?> ">Rate: %<?= number_format($value['rate'], 2) ?></li>
                </ul>
            </li>
            <br>
        <?php endforeach; ?>
    </ul>
    <ul>
        <h2>İŞBANK</h2>
        <?php foreach ($isbank as $key => $value) : ?>

            <li>
                <?= $key ?> <br>
                <ul>
                    <li>Buy: <?= $value['buy'] ?></li>
                    <li>Sell: <?= $value['sell'] ?></li>
                </ul>
            </li>
            <br>
        <?php endforeach; ?>
    </ul>
</div>