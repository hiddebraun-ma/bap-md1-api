<div class="container">
    <h1>Postcode API voorbeeld</h1>
    <p>Vul postcode en huisnummer in</p>
    <form action="<?php echo url('/voorbeeld/zoeken') ?>" method="get">
        <div class="form-group">
            <label for="search">Postcode</label>
            <input type="text" name="postcode" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="search">Huisnummer</label>
            <input type="text" name="huisnummer" class="form-control"/>
        </div>
        <div class="form-action">
            <button type="submit" class="btn btn-primary">Zoeken</button>
        </div>
    </form>

    <?php if (isset($data)): ?>
        <hr>
        <div class="row">
            <?php foreach ($data['_embedded']['addresses'] as $address): ?>
                <div class="col-12 col-sm-6 col-md4">
                    <h4><?php echo $address['street'] ?> <?php echo $address['number'] ?><?php if(isset($address['addition'])):?>-<?php echo $address['addition'];?><?php endif;?></h4>
                    <p>
                        <?php echo $address['postcode'] ?> <?php echo $address['city']['label'] ?>
                        (<?php echo $address['province']['label'] ?>)
                    </p>
                    <p><a href="http://www.google.com/maps/place/<?php echo $address['geo']['center']['wgs84']['coordinates'][1]?>,<?php echo $address['geo']['center']['wgs84']['coordinates'][0]?>" class="btn btn-primary" target="_blank">Check op Google Maps</a></p>
                </div>
            <?php endforeach; ?>

        </div>
    <?php endif; ?>

</div>

