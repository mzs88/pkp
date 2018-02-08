$(document).ready(function($) {
    var url = base_url+"/ukes/inukes/getRkpUkesA";
    var data = "";
    $.getJSON(url,{format:'json'}).done(function(result){
        data = result;
        //console.table(data);
        Morris.Line({
        element: 'morris-bar-chart',
        data: result,
        // data: [{
        //     y: '2006',
        //     a: 100
        // }, {
        //     y: '2007',
        //     a: 75
        // }, {
        //     y: '2008',
        //     a: 50
        // }, {
        //     y: '2009',
        //     a: 75
        // }, {
        //     y: '2010',
        //     a: 50
        // }, {
        //     y: '2011',
        //     a: 75
        // }, {
        //     y: '2012',
        //     a: 100
        // }],
        xkey: 'ukes_a',
        ykeys: ['bln'],
        labels:['ukes_a'],
        hideHover: 'auto',
        resize: true
    });
    })

    console.log('Data : '+data);




});

