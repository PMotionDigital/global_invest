jQuery(document).ready(function ($) {
    if ($('body').hasClass('single-otc_ipo')) {

        const jsonUrl = `${window.location.origin}/wp-json/acf/v3/otc_ipo`;
        const section = document.querySelector('[data-post-id]');
        const postId = section.dataset.postId;
        const labels = [];
        const tooltips = [];
        let chartData = [];
        const ctx = document.getElementById('offer-chart').getContext('2d');
        const data = [];
        const cfg = {
            type: 'line',
            options: {
                showLine: false,
                legend: {
                    display: false
                },
                tooltips: {

                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function (tooltipItem, data) {

                            console.log(tooltipItem);
                            const tooltip = tooltips[tooltipItem.index];

                            let label = `Раунд: ${tooltip.raund} <br> Цена за акцию: ${tooltip.price}`;
                            return label;
                        }
                    },
                    enabled: false,

                    custom: function (tooltip) {
                        $(this._chart.canvas).css('cursor', 'pointer');

                        let positionY = this._chart.canvas.offsetTop;
                        let positionX = this._chart.canvas.offsetLeft;

                        $('.chartjs-tooltip').css({
                            opacity: 0,
                        });

                        if (!tooltip || !tooltip.opacity) {
                            return;
                        }

                        if (tooltip.dataPoints.length > 0) {
                            tooltip.dataPoints.forEach(function (dataPoint) {
                                let content = `${tooltips[dataPoint.index].price} / акция`;
                                let $tooltip = $('#tooltip-' + dataPoint.datasetIndex);
                                $('.graphik-content--comment .comment-block').eq(dataPoint.index).addClass('active').siblings().removeClass('active');
                                console.log(dataPoint);
                                $tooltip.html(content);
                                $tooltip.css({
                                    opacity: 1,
                                    top: positionY + dataPoint.y + 'px',
                                    left: positionX + dataPoint.x + 'px',
                                });
                            });
                        }


                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }],
                    yAxes: [{

                        gridLines: {
                            color: "#D3D3D3",
                        },
                        id: 'y-axis-1',
                        display: true,
                        position: 'left',
                        ticks: {
                            callback: function (value, index, values) {
                                let newValue = value;
                                let sym = '';
                                if (value / 1000000000 >= 1) {
                                    sym = 'B';
                                    newValue = value / 1000000000;
                                } else if (value / 1000000 >= 1) {
                                    sym = 'M';
                                    newValue = value / 1000000;
                                } else if (value / 1000 >= 1) {
                                    sym = 'K';
                                    newValue = value / 1000;
                                }
                                newValue = `$ ${newValue.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ").replace('.',',')} ${sym}`;
                                return newValue;
                            }
                        }

                    }]
                },

            },
            data: {
                labels: labels,
                datasets: [{
                    label: 'Отображение',
                    data: data,
                    showLine: true,
                    fill: true,
                    backgroundColor: 'rgba(225,4,4,0.2)',
                    borderColor: '#E10404',
                    lineTension: 0,

                    scales: {
                        y: {
                            stacked: false
                        },
                    },


                }]
            },
        };
        $.ajax({
            url: jsonUrl,
            method: 'GET',
            beforeSend: () => {
                //
            },
            success: (response) => {
                response.forEach((item) => {
                    if (item.id == postId) {
                        item.acf['dinamika_czen'].forEach((val) => {
                            data.push({
                                x: val.data,
                                y: val.czena
                            });
                            tooltips.push({
                                raund: val.raund,
                                price: val.czena_za_akcziyu
                            });
                            labels.push(val.data);
                            console.log(response);
                        })
                    }
                })
                const myChart = new Chart(ctx, cfg);

            }
        });

    };
});