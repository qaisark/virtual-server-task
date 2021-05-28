@extends('layouts.app')
@section('content')
<div class="row p-2">
            <div class="col-md-9">
                <div class="row">
                <div class="col-md-6">
                    <div class="card">                 
                        <h5 class="card-header">Availability Zone</h5>
                        <div class="card-body">
                            <div class="form-group row">
                                <label id="label-az" for="az" class="col-5 control-label">
                                   Location
                                </label>
                                <div class="col-7">
                                    <div class="input-group" id="az">
                                        <select class="form-control" id="avialablezone_id">
                                            @if(isset($locations)&&(count($locations)>0))
                                                @foreach($locations as $location)
                                                    <option value="{{$location->value}}" data-name="{{$location->name}}">{{$location->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 
                <div class="col-md-6">
                    <div class="card">                 
                            <h5 class="card-header">Compute</h5>
                            <div class="card-body" id="card-cpu">
                                <div class="form-group row">
                            <label id="label-cs-p" for="opt-cs-p" class="col-5 control-label">
                                Processor (vCPU)
                            </label>
                            <div class="col-7">
                                <div class="input-group" id="opt-cs-p">
                                <input class="form-control slider_input" name="option_zg-cs-processor" id="option_zg-cs-processor" value="0.4" type="number" data-id="zg-cs-processor" data-required="true" data-prev-value="0.4" data-charge-magnitude="1000000" data-display-magnitude="1000000000" min="0.4" max="12.8" step="0.4" data-type="Numeric" data-default-min="0.4">
                            <div class="input-group-append">
                                <span id="input_help_zg-cs-processor" class="input-group-text pc-input-group-text border-shadow" data-toggle="popover" data-placement="bottom" data-original-title="" title="">
                                    <span class="thin-border-dashed">GHz</span>
                                </span>
                            </div></div>
                            </div>
                        </div><div class="form-group row">
                            <label id="label_zg-cs-memory" for="option_zg-cs-memory" class="col-5 control-label">
                                RAM
                            </label>
                            <div class="col-7">
                                <div class="input-group" id="input_div_zg-cs-memory">
                                <input class="form-control slider_input" name="option_zg-cs-memory" id="option_zg-cs-memory" value="0.25" type="number" data-id="zg-cs-memory" data-required="true" data-prev-value="0.25" data-charge-magnitude="1048576" data-display-magnitude="1073741824" min="0.25" max="32" step="0.25" data-type="Numeric" data-summary-value-id="summary_display_value_zg-cs-memory" data-summary-cost-id="summary_display_cost_zg-cs-memory" data-default-min="0.25">
                            <div class="input-group-append">
                                <span id="input_help_zg-cs-memory" class="input-group-text pc-input-group-text border-shadow" data-toggle="popover" data-placement="bottom" data-original-title="" title="">
                                    <span class="thin-border-dashed">GB</span>
                                </span>
                            </div></div>
                            </div>
                        </div></div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">                 
                            <h5 class="card-header">Storage</h5>
                            <div class="card-body" id="card-storage">
                                <div class="form-group row">
                            <label id="label_storage_type" for="option_storage_type" class="col-5 control-label">
                                <div>
                                    <span id="label_display_storage_type">Tier<span>
                                </span></span></div>
                                <div>
                                    <span id="label_info_storage_type" class="ml-1 glyphicons glyphicons-circle_question_mark" data-toggle="popover" data-placement="bottom" data-title="Tier" data-content="We offer storage based on Input/Output Operations Per Second (IOPS). Your storage speed is limited to the tier you choose. Choose fast storage for your SQL and Exchange servers and slower storage for less utilised servers. You can always change your storage speed at any time without downtime. If you need multiple storage tiers, consider a Virtual Data Centre." data-original-title="" title=""></span>
                                </div>
                                <span class="badge badge-danger hover-error ml-2" style=""></span>
                            </label>
                            <div class="col-7">
                                <div class="input-group" id="input_div_storage_type">
                                    <select class="storage_type_select form-control" name="storage_type" id="storage_type" data-summary-text-id="summary_display_type_zg-cs-storage">
                                        @if(isset($tiers)&&(count($tiers)>0))
                                            @foreach($tiers as $tier)
                                                <option value="{{$tier->value}}" data-val="{{$tier->value}}" data-price="{{$tier->price}}">{{$tier->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                 </div>
                            </div>
                        </div><div class="form-group row">
                            <label id="label_storage_amount" for="option_zg-cs-ios250-storage" class="col-5 control-label">
                               Storage Capacity
                            </label>
                            <div class="col-7">
                                <div class="input-group" id="input_div_storage_amount">
                                <input class="form-control slider_input" name="option_zg-cs-ios250-storage" id="option_storage_amount" value="100" type="number" data-id="zg-cs-ios250-storage" data-required="true" data-prev-value="100" data-charge-magnitude="1073741824" min="100" max="10000" step="100" data-type="Numeric" data-summary-value-id="summary_display_value_zg-cs-storage" data-summary-cost-id="summary_display_cost_zg-cs-storage">
                            <div class="input-group-append">
                                <span id="input_help_storage_amount" class="input-group-text pc-input-group-text border-shadow" data-toggle="popover" data-placement="bottom"  title="">
                                    <span class="thin-border-dashed">GB</span>
                                </span>
                            </div></div>
                            </div>
                        </div></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">                 
                            <h5 class="card-header">Network</h5>
                            <div class="card-body" id="card-traffic">
                                <div class="form-group row">
                            <label id="label_zg-cs-traffic" for="option_zg-cs-traffic" class="col-5 control-label">
                                Traffic
                            </label>
                            <div class="col-7">
                                <div class="input-group" id="input_div_zg-cs-traffic">
                                <input class="form-control slider_input" name="option_zg-cs-traffic" id="option_zg-cs-traffic" value="100" type="number" data-id="zg-cs-traffic" data-required="true" data-prev-value="100" data-charge-magnitude="1073741824" min="100" max="20000" step="50" data-type="Numeric" data-summary-value-id="summary_display_value_zg-cs-traffic" data-summary-cost-id="summary_display_cost_zg-cs-traffic">
                            <div class="input-group-append">
                                <span id="input_help_zg-cs-traffic" class="input-group-text pc-input-group-text border-shadow" data-toggle="popover" data-placement="bottom" title="">
                                    <span class="thin-border-dashed">GB</span>
                                </span>
                            </div></div>
                            </div>
                        </div></div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">            
                        <h5 class="card-header">Network</h5>
     
                        <div class="card-body" id="card-os">
                            <div class="form-group row">
                        <label id="label_zg-cs-operatingsystem" for="option_zg-cs-operatingsystem" class="col-5 control-label">
                            <div>
                                <span id="label_display_zg-cs-operatingsystem">Operating System<span>
                            </span></span></div>
                            <div>
                                <span id="label_info_zg-cs-operatingsystem" class="ml-1 glyphicons glyphicons-circle_question_mark" data-toggle="popover" data-placement="bottom" data-title="Operating System" data-content="If you don't see the operating system you require you can upload your own. See our FAQ for further information." data-original-title="" title=""></span>
                            </div>
                            <span class="badge badge-danger hover-error ml-2" style=""></span>
                        </label>
                        <div class="col-7">
                            <div class="input-group" id="input_div_zg-cs-operatingsystem">
                            <select class="form-control"id="os">
                                @if(isset($operating_systems)&&(count($operating_systems)>0))
                                    @foreach($operating_systems as $os)
                                        <option value="{{$os->value}}" data-val="{{$os->name}}" data-price="{{$os->price}}">{{$os->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            </div>
                        </div>
                    </div></div>
                    </div>
                </div>
            </div>
            </div>

            <div class="card col-md-3">
                <div class="mb-2 p-0">
                    <div class="productsummary sticky" style="margin-top: 0px;">
                        <div class="widget-body">
                            <div style="width:100%">
                                <div style="margin-bottom:5px;">
                                    <div class="row p-2">
                                    <h3 class="col pr-0">Summary</h3>
                                    <select name="curreny" id="curreny" data-prev="AUD" class="form-control">
                                        <option value="AUD">Australian Dollar $AUD</option>
                                        <option value="SGD">Singapore Dollar $SGD</option>
                                    </select>
                                </div>
                            </div>
                                    <div><div class="summarysubtitle">Compute</div><div class="row separator bottom">
                                <div class="col-8 text-left summary_item">
                                    <span id="processor_s" style="word-wrap:break-word">0.4</span>
                                    <span> Ghz</span>
                                    <span> Processor</span>
                                </div>
                                <div class="col-4 text-right summary_item text-nowrap">
                                    $<small id="processor_s_cost">3.80</small>
                                </div>
                            </div><div class="row separator bottom">
                                <div class="col-8 text-left summary_item">
                                    <span id="summary_ram">0.5</span>
                                    <span> GB</span>
                                    <span> RAM</span>
                                </div>
                                <div class="col-4 text-right summary_item text-nowrap">
                                $<small id="summary_ram_cost">9.80</small>
                                </div>
                            </div><div class="summarysubtitle">Storage</div><div class="row separator bottom">
                                <div class="col-8 text-left summary_item">
                                    <span id="summary_storage">500</span>
                                    <span> GB</span>
                                    <span id="summary_storage_val">ioSTOR-250</span>
                                </div>
                                <div class="col-4 text-right summary_item text-nowrap">
                                $<small id="summary_storage_cost">15.00</small>
                                </div>
                            </div><div class="summarysubtitle">Operating System</div><div class="row separator bottom">
                                <div class="col-8 text-left summary_item">
                                    <span id="summary_os">CentOS Server 7</span>
                                   
                                </div>
                                <div class="col-4 text-right summary_item text-nowrap">
                                $<small id="summary_os_cost">0.00</small>
                                </div>
                            </div><div class="summarysubtitle">Network</div><div class="row separator bottom">
                                <div class="col-8 text-left summary_item">
                                    <span id="summary_traffic">100</span>
                                    <span> GB</span>
                                    <span> Traffic</span>
                                   
                                </div>
                                <div class="col-4 text-right summary_item text-nowrap">
                                $<small id="summary_traffic_cost">2.80</small>
                                </div>
                            </div><div class="summarysubtitle">Location</div><div class="row separator bottom">
                                <div class="col-8 text-left summary_item">
                                    <span id="summary_availabilityzone">AUS - Adelaide</span>
                                    
                                </div>
                                <div class="col-4 text-right summary_item text-nowrap">
                                $<small class="summary_item_cost" id="summary_availabilityzone_cost">0.00</small>
                                </div>
                            </div><div class="summarysubtitle">Machine Name</div><div class="row separator bottom">
                                <div class="col-8 text-left summary_item">
                                    <span></span>
                                    <span >Auto Generated</span>
                                   
                                </div>
                                <div class="col-4 text-right summary_item text-nowrap">
                                    <small class="summary_item_cost" id="summary_display_cost_zg-cs-machine-name"></small>
                                </div>
                            </div>
                            </div>
        
                                </div>
        
                                <hr>
                                <div class="text-center separator-md">
                                    <span id="summary_warning" class="badge badge-warning" style="text-align: left; white-space: unset;"></span>
                                    <strong style="font-size:18px;"><span id="monthly_cost"><span id="monthly_cost_value_prefix">AUD</span> $<span id="monthly_cost_value" data-value="66.4">66.40</span><span id="monthly_cost_value_suffix"></span></span></strong><span id="monthly_cost_message">/month</span><br>
                                    <span style="font-size:12px" id="tax_description">GST Inclusive</span>
                                    <div class=""></div>
                                    <p align="center">
                                        <button id="calc_button" type="button" value="CALCULATE" class="btn btn-success" style="min-width: 150px; display: none;">CALCULATE</button>
                                        <button id="add_button" type="submit" value="CHECKOUT" class="btn btn-success" style="min-width: 150px;">Add To Order</button>
                                    </p>
                                    <div class="separator bottom"></div>
                                    
                                    <a target="_blank" class="volume-link" href="https://www.zettagrid.com/cloudcomputing/volume-pricing/">Want Volume Pricing?</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection