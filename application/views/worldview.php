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
      <h3><? echo $country['country_name']; ?></h3>
      <ul>
        <? foreach ($country['cities'] as $city) { ?>
        <li><?= $city['city_name']; ?></li>
        <?  } ?>
      </ul>
      <? } ?>
    </section>
  </body>
</html>
