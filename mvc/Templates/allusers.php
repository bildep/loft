<?php

foreach ($data as $item):?>
    <p>
        <?=$item['login']?> возраст <?=$item['age']?> - <?=($item['age'] > 18) ? 'Совершеннолетний' : 'Несовершеннолетний';?>
    </p>

<?endforeach;?>

<p>
    <a href="/user/allusers/desc/">в обратном порядке</a>
</p>
