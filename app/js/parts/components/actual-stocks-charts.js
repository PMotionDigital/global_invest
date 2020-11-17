jQuery(document).ready(($) => {

    
    let inView = false;
    let sendRequest = false;

    // if data exist in local storage
    let storageData = localStorage.getItem('data');
    let parseData = JSON.parse(`${storageData}`);

    // if (parseData) {
    //     for (i in parseData) {
    //         if (parseData[i]) {
    //             insertData(parseData[i]);
    //             setData(parseData[i]);
    //         }
    //     }
    // }

    // check if position in view port
    checkPosition();

    $(window).bind('scroll', () => {
        checkPosition();
    });

    // timer on request
    let delay = 50;
    let sendDelay = 5000;

    let timerId = setTimeout(function request() {
        if (sendRequest) {
            sendRequest = false;
            delay = 50;
        }
        if (inView && !sendRequest) {
            sendAjax();
            delay = sendDelay;
        };
        // console.log(`
        //     sendAjax: ${sendRequest}
        //     in view: ${inView}
        //     delay: ${delay}
        // `);
        timerId = setTimeout(request, delay);
    }, delay);
//----------------------------------------------
//   __                  _   _                 
//  / _|                | | (_)                
// | |_ _   _ _ __   ___| |_ _  ___  _ __  ___ 
// |  _| | | | '_ \ / __| __| |/ _ \| '_ \/ __|
// | | | |_| | | | | (__| |_| | (_) | | | \__ \
// |_|  \__,_|_| |_|\___|\__|_|\___/|_| |_|___/
//
//-----------------------------------------------
    function setSym(num) {
        let newNum = ''
        num < 0 ? newNum = `-${Math.abs(num)}` : newNum = `+${num}`;
        return newNum;
    }

    function numberWithCommas(x) {
        const parts = x.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        return parts.join(",");
    }

    function insertData(el, sym) {
        const item = $(`.home-stocks__item[data-name="${sym}"]`);
        if (el && item && item.length) {
            //console.log(el.c - el.pc);
            const change = (el.c - el.pc).toFixed(2);
            const changeP = (change / el.o * 100).toFixed(2);
            const className = change < 0 ? 'negative' : '';
            item.find('.home-stocks__total').text(numberWithCommas(el.c.toFixed(2)));
            item.find('.home-stocks__diff').html(`
        <span class="${className}">${setSym(change)}$</span>
        <span class="${className}">${setSym(changeP)}%</span>`);
        }
    }

    function setData(el, sym) {
        const price = numberWithCommas(el.c.toFixed(2));
        const change = (el.c - el.pc).toFixed(2);
        const changeP = (change / el.o * 100).toFixed(2);
        const className = change < 0 ? 'negative' : '';

        const stocksItem = $(`#stocks .stocks-item[data-name="${sym}"]`);
        stocksItem.find('.stocks-item__price.current').html(`
        <span>текущая цена</span><span>${numberWithCommas(price)}$</span>
        `);
        stocksItem.find('.stocks-item__price.day').html(`
        <span>дневное изменение</span><span class="${className}">${setSym(changeP)}%</span>
        `);
    }

    function sendAjax() {
        sendRequest = true;
        const settings = {
            url: `${window.location.origin}/wp-admin/admin-ajax.php`,
            method: 'GET',
            cache: false,
            data: {
                action: 'get_stock_info'
            }
        };

        $.ajax(settings).done((response) => {
            const resp = JSON.parse(response);
            for(const symName in resp) {
                //console.log(`${symName} request ok, bruh ;)`);
                insertData(JSON.parse(resp[symName]), symName);
                setData(JSON.parse(resp[symName]), symName);
            }
            
        });
    }

    function checkPosition() {
        const homeS = $('.home-stocks');
        const itemS = $('#stocks');
        const elems = [homeS, itemS];
        const checkArray = [];

        elems.forEach((el) => {
            if(el.length){
                const rect = el[0].getBoundingClientRect();
                const { y, height } = rect;
                checkArray.push(y > 0 && y < window.innerHeight - height);
            }
        });

        const check = checkArray.find((i) => i == true) || false;
        inView = check;
    }

});