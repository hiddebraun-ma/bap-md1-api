<div class="container">
    <h1>Voorbeeld</h1>
    <p>Vul hier de zoekopdracht in voor een film titel, dit voorbeeld roept de
        <a href="https://omdbapi.com" target="_blank">OMDBAPI</a> aan</p>
    <form action="<?php echo url( '/voorbeeld/zoeken' ) ?>" method="get">
        <div class="form-group">
            <label for="search">Zoek naar</label>
            <input type="text" name="zoekopdracht" class="form-control"/>
        </div>
        <div class="form-action">
            <button type="submit" class="btn btn-primary">Zoeken</button>
        </div>
    </form>
	<?php if ( isset( $data ) ): ?>
        <p>Er zijn <?php echo $data['totalResults'] ?> resultaten gevonden...</p>
        <div class="row">
			<?php foreach ( $data['Search'] as $result ): ?>
                <div class="col-12 col-sm-6 col-md-4">
                    <h4><?php echo $result['Title'] ?> (<?php echo $result['Year'] ?>)</h4>
                    <img src="<?php echo $result['Poster'] ?>" alt="" class="img-fluid"/>
                    <p><a href="https://www.imdb.com/title/<?php echo $result['imdbID']?>" target="_blank">Bekijk op IMDB</a></p>
                </div>
			<?php endforeach; ?>
        </div>
	<?php endif; ?>
</div>

