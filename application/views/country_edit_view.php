<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Update - <? echo $country?> - My World</title>
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
