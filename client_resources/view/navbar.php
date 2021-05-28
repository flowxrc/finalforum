<div class="bg-light p-3 mb-3">
  <a href="/"><h3 class="m-0" style="display: inline"><?= $phrases['page_home'] ?></h3></a>
  <p style='display: inline;padding-right: 20px;'></p>
  <? if(empty($_SESSION['username'])): ?>
    <a href='/pages/login'><h3 class='m-0' style="display: inline;"><?= $phrases['page_login'] ?></h3></a>
  <? else: ?>
    <a href='/pages/my'><h3 class='m-0' style="display: inline;"><?= $phrases['page_profile'] ?></h3></a>
  <? endif; ?>
</div>
