<!--HEADER START-->
<div align="center">
    <span style="font-size: 95px;"><?php echo sprintf( 'TAGESMENÜKARTE <span style="font-size:60px;">vom</span> %s <span style="font-size:60px;">bis</span> %s',date('d.m.',$this->minDate),date('d.m.',$this->maxDate) ); ?></span>
    <span style="font-size: 60px;">- Alle Speisen auch zum Mitnehmen -</span>
</div>
<!--HEADER END-->

<br/>

<?php if( $this->locals ) { ?>
<!--LISTING START-->
<div>
    <?php foreach( $this->locals as $local ) { ?>
    <?php if( $local['_menus'] ) { ?>    
        <table border="0" cellspacing="3" cellpadding="4" width="100%" height="100" style="border: 1px solid #993300;">
        <tr>
            <td width="20%" align="center">
                <img src="<?php echo $local['logo']; ?>" height="80" />
            </td>
            <td width="80%" align="left" style="font-weight:bold;">
                <div style="line-height:5px;">
                    <span style="font-size:60px;"><?php echo strtoupper($local['name']); ?></span>
                    &nbsp;&nbsp;&nbsp;<span>Tel. <?php echo $local['cont_phone']; ?> <?php echo $local['addr_street']; ?></span>
                </div>
            </td>
        </tr>
        </table>

        <div height="10px"></div>
        
        <table border="0" cellspacing="3" cellpadding="0" width="100%">
            <?php foreach( $local['_menus'] as $i => $menu ) { ?>
            <?php if( $i == 7 ) { break; }; ?>
            <tr>
                <td align="left" width="22%" style="font-weight:bold;">
                    <?php echo strtoupper($GLOBALS['TL_LANG']['DAYS'][date('w',$menu['date'])]); ?>
                </td>
                <td align="left" width="68%">
                    <?php echo $menu['name']; ?>
                </td>
                <td align="right" width="10%" style="font-weight:bold;">
                    <?php if( $menu['price'] > 0 ) { ?>
                    <?php echo number_format($menu['price'],2,',','.'); ?> &euro;
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    
        <div height="30px"></div>
    <?php } ?>
    <?php } ?>
</div>
<!--LISTING END-->
<?php }?>

<!--FREETEXTS START-->
<table border="0" cellspacing="3" cellpadding="4" width="100%" height="100" style="border: 1px solid #993300;">
<tr>
    <td align="center" style="font-size:50px;">
        Über die Tage ne Party in der eXpresso Kellerbar feiern?  Gerne!!
    </td>
</tr>
</table>

<br/>

<table border="0" cellspacing="3" cellpadding="4" width="100%" height="100" style="border: 1px solid #993300;">
<tr>
    <td align="center" style="font-size:50px; color:#993300; font-weight:bold;">
        Immer eine gute Idee: Unser Geschenkgutschein!
    </td>
</tr>
</table>
<!--FREETEXTS END-->

<br/>
<br/>

<?php if( $this->locals ) { ?>
<!--LOGOS START-->
<table border="0" width="100%">
<tr>
    <?php foreach( $this->locals as $local ) { ?>
    <td align="center" width="<?php echo (100/count($this->locals)); ?>%">
        <img src="<?php echo $local['logo']; ?>" height="60" />
    </td>
    <?php } ?>
</tr>
</table>
<!--LOGOS END-->
<?php } ?>

<br/>

<!--FOOTER START-->
<table border="0" width="100%" height="100">
<tr>
    <td align="left" width="50%">
        INTERNET: <b>www.byGALLIAN.de</b>
    </td>
    <td align="right" width="50%">
        E-MAIL: <b>post@cityprisma.de</b>
    </td>
</tr>
</table>
<!--FOOTER END-->