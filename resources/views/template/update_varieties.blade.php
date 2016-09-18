<script type="text/javascript">

    var varietySelectElement = $("#variety_id");
    $("#product_id").change(function (e) {

        $.get('{{ action('VarietyController@getVarieties') }}/'+e.target.value,function (data) {

            varietySelectElement.empty();

            /*Add All Varieties Option*/
            let optionElement = document.createElement("option");
            optionElement.innerText = "All Varieties";
            varietySelectElement.append(optionElement);

            for(var item in data){
                if(data.hasOwnProperty(item)){
                    let optionElement = document.createElement("option");
                    optionElement.value = data[item];
                    optionElement.innerText = item;
                    varietySelectElement.append(optionElement);
                }
            }

            if($.isEmptyObject(data))
                varietySelectElement.attr('disabled','disabled');
            else
                varietySelectElement.removeAttr('disabled');

            varietySelectElement.selectpicker('refresh');
        })
    });
</script>