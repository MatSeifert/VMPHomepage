<?php if (is_readable($filename = 'content/mapcrafter/build/index.html')): ?>
  <?php require_once($filename); ?>
<?php else: ?>

  <div class="whereAmI">
    MINECRAFT MAP
  </div>

  <div class="PostTitle">
    MINECRAFT MAP
  </div>

  <div class="PostPost">
    <span class="smallHeadline">Keine Sorge!</span>
    Schau' gleich nochmal vorbei. Die Map wird gerade neu erstellt...
  </div>

<?php endif; ?>
