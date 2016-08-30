<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My World</title>
    <style>
    body{
      font-family:sans-serif;
    }
    </style>
  </head>
  <body>
    <section>
      <? foreach ($world as $country) {?>
      <h3><? echo element('country_name',$country); ?></h3>
      <ul>
        <? foreach ($country['cities'] as $city) { ?>
        <li><?= element('city_name',$city); ?></li>
        <?  } ?>
      </ul>
      <? } ?>
    </section>
  </body>
</html>
