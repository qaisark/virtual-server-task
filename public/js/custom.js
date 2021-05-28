$( document ).ready(function() {
    updateTotal();
    $("#curreny").on('change', function(){
        if($('#monthly_cost_value_prefix').text()=="AUD")
        {
            var _new = $(this).val();
            if(_new != $('#monthly_cost_value_prefix').text()){
                updateValue(0.98);
                $('#monthly_cost_value_prefix').text(_new);
            }
            
        }
        else
        {
            var _new = $(this).val();
            if(_new != $('#monthly_cost_value_prefix').text()){
                updateValue(1.02);
                $('#monthly_cost_value_prefix').text(_new);
            }
           
        }
       

    });
    $("#avialablezone_id").on('change', function(){
        $('#summary_availabilityzone').text($(this).find(':selected').data('name'));
        updateTotal();
    });

    $("#storage_type").on('change', function(){
        $('#summary_storage_val').text($(this).find(':selected').data('val'));
        $('#summary_storage_cost').text($(this).find(':selected').data('price'));
        updateTotal();
    });

    $("#os").on('change', function(){
        $('#summary_os').text($(this).find(':selected').data('val'));
        $('#summary_os_cost').text($(this).find(':selected').data('price'));
        updateTotal();
    });

    $("#option_zg-cs-processor").on('change', function(){
        $('#processor_s').text($(this).val());
        var current = $('#processor_s_cost').val();
        var check =$(this).val()/0.4;
        $('#processor_s_cost').text(((3.80*check).toFixed(2)));
        updateTotal();
    });
    
    $("#option_zg-cs-memory").on('change', function(){
        $('#summary_ram').text($(this).val());
        var current = $('#summary_ram_cost').val();
        var check =$(this).val()/0.25;
        $('#summary_ram_cost').text(((6.12*check).toFixed(2)));
        updateTotal();
    });
    $("#option_storage_amount").on('change', function(){
        $('#summary_storage').text($(this).val());
        var current = $('#summary_storage_cost').val();
        var check =$(this).val()/100;
        $('#summary_storage_cost').text(((($("#storage_type").find('option:selected').data('price'))*check).toFixed(2)));
        updateTotal();
    });

    $("#option_zg-cs-traffic").on('change', function(){
        $('#summary_traffic').text($(this).val());
        var check =$(this).val()/50;
        $('#summary_traffic_cost').text((((1.4)*check).toFixed(2)));
        updateTotal();
    });


    function updateTotal()
    {
        var total=parseFloat($('#summary_storage_cost').text())+ parseFloat($('#summary_os_cost').text())+parseFloat($('#processor_s_cost').text())+parseFloat($('#summary_ram_cost').text())+parseFloat($('#summary_storage_cost').text())+parseFloat($('#summary_traffic_cost').text());
        $('#monthly_cost_value').text(total.toFixed(2));
    }

    function updateValue(value)
    {
        $('#summary_storage_cost').text(parseFloat((value*parseFloat($('#summary_storage_cost').text())).toFixed(2)));
        $('#summary_os_cost').text(parseFloat((value*parseFloat($('#summary_os_cost').text())).toFixed(2)));
        $('#processor_s_cost').text(parseFloat((value*parseFloat($('#processor_s_cost').text())).toFixed(2)));
        $('#summary_ram_cost').text(parseFloat((value*parseFloat($('#summary_ram_cost').text())).toFixed(2)));
        $('#summary_storage_cost').text(parseFloat((value*parseFloat($('#summary_storage_cost').text())).toFixed(2)));
        $('#summary_traffic_cost').text(parseFloat((value*parseFloat($('#summary_traffic_cost').text())).toFixed(2)));
        updateTotal();
    }
});