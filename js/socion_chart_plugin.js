/**
 * @file
 * Contains js for chartjs plugins.
 */

/* eslint-disable no-unused-vars */

var socion_chart_plugin = {
  afterInit: function (chart) {
    var aspect_inputs = jQuery('[id^="aspect-"]');
    // console.log(input_array);
    aspect_inputs.each(function( index ) {
      jQuery( this ).change(function(index) {
        jQuery( this ).addClass("changed-aspect");
        jQuery.getJSON( "/socion/sociotypes_data.json", function (json) {
          var input_array = [];
          var types_array = json['data'];
          aspect_inputs.each(function( index ) {
            if(jQuery( this ).hasClass("changed-aspect"))
            {
              input_array[index] = parseInt(jQuery(this).find("input").val());
            }
          });
          updateChart(input_array, types_array, chart);
        });
      });
    });
    // console.log(aspect_inputs);
    // aspect_inputs.each(function( index ) {
    //   jQuery( this ).change(function() {
    //     var aspect_id = jQuery( this ).attr('id').substr(-1,1);
    //     console.log(aspect_id);
    //     aspect_id = parseInt(aspect_id);
    //     var input_value = parseInt(jQuery(this).find("input").val());
    //
    //     var i = 0;
    //     for (var type_key in types_array){
    //       if(i != 0)
    //       {
    //         chart.data.datasets[0].data[i] = (input_value/10) - parseFloat(types_array[type_key][aspect_id]) + parseFloat(types_array["sum"][aspect_id]);
    //         console.log(chart.data.datasets[0].data[i]);
    //       }
    //       i++;
    //     }
    //
    //     chart.update();
    //   });
    // });




  }
};

function updateChart(input_array, types_array, chart )
{
  var temp_array = [];
  var i=0;
  for (var type_key in types_array){
    if(type_key != "sum"){
      temp_array[type_key] = [];
      for(var aspect_key in input_array)
      {
        temp_array[type_key][aspect_key] = Math.abs((input_array[aspect_key]/10) - parseFloat(types_array[type_key][aspect_key])) + parseFloat(types_array["sum"][aspect_key]);
      }
      i++;
    }
  }
  for(var key in temp_array){
    temp_array[key] = parseFloat(temp_array[key].reduce((a, b) => a + b, 0));
  }

  var max = arrayMax(temp_array);
  var min = arrayMin(temp_array);
  var avverage = (max + min) / 2;

  var chart_data = [];
  for(var key in temp_array){
    chart_data.push(avverage - temp_array[key] );
  }

  console.log(temp_array);
  console.log(min);
  console.log(max);
  console.log(avverage);

  chart.data.datasets[0].data = chart_data;
  console.log(chart_data);
  chart.update();


}

function arrayMin(array){
  var min_value = Infinity;
  for(var key in array )
  {
    if(array[key] < min_value){
      min_value = array[key];
    }
  }
  return min_value;
}

function arrayMax(array){
  var max_value = -Infinity;
  for(var key in array )
  {
    if(array[key]  > max_value){
      max_value = array[key];
    }
  }
  return max_value;
}


/* eslint-enable no-unused-vars */
