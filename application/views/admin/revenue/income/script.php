<script>
$(document).ready(function() {

    var ctx = $('#line-profit');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                    label: 'กำไรรวม',
                    data: [],
                    backgroundColor: '#17a2b8',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    stack: 'Stack 0',
                },
                {
                    label: 'รายได้รวม',
                    data: [],
                    backgroundColor: '#ffc107',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    stack: 'Stack 0',
                },
            ]
        },
        options: {
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            responsive: true,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true,
                }]
            }
        }
    });

    init();

    function init() {
        var d = new Date();
        var y = d.getFullYear();
        var m = null; // d.getMonth() + 1;

        setMonth(m);
        setYear(y);
        getProfitData(m, y);
    }

    function getProfitData(m, y) {
        $.post(base_url + "api/profit/getProfit", {
            'month': m,
            'year': y
        }, function(res, textStatus, jqXHR) {
            let profit = res.data.profit;
            if (profit) {
                $('#txt-number').html(profit.number);
                $('#txt-price').html(currency(profit.price, {
                    precision: 0
                }).format());
                $('#txt-profit').html(currency(profit.profit, {
                    precision: 0
                }).format());
                $('#txt-profit-percent').html(currency((profit.profit * 100 / profit.price), {
                    precision: 2
                }).format());
            } else {
                $('#txt-number').html(0);
                $('#txt-price').html(currency(0, {
                    precision: 0
                }).format());
                $('#txt-profit').html(currency(0, {
                    precision: 0
                }).format());
            }

            updateChart(res.data.income_data, res.data.profit_data);
        });
    }

    function setMonth(m) {
        $.each(months, function(i, v) {
            $('#month').append('<option value="' + (i + 1) + '">' + v + '</option>');
        });
        $('#month').val(m);
    }

    function setYear(y) {
        var startYear = 2019;
        var endYear = y;
        for (let i = startYear; i <= endYear; i++) {
            $('#year').append('<option value="' + i + '">' + (i + 543) + '</option>');
        }
        $('#year').val(y);
    }

    $('#search').click(function(e) {
        e.preventDefault();
        var month = $('#month').val();
        var year = $('#year').val();
        getProfitData(month, year);
    });

    function updateChart(price_data, profit_data) {
        chart.data.datasets[0].data = profit_data;
        chart.data.datasets[1].data = price_data;
        chart.update();
    }


});
</script>

</body>

</html>