jQuery(document).ready(($) => {
    const myChart = {};
    setChart('.chart-wrap .chart-data-json', 'chart', 'chart-legend', ' %');
    setChart('.chart-wrap .chart-data-json2', 'chart2', 'chart-legend2', ' %');

    function setChart(jsonEl, canvasID, legendId, sym) {
        if ($(jsonEl).length) {
            let dataJson = $(jsonEl).html().trim();
            let dataObj = JSON.parse(dataJson);
            const chartWrap = $(jsonEl).closest('.chart-wrap');

            $(jsonEl).remove();

            const labels = [];
            const values = [];
            const colors = [];
            const bColors = [];
            if (dataObj.labels) {
                dataObj.labels.forEach((el, i) => {
                    console.log(dataObj.all);
                    let percent = el.value.toFixed(2);
                    labels.push(el.name);
                    values.push(percent);
                    colors.push(el.color);
                });

                const ctx = document.getElementById(canvasID).getContext('2d');
                myChart[canvasID] = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Портфель',
                            data: values,
                            backgroundColor: colors,
                            hoverBackgroundColor: colors,
                            borderColor: 'rgba(245,245,245,1)',
                            hoverBorderColor: 'rgba(245,245,245,1)',
                            borderWidth: 3,
                        }]
                    },
                    options: {
                        cutoutPercentage: 90,
                        legend: {
                            display: false
                        },
                        legendCallback: (chart) => {
                            console.log(chart.data);
                            let itemsHtml = '';
                            chart.data.labels.forEach((label, i) => {
                                const dataSets = chart.data.datasets[0];


                                const templateString = `
                        <li class="chart-legend_item" data-tip-index="${i}" data-value="${dataSets.data[i]}">
                            <span class="chart-legend_item-rect"
                                style="
                                background-color: ${dataSets.backgroundColor[i]};
                                border: 1px solid ${dataSets.borderColor[i]};
                                "></span>
                            <span class="chart-legend_item-title">${label}</span>
                        </li>
                        `;
                                itemsHtml += templateString;
                            });

                            setTimeout(() => {
                                const target = $(`#${legendId} .chart-legend_item`).eq(0);
                                const value = target.data('value');
                                const tipIndex = target.data('tip-index');
                                target.addClass('active').siblings().removeClass('active');
                                chartWrap.find('.chart-value-display .val').text(numberWithCommas(value) + sym);
                            }, 300);


                            return `<ul class="chart-legend">${itemsHtml}</ul>`;
                        },
                        onHover: (evt) => {
                            const item = myChart[canvasID].getElementAtEvent(evt);
                            console.log(item);
                            if (item.length) {
                                const index = item[0]._index;
                                const value = $(`#${legendId} .chart-legend_item[data-tip-index="${index}"]`).data('value');

                                $(`#${legendId} .chart-legend_item[data-tip-index="${index}"]`).addClass('active').siblings().removeClass('active');
                                chartWrap.find('.chart-value-display .val').text(numberWithCommas(value) + sym);
                            }
                        }
                    }
                });

                document.getElementById(legendId).innerHTML = myChart[canvasID].generateLegend();
                console.log(myChart[canvasID]);

                $(document).on('mouseenter', `#${legendId} .chart-legend_item`, (e) => {
                    const value = $(e.currentTarget).data('value');
                    const tipIndex = $(e.currentTarget).data('tip-index');

                    openTip(myChart[canvasID], tipIndex);
                    $(e.currentTarget).addClass('active').siblings().removeClass('active');
                    chartWrap.find('.chart-value-display .val').text(numberWithCommas(value) + sym);
                });

                $(document).on('mouseleave', `#${legendId} .chart-legend_item`, (e) => {
                    const value = $(e.currentTarget).data('value');
                    const tipIndex = $(e.currentTarget).data('tip-index');

                    closeTip(myChart[canvasID], tipIndex);
                    $('.chart-legend_item').removeClass('active');
                    chartWrap.find('.chart-value-display .val').text('');
                });
            }
        }
    }

    function numberWithCommas(x) {
        const parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        return parts.join(",");
    }

    function openTip(chart, datasetIndex) {
        const index = datasetIndex;
        const activeSegment = chart.getDatasetMeta(0).data[index];
        activeSegment._model.backgroundColor = activeSegment._options.hoverBackgroundColor;
        // activeSegment._model.borderWidth = activeSegment._options.hoverBorderWidth;
        chart.tooltip._active = [activeSegment];
        chart.tooltip.update();
        chart.draw();
    }

    function closeTip(chart, datasetIndex) {
        const index = datasetIndex;
        const activeSegment = chart.getDatasetMeta(0).data[index];
        activeSegment._model.backgroundColor = activeSegment._options.backgroundColor;
        activeSegment._model.borderWidth = activeSegment._options.borderWidth;
        chart.tooltip._active = [];
        chart.tooltip.update();
        chart.draw();
    }

    $(document).on('click', '.profile_top-nav [data-link], .profile-burger-nav [data-link], .user-nav [data-link], .user-controlls [data-link]', (e) => {
        const page = $(e.currentTarget).data('link');
        e.preventDefault();
        window.loadProfilePage(page);
        $('.profile_aside .section-title.bb.mobile').addClass('closed');
        if ($('.profile_aside .section-title.bb').hasClass('mobile')) {
            $('.profile_aside-content').slideUp();
        }

    });

    $('.profile_aside .section-title.bb.mobile').on('click', (e) => {
        e.preventDefault();
        if ($(e.currentTarget).hasClass('closed')) {
            $(e.currentTarget).removeClass('closed');
        } else {
            $(e.currentTarget).addClass('closed');
        }
        $('.profile_aside-content').slideToggle();
    });

    $(document).on('click', '.chart-tabs [data-tab]', (e) => {
        e.preventDefault();
        const tabName = $(e.currentTarget).data('tab');
        $(`[data-tab-content="${tabName}"], [data-tab="${tabName}"]`).addClass('active').siblings('').removeClass('active');
    });
});