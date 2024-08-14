document.addEventListener('DOMContentLoaded', function () {
    // コントローラーから渡されたデータを JavaScript 変数に格納
    var timeSlotsElement = document.getElementById('time-slots-data');
    var timeSlots = JSON.parse(timeSlotsElement.getAttribute('data-time-slots'));

    console.log(timeSlots);

    // 時間帯のラベルと人数の配列を作成
    var categories = Object.keys(timeSlots); // 時間帯のラベル
    var seriesData = Object.values(timeSlots); // 各時間帯の人数データ

    // num_ticketsの合計を取得
    var totalTickets = seriesData.reduce((sum, value) => sum + value, 0);

    // ApexCharts のオプション設定
    var options = {
        series: [{
            name: 'Number of Tickets',
            data: seriesData
        }],
        chart: {
            height: 350,
            type: 'bar',
            toolbar: {
                show: false
            },
            width: '100%', // 幅を親要素に合わせる
            offsetX: 0, // X方向のオフセット
            offsetY: 0
        },
        plotOptions: {
            bar: {
                borderRadius: 0,
                dataLabels: {
                    position: 'top'
                },
                colors: {
                    ranges: [{
                        from: 0,
                        to: 100,
                        color: '#0C2C04'
                    }]
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'light',
                type: "vertical",
                shadeIntensity: 0.5,
                gradientToColors: ["#84947C"],
                inverseColors: false,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                if (totalTickets === 0) {
                    return "0%"; // totalTicketsが0の場合は0%と表示
                }
                var percentage = (val / totalTickets) * 100;
                return percentage.toFixed(1) + "%"; // パーセンテージ表示
            },
            offsetY: -20,
            style: {
                fontSize: '14px',
                colors: ["#0C2C04"],
                fontWeight: 'bold'
            }
        },
        xaxis: {
            categories: categories,
            position: 'bottom',
            axisBorder: {
                show: true, // スライダーの下部にラインを表示する
                color: '#dcdcdc' // ラインの色を指定する
            },
            axisTicks: {
                show: true, // スライダーの下部の目盛りを表示する
                color: '#dcdcdc' // 目盛りの色を指定する
            },
            title: {
                text: 'Time', // 横軸表示単位ラベル
                style: {
                    fontSize: '14px',
                    color: '#444'
                }
            },
            tooltip: {
                enabled: true,
            }
        },
        yaxis: {
            axisBorder: {
                show: true, // 縦軸の左側にラインを表示する
                color: '#dcdcdc' // ラインの色を指定する
            },
            axisTicks: {
                show: true, // 縦軸の目盛りを表示する
                color: '#dcdcdc' // 目盛りの色を指定する
            },
            labels: {
                formatter: function (val) {
                    if (val % 1 !== 0) {
                        return ' ';  // 小数点以下がある場合はスペースを返す
                    }
                    return val;
                },
                style: {
                    fontSize: '12px',
                },
                minWidth: 50, 
                maxWidth: 50
            },
            title: {
                text: 'Number of Tickets', // 縦軸表示単位ラベル
                style: {
                    fontSize: '14px',
                    color: '#444',
                    offsetX: 0,
                    offsetY: 0

                }
            },
            tickAmount: 5
        },
        title: {
            text: '',
            floating: false,
            offsetY: 400,
            align: 'center',
            style: {
                color: '#444'
            }
        }
    };

    // グラフを描画
    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
});

