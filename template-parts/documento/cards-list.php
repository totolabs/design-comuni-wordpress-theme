<?php 
    global $posts;

        $description = dci_get_meta('descrizione_breve');
        if ($post->post_type == 'dataset') {
            $tipo = '';
            $arrdata = explode( '-', date('d-m-Y', dci_get_meta("data_modifica")));
        }
        else {
            $arrdata = explode( '-', dci_get_meta("data_protocollo") );
            $tipo = get_the_terms($post->term_id, 'tipi_documento')[0];
        }
        $monthName = date_i18n('M', mktime(0, 0, 0, $arrdata[1], 10));
        $img = dci_get_meta('immagine');
        if ($img) {
?>
    <div class="col-md-6 col-xl-4">
        <div class="card-wrapper border border-light rounded shadow-sm cmp-list-card-img cmp-list-card-img-hr">
            <div class="card no-after rounded">
            <div class="row g-2 g-md-0 flex-md-column">
                <div class="col-4 order-2 order-md-1">
                <?php dci_get_img($img, 'rounded-top img-fluid img-responsive'); ?>
                </div>
                <div class="col-8 order-1 order-md-2">
                <div class="card-body">
                    <div class="category-top cmp-list-card-img__body">
                        <?php if ($tipo) { ?> 
                            <a class="category cmp-list-card-img__body-heading-title underline"
                                href="<?php echo get_term_link($tipo->term_id); ?>" aria-label="<?php echo $tipo->name; ?>" title="<?php echo $tipo->name; ?>"
                            ><?php echo $tipo->name; ?></a>
                        <?php } ?>                    
                    <span class="data"><?php echo $arrdata[0].' '.$monthName.' '.$arrdata[2] ?></span>
                    </div>
                    <a href="<?php echo get_permalink(); ?>" aria-label="vai al documento <?php echo the_title(); ?>" title="vai al documento <?php echo the_title(); ?>">
                        <h3 class="h5 card-title u-grey-light"><?php echo the_title(); ?></h3>
                    </a>
                    <p class="card-text d-none d-md-block">
                        <?php echo $description; ?>
                    </p>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <?php } else { ?>
    <div class="col-md-6 col-xl-4">
        <div class="card-wrapper border border-light rounded shadow-sm cmp-list-card-img cmp-list-card-img-hr">
            <div class="card no-after rounded">
                <div class="row g-2 g-md-0 flex-md-column">
                    <div class="col-12 order-1 order-md-2">
                        <div class="card-img-none rounded-top">
                            <div class="category-top cmp-list-card-img__body">
                            <?php if ($tipo) { ?> 
                                <a class="category cmp-list-card-img__body-heading-title underline"
                                    href="<?php echo get_term_link($tipo->term_id); ?>" aria-label="<?php echo $tipo->name; ?>" title="<?php echo $tipo->name; ?>"
                                ><?php echo strtoupper($tipo->name); ?></a>
                            <?php } ?>           
                                <span class="data"><?php echo $arrdata[0].' '.strtoupper($monthName).' '.$arrdata[2] ?></span>
                            </div>
                            <a href="<?php echo get_permalink(); ?>" aria-label="vai al documento <?php echo the_title(); ?>" title="vai al documento <?php echo the_title(); ?>">
                                <h3 class="h5 card-title u-grey-light"><?php echo the_title(); ?></h3>
                            </a>
                            <p class="card-text d-none d-md-block">
                                <?php echo $description; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>