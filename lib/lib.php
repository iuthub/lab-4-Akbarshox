<?php 
function convert($size)
{
  if ($size >= 1048576)
  {
      return number_format($size / 1048576, 2) . ' MB';
  }
  elseif ($size >= 1024)
  {
      return number_format($size / 1024, 2) . ' KB';
  }
  elseif ($size > 1)
  {
      return $size . ' bytes';
  }
}
 ?>

 <?php
        if (isset($_GET["playlist"])) {
          $playlist = $_GET["playlist"];
          $file_contents = file_get_contents("songs/".$playlist, FILE_IGNORE_NEW_LINES);
          $arr_of_songs = explode("\n", $file_contents);
        foreach ($arr_of_songs as $filename) { ?>
        <li class="mp3item">
          <a href="<?="songs/".$filename?>"><?=$filename?></a>
        </li> 
      <?php }}
  else {
    foreach (glob("songs/*.mp3") as $filename) {?>
      <li class="mp3item">
        <a href="<?=$filename?>"><?=basename($filename)?></a>
        (<?=convert(filesize($filename))?>)
      </li> 
  <?php
    }
    ?>
    <?php 
      foreach (glob("songs/*.m3u") as $filename) { ?>
        <li class="playlistitem">
          <a href="music.php?playlist=<?=basename($filename)?>"><?=basename($filename)?>
          </a>
        </li>
    <?php }} ?>