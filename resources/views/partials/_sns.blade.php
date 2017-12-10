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

<div id="fb-root"></div>

<section class="is-sns m-t-50 m-b-30">
	<h3 class="m-b-20 has-text-centered is-size-6 title">イイねする？</h3>
	<div class="columns">
		<div class="column is-narrow">
			<a class="button is-warning as-text-white is-fullwidth" href="http://overseas.blogmura.com/montreal/ranking.html" target="_blank">
				<i class="fa fa-thumbs-up is-size-5 m-r-10"></i>にほんブログ村
			</a>
		</div>

		<div class="column is-narrow">
			<a class="button is-success as-text-white is-fullwidth" href="http://blog.with2.net/link.php?1744264" target="_blank">
				<i class="fa fa-thumbs-up is-size-5 m-r-10"></i>海外生活ブログ
			</a>
		</div>
		<div class="column is-narrow">
			<div class="fb-like" data-href="http://www.quebec3.com/{{$post->slug}}" data-width="120" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
		</div>
		<div class="column is-narrow">
			<a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=#拡散希望" data-size="large">Tweet</a>
		</div>
	</div>
</section>