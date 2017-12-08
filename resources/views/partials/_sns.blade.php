<section class="m-t-50 m-b-30">
	<h3 class="m-b-20 has-text-centered is-size-6 title">イイねする？</h3>
	<div class="columns">
		<div class="column is-narrow">
			<a class="button is-success is-sns is-fullwidth" href="http://overseas.blogmura.com/montreal/ranking.html" target="_blank">
				<i class="fa fa-thumbs-o-up m-r-10"></i>にほんブログ村ランキング
			</a>
		</div>

		<div class="column is-narrow">
			<a class="button is-success is-sns is-fullwidth" href="http://blog.with2.net/link.php?1744264" target="_blank">
				<i class="fa fa-thumbs-o-up m-r-10"></i>海外生活ブログランキング
			</a>
		</div>
	</div>

	<div class="columns">
		<div class="column is-narrow">
			<a class="button is-success is-sns is-fullwidth" href="http://www.facebook.com/share.php?u={{ url()->current() }}" target="_blank">
				<i class="fa fa-facebook-square m-r-10"></i>Facebookでシェア
			</a>
		</div>

		<div class="column is-narrow">
			<a class="button is-success is-sns is-fullwidth" href="http://twitter.com/share?url={{ url()->current() }}&amp;text={{ $post->title }}" target="_blank">
				<i class="fa fa-twitter-square m-r-10"></i>Twitterでシェア
			</a>
		</div>
	</div>

</section>