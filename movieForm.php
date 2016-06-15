
<!DOCTYPE html>
<html>
<head>
	<title>Movie Create Form</title>
</head>
<body>
	<h1>Edit Movie</h1>
	<form method="post" action="./?page=edit&amp;id=<?=$singlemovie['id']?>">
		<div>
			<label>Title</label>
			<input type="text" name="title" value="<?=$singlemovie['title']?>">
		</div>
		<div>
			<label>Description</label>
			<textarea name="description"><?=$singlemovie['description']?></textarea>
		</div>
		<div>
			<label>Rating</label>
			<select name="rating">
				<option value="PGR">PGR</option>
				<option value="R">R</option>
				<option value="M">M</option>
				<option value="G">G</option>
			</select>
		</div>
		<div>
			<label>Year Released</label>
			<input type="year" name="release_date" value="<?=$singlemovie['release_date']?>">
		</div>
		<div>
			<label>Duration</label>
			<input name="duration" value="<?=$singlemovie['duration']?>">
		</div>
		<button type="submit">Submit</button>

	</form>
</body>
</html>