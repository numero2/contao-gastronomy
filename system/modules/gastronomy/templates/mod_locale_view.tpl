<!--indexer::stop-->
<div class="mod_local">
    <h2 class="ce_headline"><?php echo $this->local['name']; ?></h2>
    <div class="ce_text block">
        <p><?php echo $this->local['description']; ?></p>
    </div>    
    <div class="ce_image block">
        <div class="image_container">
            <img src="<?php echo $this->local['main_image']; ?>" alt="<?php echo $this->local['name']; ?>" />
        </div>
    </div>
    <div class="ce_text block">
        <p><?php echo $this->local['addr_street']; ?>,<br/><?php echo $this->local['addr_postal']; ?> <?php echo $this->local['addr_city']; ?>,<br/><?php echo $this->local['cont_phone']; ?></p>
        <p><?php echo $this->local['opening_times']; ?></p>
    </div>
    <?php if( $this->linkURL ){ ?>
    <div class="ce_hyperlink bottom block">
        <a class="hyperlink_txt" rel="lightbox" title="So finden Sie das <?php echo $this->local['name']; ?>:" href="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=de&amp;q=<?php echo rawurlencode($this->local['addr_street'].', '.$this->local['addr_postal'].' '.$this->local['addr_city']); ?>&amp;output=embed">Anfahrtsbeschreibung</a> <br />
        <a title="mehr über <?php echo $this->local['name']; ?> lesen" class="hyperlink_txt" href="<?php echo $this->linkURL; ?>">mehr über <?php echo $this->local['name']; ?> lesen</a> 
    </div>
    <?php } ?>
</div>
<!--indexer::continue-->