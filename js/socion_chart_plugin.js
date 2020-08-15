/**
 * @file
 * Contains js for chartjs plugins.
 */

/* eslint-disable no-unused-vars */

var socion_chart_plugin = {
  afterInit: function (chart) {
    var aspect_inputs = jQuery('[id^="aspect-"]');

    console.log(aspect_inputs);
    aspect_inputs.each(function( index ) {
      jQuery( this ).change(function() {
        var aspect_id = jQuery( this ).attr('id').substr(-1,1);
        var input_value = jQuery(this).find("input").val();
        chart.data.datasets.forEach((dataset) => {
          dataset.data[aspect_id] = 100;
        });
        chart.update();
      });
    });




  }
};

/* eslint-enable no-unused-vars */
