
<div class="article-comment">
	<form action="" method="post">
		<input type="hidden" name="action" value="add-comment">
		<div>
			<div class="label-input">
				<label>Your name: <input type="text" name="author" value="<?= htmlspecialchars($commentAuthor); ?>"></label>

				<label>Rate article:
				<select name="rate">
					<?php for ($i=5; $i>0; $i--) { ?>
					<option value="<?= $i; ?>"
					<?php if ($i === $commentRate) { ?>selected<?php } ?>
					>Rate <?= $i; ?></option>
					<?php } ?>
				</select>
			</label>
			</div>
			<?php if (isset($commentErrors['author'])) { ?>
				<div class="comment-error"><?= $commentErrors['author']; ?></div>
				<?php } ?>
			<?php if (isset($commentErrors['rate'])) { ?>
			<div class="comment-error"><?= $commentErrors['rate']; ?></div>
			<?php } ?>
		</div>
		<div>
			<label>
			<textarea name="comment" cols="30" rows="5"><?= htmlspecialchars($commentText); ?></textarea>
			</label>
			<?php if (isset($commentErrors['comment'])) { ?>
			<div class="comment-error"><?= $commentErrors['comment']; ?></div>
			<?php } ?>
			<input type="submit" value="Send">
		</div>
	</form>
</div>



<div class="article-comments">
	<?php
	$comments = get_comments($post_id);
	foreach($comments as $row):  ?>
	<article class="article-comment">
		<header class="comment-header">
			<div class="comment-author">Author: <?= htmlspecialchars($row['author']); ?></div>
			<div class="comment-rate">Rate: <?= $row['rate']; ?></div>
			<div>
				Published on
				<time datetime="<?= $row['created']; ?>">
				<?= date('D, d M Y', strtotime($row['created'])); ?>
				</time>
			</div>
		</header>
		<div class="comment-content"><?= nl2br(htmlspecialchars($row['text'])); ?></div>
	</article>
	<?php endforeach; ?>
</div>
