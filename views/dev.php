<?php ob_start();?><main class="dev-page"><div class="dev-head"><div><span class="eyebrow">DEVELOPER CENTER</span><h1>BinerMail OAuth</h1><p class="muted">با BinerMail برای سایتت ورود امن بساز.</p></div><a class="secondary" href="<?=e(config('url'))?>"><i class="fa-solid fa-arrow-left"></i> Mail</a></div><section class="panel"><h2>ساخت OAuth App</h2><form method="post" class="form two"><input type="hidden" name="_csrf" value="<?=e(csrf_token())?>"><div><label>نام برنامه</label><input name="name" placeholder="My Website" required></div><div><label>Redirect URI</label><input name="redirect_uris" placeholder="https://example.com/oauth/callback" required></div><button class="primary"><i class="fa-solid fa-plus"></i> ساخت Client</button></form></section><?php if(isset($newClient)):?><section class="panel success-panel"><h2>Client ساخته شد</h2><p class="muted">Client Secret فقط همین الان نمایش داده می‌شود.</p><div class="secret"><b>Client ID</b><code><?=e($newClient['client_id'])?></code><b>Client Secret</b><code><?=e($newClient['client_secret'])?></code></div></section><?php endif;?><section class="panel"><h2>OAuth Clients</h2><?php foreach($clients as $c):?><div class="client-row"><div><b><?=e($c['name'])?></b><small><?=e($c['client_id'])?></small></div><code><?=e($c['redirect_uris'])?></code></div><?php endforeach;?></section><section class="panel docs"><h2>Integration</h2><pre>GET <?=e(config('url'))?>/oauth/authorize?client_id=CLIENT_ID&amp;redirect_uri=CALLBACK&amp;response_type=code&amp;scope=openid%20profile%20email&amp;state=RANDOM_STATE

POST <?=e(config('url'))?>/oauth/token
client_id=...
client_secret=...
code=...
redirect_uri=CALLBACK
grant_type=authorization_code

GET <?=e(config('url'))?>/api/oauth/userinfo
Authorization: Bearer ACCESS_TOKEN</pre></section></main><?php $content=ob_get_clean();require __DIR__.'/layout.php';
