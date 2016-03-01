        <ul class="element-menu">
            <li>
                <a class="dropdown-toggle" href="#">POWER/WATER CONSUMPTION</a>
                <ul class="dropdown-menu dark" data-role="dropdown">
                    <li><?php echo link_to('Power Consumption Daily', 'expenses/powerConsumptionSearch'  )?></li>
                    <li><?php echo link_to('Water Consumption Daily', 'expenses/waterConsumptionSearch'  )?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to('Power Consumption Monthly', 'expenses/pubPowerConsumptionSearch'  )?></li>
                    <li><?php echo link_to('Water Consumption Monthly', 'expenses/pubWaterConsumptionSearch'  )?></li>
                    <li class="divider"></li>
                    <li><?php echo link_to('Diesel Consumption', 'expenses/dieselConsumptionSearch'  )?></li>
                </ul>
            </li>
   