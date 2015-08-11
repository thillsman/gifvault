<?
$pass = $_POST['pass'];
$url = $_POST['url'];
$name = $_POST['name'];
$thumb = $_POST['thumb'];

$correctpass = "PICKYOURPASSWORD";

if($pass == $correctpass) {
  if($url != '' && $name != '') {
    file_put_contents($name.'.gif', file_get_contents($url));
  }
  $files = glob('*.{gif}', GLOB_BRACE);
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>GIFVault</title>
    <meta name="viewport" content="width=device-width">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h1>GIFVault</h1>
        </div>
      </div>
      <div class="row">
        <? if($pass == $correctpass): ?>

          <div class="col-sm-4">
            <form method="POST" action="index.php">
              Add a gif from URL<br />
              <input type="text" name="url"></input><br/>
              Give it a name (no .gif)<br />
              <input type="text" name="name"></input><br/>
              <input type="hidden" name="pass" value="<? echo $correctpass ?>">
              <input type="submit" name="submit" value="Do it to it"></input>
            </form><br />

            <form method="POST" action="index.php">
              <input type="hidden" name="thumb" value="<? echo ($thumb == 'true' ? 'false' : 'true') ?>">
              <input type="hidden" name="pass" value="<? echo $correctpass ?>">
              <input type="submit" name="submit" value="Toggle thumbnails"></input>
            </form><br />
          </div>
          <div class="col-sm-8">
            <div class="row">
              <? foreach($files as $file): ?>
                <? if($thumb == 'true'): ?>
                  <div class="col-sm-2" style="height:100px;"><a href="<? echo $file ?>"><img src="<? echo $file ?>" style="max-width:100%;max-height:100%;"/></a></div>
                <? else: ?>
                  <div class="col-sm-6"><a href="<? echo $file ?>"><? if($file == $name.".gif"): ?><strong><? endif ?><? echo $file ?><? if($file == $name.".gif"): ?></strong><? endif ?></a></div>
                <? endif ?>
              <? endforeach ?>
            </div>
          </div>
          <div class="col-sm-12">
            <a href="javascript:(function(){document.body.appendChild(document.createElement('script')).src='http://tylr.us/gifs/bookmarklet.js';})();">GIFVault Bookmarklet</a>
          </div>
        <? else: ?>
          <div class="col-sm-12">
            <? if(isset($_POST)): ?>
              <form method="POST" action="index.php">
                Unlock the vault of amazing gifness.<br />
                <input type="password" name="pass"></input><br/>
                <input type="submit" name="submit" value="Do this thing"></input>
              </form>
            <? endif ?>
          </div>

        <? endif ?>
      </div>
    </div>
  </body>
</html>
