<div class="navigation-bar dark">
    <div class="navigation-bar-content container">
        <a href="#" class="element"><span class="icon-grid-view"></span> MICRONCLEAN REJECT GARMENTS<sup>1.0</sup></a>
        <span class="element-divider"></span>

        <a class="element1 pull-menu" href="#"></a>
        <ul class="element-menu">
            <li>
                <a class="dropdown-toggle" href="#">REJECT PHOTO</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                    <li><?php echo link_to('Upload Photo', 'photo/upload'  )?></li>
                    <li><?php echo link_to('Email Reject Photo', 'photo/emailRejectPhoto'  )?></li>
					<li><?php echo link_to('Email Manager', 'photo/emailManager'  )?></li>
					<li><?php echo link_to('Search Reject', 'photo/searchReject'  )?></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
