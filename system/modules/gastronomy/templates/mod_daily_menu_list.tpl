<!--indexer::stop-->
<div class="<?php echo $this->class; ?>"<?php echo $this->cssID; ?><?php if ($this->style): ?> style="<?php echo $this->style; ?>"<?php endif; ?>>
<?php if ($this->headline): ?>
    <<?php echo $this->hl; ?>><?php echo $this->headline; ?></<?php echo $this->hl; ?>>
<?php endif; ?>

    <?php if( $this->menus ) { ?>
        <?php foreach( $this->menus as $menu ) { ?>
            <div class="entry">
                <div class="date">
                    <b><?php echo $menu['local']; ?></b> - <?php echo date('d.m.Y',$menu['date']); ?>
                </div>
                <div class="desc">
                    <?php echo $menu['name']; ?><?php if( $menu['price'] > 0 ) { ?>, <?php echo number_format($menu['price'],2,',','.'); ?> &euro;<?php } ?>
                </div>
            </div>
        <?php } ?>
    <?php } else { ?>
        Die Tagesgerichte für heute stehen leider noch nicht fest.
    <?php } ?>

</div>
<!--indexer::continue-->