
const form = document.querySelector('[data-form-calc]');
if(form) {
    const sumInput = form.querySelector('input[data-input-name="sum"]');
    const dateInput = form.querySelector('input[data-input-name="date"]');
    const selectInput = form.querySelector('select');
    const categoryInputs = form.querySelectorAll('option[data-month]');
    const buttonSubmit = form.querySelector('button[type="button"]');
    const messages = document.querySelectorAll('.error-message');
    const inputs = document.querySelectorAll('input[type="number"]');
    const formGroupHide = jQuery('.form-group__hide');

    let result;
    let coefficient;
    let period;

    let categories = [
        {
            name: 'portfolio',
            sum: 50000,
            coef: 0.21,
            date: 6
        },
        {
            name: 'strategy',
            sum: 50000,
            coef: 0.075,
            date: 12
        },
        {
            name: 'ipo',
            sum: 50000,
            coef: 0.06,
            date: 2
        },
        {
            name: 'otc',
            sum: 100000,
            coef: 0.8,
            date: 24
        },
        {
            name: 'invest',
            sum: 100000,
            coef: 1.4,
            date: 36
        }
    ]

    document.querySelector('.sum').style.pointerEvents = 'none';
    document.querySelector('.date').style.pointerEvents = 'none';

    let calculateResult = function(){
        result = sumInput.value * coefficient / period * dateInput.value;
    }

    let cleaner = function(){
        for (var i = 0; i < inputs.length; i++){
            var input = inputs[i];
            var message = inputs[i];

            input.value = '';
            message.innerHTML = '';
            input.style.borderColor = '#d9dde5';
            buttonSubmit.innerHTML = 'Расчитать доход';
        }
    }

    let checkMessage = function(){
        for(var j =0; j < messages.length; j++){
            let message = messages[j];

            if (message.innerHTML === ''){
                calculateResult();
                buttonSubmit.innerHTML = 'Ваш возможный доход: ' + Math.round(result) + '$';
                console.log('true');
            }

        }
    }

    let validate = function(){
        for (let i = 0; i < inputs.length; i++){
            let input = inputs[i];
            let message = messages[i];
            input.addEventListener('input', function(){
                if (Number(input.value) < Number(input.getAttribute('min'))){
                    input.style.borderBottom = "2px solid red";
                    message.innerHTML = "Минимальное значение - " + input.getAttribute('min');
                } else {
                    input.style.borderBottom = "2px solid green";
                    message.innerHTML = '';
                }
            })
        }
    }


    selectInput.addEventListener('change', function() {
        cleaner();
        for (let i = 0; i < categories.length; i++){
            let category = categories[i];
            
            if (selectInput.value === category.name){
                dateInput.setAttribute('min', category.date);
                dateInput.setAttribute('placeholder', 'от ' + category.date + ' месяцев');
                sumInput.setAttribute('min', category.sum);
                sumInput.setAttribute('placeholder', 'от ' + category.sum + ' €');
                coefficient = category.coef;
                period = 12;

                for (let j = 0; j < categoryInputs.length; j++){
                    let input = categoryInputs[j];
                    if (selectInput.value === input.getAttribute('data-month')){
                        dateInput.setAttribute('placeholder', 'от ' + category.date + ' дней');
                        period = 30;
                    }
                }
            }
        }
        document.querySelector('.sum').style.pointerEvents = 'auto';
        document.querySelector('.date').style.pointerEvents = 'auto';
        formGroupHide.show();
        console.log(formGroupHide);
        validate();
    })

    buttonSubmit.addEventListener('click', function(evt){
        evt.preventDefault();
        checkMessage();
    })
};