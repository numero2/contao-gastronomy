<!--indexer::stop-->
<div class="mod_dailymenu_page">
    <h1><?php echo sprintf($GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['menu_from_till'],date('d.m',$this->minDate),date('d.m',$this->maxDate)); ?></h1>

    <a class="pdf" href="<?php echo $this->pdfLink; ?>">
        <?php echo $GLOBALS['TL_LANG']['tl_gastronomy_dailymenus']['pdf']; ?> <img src="system/modules/frontend/html/pdf.gif" />
    </a>

    <div style="clear:both;"></div>
    
    <?php if( $this->locals ) { ?>
        <?php foreach( $this->locals as $local ) { ?>
        <?php if( $local['_menus'] ) { ?>
        <div class="mod_dailymenu">
            <div class="head">
                <div class="logo">
                    <?php if( $local['logo'] ) { ?>
                        <img src="<?php echo $local['logo']; ?>" alt="<?php echo $local['name']; ?> Logo" title="<?php echo $local['name']; ?> Logo" />
                    <?php } ?>
                </div>
                <div class="name">
                    <?php echo $local['name']; ?> - <?php echo $local['addr_street']; ?> - Tel. <?php echo $local['cont_phone']; ?>
                </div>
            </div>
            <div class="list">
                <?php foreach( $local['_menus'] as $menu ) { ?>
                    <div class="day"><?php echo $GLOBALS['TL_LANG']['DAYS'][date('w',$menu['date'])]; ?></div>
                    <div class="name"><?php echo $menu['name']; ?></div>
                    <div class="price"><?php if( $menu['price'] > 0 ) { ?><?php echo number_format($menu['price'],2,',','.'); ?> &euro;<?php } ?></div>
                    <div style="clear:both;"></div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
    <?php }?>
</div>
<!--indexer::continue-->