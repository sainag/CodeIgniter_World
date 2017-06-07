<!DOCTYPE html>
<html>
  <head>
    <title>Update - <? echo $country?> - My World</title>
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
    <section>
      <? echo validation_errors(); ?>
      <? echo form_open('world/'.$country_id.'/update'); ?>
      <h3><? echo form_input(array('name'=>'country','id'=>'country'.$country_id,'maxlength'=>100,'placeholder'=>'Country','value'=>set_value('country',$country))); ?></h3>
      <?= form_hidden('cities', sizeof($cities));?>
      <?= form_hidden('country_id', $country_id);?>
      <ul>
        <? $cc=0; foreach ($cities as $city) { ?>
        <li><?= form_input(array('name'=>'city'.element('city_id',$city),'id'=>'city'.element('city_id',$city),'maxlength'=>200,'placeholder'=>'City','value'=>set_value('city'.element('city_id',$city),element('city_name',$city)))); ?></li>
        <? $cc++;} ?>
      </ul>
      <? echo form_submit('update', 'Update'); ?>
      </form>
    </section>
    <br>
    <? echo anchor('', 'Back', 'title="Home Page"'); ?>
  </body>
</html>
