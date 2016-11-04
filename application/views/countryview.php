<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><? echo $country?> - My World</title>
    <style>
    body{
      font-family:sans-serif;
    }
    </style>
  </head>
  <body>
    <section>
      <h3><? echo $country ?></h3>
      <ul>
        <? foreach ($cities as $city) { ?>
        <li>
          <?= element('city_name',$city); ?>
          <? echo anchor('world/city/'.element('city_id',$city).'/delete',img(asset_url().'images/icon_delete.png'),'title="Delete"'); ?>
        </li>
        <?  } ?>
      </ul>
    </section>
    <? echo anchor('', 'Back', 'title="Home Page"'); ?>
  </body>
</html>
