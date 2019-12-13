<?php

function task1($file)
{
    $fileData = file_get_contents($file);

    $xml = new SimpleXMLElement($fileData);

    echo 'Order: ' . $xml->attributes()->PurchaseOrderNumber . ' from ' . $xml->attributes()->OrderDate .'<br><hr>';

    foreach ($xml->Address as $address) {
        echo 'Address ' . $address->attributes()->Type . ':<br>';
        echo $address->Name->getName() .': ' . $address->Name . '<br>';
        echo $address->Street->getName() .': ' . $address->Street . '<br>';
        echo $address->City->getName() .': ' . $address->City . '<br>';
        echo $address->State->getName() .': ' . $address->State . '<br>';
        echo $address->Zip->getName() .': ' . $address->Zip . '<br>';
        echo $address->Country->getName() .': ' . $address->Country . '<br>';

        echo '<hr>';
    }
    echo $xml->DeliveryNotes . '<br><hr>';

    foreach ($xml->Items->Item as $Item) {

        echo 'Item:<br>';
        echo $Item->attributes()->getName() . $Item->attributes()->PartNumber . '<br>';
        if(! empty($Item->ProductName)) {
            echo $Item->ProductName->getName() .': ' . $Item->ProductName . '<br>';
        }
        if (! empty($Item->Quantity)) {
            echo $Item->Quantity->getName() . ': ' . $Item->Quantity . '<br>';
        }
        if (! empty($Item->USPrice)) {
            echo $Item->USPrice->getName() . ': ' . $Item->USPrice . '<br>';
        }
        if (! empty($Item->ShipDate)) {
            echo $Item->ShipDate->getName() . ': ' . $Item->ShipDate . '<br><br>';
        }
        if (! empty($Item->Comment)) {
            echo $Item->Comment->getName() . ': ' . $Item->Comment . '<br><br>';
        }

    }
}

function task2()
{
    $auto = [
        'bmw x5' => [
            'speed' => 200,
            'year' =>  '1998',
            'price' => '$30k'
        ],
        'mazda 6' => [
            'speed' => 150,
            'year' =>  '2008',
            'price' => '$15k'
        ]
    ];

    file_put_contents('output.json', json_encode($auto));
    $change = rand(0, 1);

    if ($change) {
        $auto[] = [
            'audi a7' => [
                'speed' => 180,
                'year' =>  '2018',
                'price' => '$60k'
            ]
        ];
        file_put_contents('output2.json', json_encode($auto));
    }
}

function task3()
{
    $arSize = rand(50, 100);
    $str = '';
    for ($i = 0; $i < $arSize; $i++)
    {
        $str .= rand(1, 100) . ';';
    }
    file_put_contents('numbers.csv', $str);

    $file = fopen( 'numbers.csv', 'r');
    $data = [];
    while (($buffer = fgets($file, 4096)) !== false) {
        $data = explode(';', $buffer);
    }
    fclose($file);

    $sum = 0;
    foreach ($data as $item)
    {
        if (!($item % 2)) {
            $sum += $item;
        }
    }
    echo $sum;
}


function task4()
{
    $json = file_get_contents('https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');
    $obj = json_decode($json);
    echo 'title:' . $obj->query->pages->{'15580374'}->title . '<br>';
    echo 'page_id:' . $obj->query->pages->{'15580374'}->pageid . '<br>';
}