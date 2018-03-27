$(function() {
    var start = moment().subtract(1, 'days');
    var end = moment();
    $('.lds-ellipsis').show();
    $('body').addClass('hasLoader');
    $('input[name="daterange"]').daterangepicker(
        {
            startDate: start,
            endDate: end,
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        },load_ajax 
    );
    load_ajax(start,end);
})
function load_ajax(start,end){
    $('.lds-ellipsis').show();
    $('body').addClass('hasLoader');
    var start = start.format('YYYY-MM-DD');
    var end = end.format('YYYY-MM-DD');
    $.ajax({
        url:  SITE_URL+'/analytics', 
        type: "POST",             
        data: {'start':start,'end':end},   
        success: function(data) {
            $('.lds-ellipsis').hide();
            $('body').removeClass('hasLoader');
            html = '';
            data.analyticsData.map(function(item,index){

                html+=`
                    <tr>
                        <td>`+item.date.date+`</td>
                        <td>`+item.pageTitle+`</td>
                        <td>`+item.visitors+`</td>
                        <td>`+item.pageViews+`</td>
                    </tr>
                `;
            })
            if(data.analyticsData.length == 0){
            	html = `
            		<tr>
            			<td colspan="4">No data available for the selected date</td>
            		</tr>
            	`;
            }
            $('#analytics').html(html);
        },
        error:function(xhr){
            $('.lds-ellipsis').hide();
            $('body').removeClass('hasLoader');
            console.log(xhr.responseText);
        }
    });
}