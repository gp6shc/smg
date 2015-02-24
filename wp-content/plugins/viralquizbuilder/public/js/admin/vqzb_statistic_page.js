jQuery(document).ready(function(){
    
    var data = [];
    jQuery.each(graph_data, function(i, item) {
	data[i] = new Array(parseFloat(graph_data[i].date),parseFloat(graph_data[i].number));
    });

    // create bar graph
    jQuery.plot(jQuery("#vqzb_diagram"), [
        {
            data: data,
            bars: { 
		show: true,
		barWidth : 24*60*60*1000,
		align: "center",
		fill: true,
		fillColor: {colors: [ {opacity: 0.8}, {opacity: 0.1} ]}
	    }
        }], 
	{
	    xaxis: {
		mode: "time",
		timeformat: "%y/%m/%d"
	    },
	    yaxis: {
		min : 0
	    }
	}
    );
    
});
