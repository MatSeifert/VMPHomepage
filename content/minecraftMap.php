<?php if (is_readable($filename = 'content/mapcrafter/build/index.html')): ?>

  <iframe src="content/mapcrafter/build/index.html" width="100%" height="720px" frameborder="0"></iframe>

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
