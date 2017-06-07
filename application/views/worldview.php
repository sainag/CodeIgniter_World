<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>My World</title>
    <meta charset="utf-8">
    <meta name="google" content="notranslate">
    <meta http-equiv="Content-Language" content="en">
    <meta name="description" content="Countries and cities i know">
    <meta name="keywords" content="world, country, city">
    <style>
    body{
      font-family:sans-serif;
    }
    </style>
  </head>
  <body>
    <?php $this->view('_form');?>
    <section>
      <? foreach ($world as $country) {?>
      <h3>
        <? echo anchor('world/show/'.element('country_name',$country),element('country_name',$country)); ?>
        <? echo anchor('world/'.element('country_id',$country).'/edit',img(asset_url().'images/icon_edit.png'),'title="Edit"'); ?>
        <? echo anchor('world/country/'.element('country_id',$country).'/delete',img(asset_url().'images/icon_delete.png'),'title="Delete"'); ?>
      </h3>
      <ul>
        <? foreach ($country['cities'] as $city) { ?>
        <li>
          <?= element('city_name',$city); ?>
        </li>
        <?  } ?>
      </ul>
      <? } ?>
    </section>
  </body>
</html>
