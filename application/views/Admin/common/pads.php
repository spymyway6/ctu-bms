<div class="row e-pads-wrapper">
    <div class="col-md-12">
        <div class="row">
            <!-- Pad C -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box main-pads" id="pad-c">
                    <div class="text-left">
                        <h4 class="text-primary"><b class="counter"><i class="ti-music"></i>PADS: Key of C (6)</b></h4>
                        <div onclick="adjustVolumes()" onchange="adjustVolumes()" class="slider slider-primary d-block">
                            <input type="text" data-plugin="range-slider" value="<?=$settings['pads_key_C_vol'];?>" data-slider-orientation="horizontal" data-slider-min="0" data-slider-max="100" data-slider-value="<?=$settings['pads_key_C_vol'];?>" data-slider-tooltip="hide" name="pads_key_C_vol" id="pads_key_C_vol">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Pad D -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box main-pads" id="pad-d">
                    <div class="text-left">
                        <h4 class="text-success"><b class="counter"><i class="ti-music"></i>PADS: Key of D (7)</b></h4>
                        <div onclick="adjustVolumes()" onchange="adjustVolumes()" class="slider slider-success d-block">
                            <input type="text" data-plugin="range-slider" value="<?=$settings['pads_key_D_vol'];?>" data-slider-orientation="horizontal" data-slider-min="0" data-slider-max="100" data-slider-value="<?=$settings['pads_key_D_vol'];?>" data-slider-tooltip="hide" name="pads_key_D_vol" id="pads_key_D_vol">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Pad E -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box main-pads" id="pad-e">
                    <div class="text-left">
                        <h4 class="text-info"><b class="counter"><i class="ti-music"></i>PADS: Key of E (8)</b></h4>
                        <div onclick="adjustVolumes()" onchange="adjustVolumes()" class="slider slider-info d-block">
                            <input type="text" data-plugin="range-slider" value="<?=$settings['pads_key_E_vol'];?>" data-slider-orientation="horizontal" data-slider-min="0" data-slider-max="100" data-slider-value="<?=$settings['pads_key_E_vol'];?>" data-slider-tooltip="hide" name="pads_key_E_vol" id="pads_key_E_vol">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Pad F -->
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="widget-bg-color-icon card-box main-pads" id="pad-f">
                    <div class="text-left">
                        <h4 class="text-danger"><b class="counter"><i class="ti-music"></i>PADS: Key of F (9)</b></h4>
                        <div onclick="adjustVolumes()" onchange="adjustVolumes()" class="slider slider-danger d-block">
                            <input type="text" data-plugin="range-slider" value="<?=$settings['pads_key_F_vol'];?>" data-slider-orientation="horizontal" data-slider-min="0" data-slider-max="100" data-slider-value="<?=$settings['pads_key_F_vol'];?>" data-slider-tooltip="hide" name="pads_key_F_vol" id="pads_key_F_vol">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>