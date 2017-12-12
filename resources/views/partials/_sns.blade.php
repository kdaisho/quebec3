{{-- Script for TW --}}
<script>window.twttr=function(t,e,r){var n,i=t.getElementsByTagName(e)[0],w=window.twttr||{};return t.getElementById(r)?w:(n=t.createElement(e),n.id=r,n.src="https://platform.twitter.com/widgets.js",i.parentNode.insertBefore(n,i),w._e=[],w.ready=function(t){w._e.push(t)},w)}(document,"script","twitter-wjs");

{{-- Script for FB --}}
(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
!function(e,t,n){var o,s=e.getElementsByTagName(t)[0];e.getElementById(n)||(o=e.createElement(t),o.id=n,o.src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11",s.parentNode.insertBefore(o,s))}(document,"script","facebook-jssdk");
</script>

<section class="is-sns m-t-50 m-b-30 colus">
	<h3 class="m-b-20 is-size-6 title">イイねする？</h3>

	<div class="share-buttons is-clearfix">
		<div class="m-b-15">
			<a class="button is-warning is-size-7 has-text-weight-semibold" href="http://overseas.blogmura.com/montreal/ranking.html" target="_blank">
				<i class="fa fa-thumbs-up is-size-6 m-r-10"></i>にほんブログ村
			</a>
		</div>
		<div class="m-b-15">
			<a class="button is-success is-size-7 has-text-weight-semibold" href="http://blog.with2.net/link.php?1744264" target="_blank">
				<i class="fa fa-thumbs-up is-size-6 m-r-10"></i>海外生活ブログ
			</a>
		</div>
	</div>

	<div class="share-buttons m-t- is-clearfix">
		<div>
			<a class="button twitter-share-button" href="https://twitter.com/intent/tweet?text=#拡散希望" data-size="large">Tweet</a>
		</div>

		<div id="fb-root"></div>
		<div class="fb-like" data-href="http://www.quebec3.com/{{$post->slug}}" data-width="120" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
		&nbsp;
	</div>
</section>