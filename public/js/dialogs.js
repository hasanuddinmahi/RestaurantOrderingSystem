Anmo.setBreakPoints({ mobile: 450, tablet: 850 });
Anmo.setMainContainer("#checkout-body");

Anmo.initApp(class Popup extends Anmo.AbstractView {
    constructor() {
        super();
        this.cardFeild = Anmo.AbstractView.generateID();
        this.cvvFeild = Anmo.AbstractView.generateID();
        this.expFeild = Anmo.AbstractView.generateID();
    }

    displayPopup() {
        let popupInc = new Anmo.Utils.PopupIncubator();
        const popup = Anmo.BuildElement({
            tag: 'div',
            style: {
                'background-color': 'white',
                'width': '33%',
                'height': '33%',
                'display': 'flex',
                'flex-direction': 'column',
                'justify-content': 'center',
                'align-items': 'center',
                'background-color': 'white',
                'min-width': '500px',
                'min-height': '300px',
                'border-radius': '15px',
            },
            content: [
                Anmo.BuildElement({
                    tag: 'h1',
                    style: {
                        'margin-top': "10px",
                        'margin-bottom': '20px',
                        'font-size': '20px'
                    },
                    content: 'Credit/Debt'
                }),
                Anmo.BuildElement({
                    tag: 'input',
                    id: this.cardFeild,
                    attributes: [
                        {attribute: 'placeholder', value: 'Card Number'},
                        {attribute: 'type', value: 'number'},
                    ],
                    style: {
                        'margin-top': "10px",
                        border: '2px solid black',
                        'padding-left': '10px',
                        'border-radius': '15px',
                        'width': '80%',
                        'margin-bottom': '20px',
                        'font-size': '20px'
                    },
                }),
                Anmo.BuildElement({	
                    tag: 'div',
                    style: {
                        'display': 'flex',
                        'width': '80%',
                        'justify-content': 'space-between',
                        'gap': '10px',
                    },
                    content: [
                        Anmo.BuildElement({
                            tag: 'input',
                            id: this.cvvFeild,
                            attributes: [
                                {attribute: 'placeholder', value: 'CVV'},
                                {attribute: 'type', value: 'number'},
                            ],
                            style: {
                                'margin-top': "10px",
                                border: '2px solid black',
                                'padding-left': '10px',
                                'border-radius': '15px',
                                'width': '80%',
                                'margin-bottom': '20px',
                                'font-size': '20px'
                            },
                        }),
                        Anmo.BuildElement({
                            tag: 'input',
                            id:  this.expFeild,
                            attributes: [
                                {attribute: 'placeholder', value: 'Exp. Date'},
                                {attribute: 'type', value: 'date'},
                            ],
                            style: {
                                'margin-top': "10px",
                                border: '2px solid black',
                                'padding-left': '10px',
                                'border-radius': '15px',
                                'width': '80%',
                                'margin-bottom': '20px',
                                'font-size': '20px'
                            },
                        }),
                    ],	
                }),
                Anmo.BuildElement({	
                    tag: 'input',
                    onTap: () => {
                        const cvv = document.getElementById(this.cvvFeild).value.trim() === '' ? false : true;
                        const card = document.getElementById(this.cardFeild).value.trim() === '' ? false : true;
                        const exp = document.getElementById(this.expFeild).value.trim() === '' ? false : true;

                        if(cvv && card && exp){
                            popupInc.hidePopup();
                            document.getElementById("checkoutform").submit();
                        }
                    },
                    attributes: [
                        {attribute: 'type', value: 'button'},
                        {attribute: 'value', value: 'Pay'}
                    ],
                    style: {
                        'background-color': 'rgb(0, 152, 33)',
                        'width': '40%',
                        'height': '50px',
                        'border-radius': '10px',
                        'border': 'none',
                        'color': 'white',
                        'font-size': '1.5em',
                        'font-weight': 'bold',
                    },
                    content: "Pay",	
                })
            ]
        });

        popupInc.displayPopup(popup);
    }


    displayCashPopup() {
        let popupInc = new Anmo.Utils.PopupIncubator();
        const popup = Anmo.BuildElement({
            tag: 'div',
            style: {
                'background-color': 'white',
                'width': '33%',
                'height': '33%',
                'display': 'flex',
                'flex-direction': 'column',
                'justify-content': 'center',
                'align-items': 'center',
                'background-color': 'white',
                'min-width': '500px',
                'min-height': '300px',
                'border-radius': '15px',
            },
            content: [
                Anmo.BuildElement({
                    tag: 'h1',
                    style: {
                        'margin-top': "10px",
                        'margin-bottom': '10px',
                        'font-size': '20px'
                    },
                    content: 'Cash On Delivery'
                }),
                Anmo.BuildElement({
                    tag: 'p',
                    style: {
                        'margin-top': "10px",
                        'margin-bottom': '20px',
                        'font-size': '16px'
                    },
                    content: 'Please pay the driver when he arrives.'
                }),
                Anmo.BuildElement({	
                    tag: 'input',
                    onTap: () => {
                        popupInc.hidePopup();
                        document.getElementById("checkoutform").submit();
                    },
                    attributes: [
                        {attribute: 'type', value: 'submit'},
                        {attribute: 'value', value: 'Proceed'}
                    ],
                    style: {
                        'background-color': 'rgb(0, 152, 33)',
                        'width': '40%',
                        'height': '50px',
                        'border-radius': '10px',
                        'border': 'none',
                        'color': 'white',
                        'font-size': '1.5em',
                        'font-weight': 'bold',
                    },
                })
            ]
        });

        popupInc.displayPopup(popup);
    }

    radioButtons(label) {
        return Anmo.BuildElement({
            tag: 'div',
            style: {
                'background-color': 'rgb(143, 216, 148)',
                'width': '80%',
                'height': '30px',
                'border-radius': '10px',
                'border': 'none',
                'color': 'black',
                'font-size': '1.25em',
                'padding': '10px',
                'font-weight': 'bold',
                'display': 'flex',
                'gap': '10px',
                'align-items': 'center',
                margin: '10px 35px',
            },
            content: [
                Anmo.BuildElement({
                    tag: 'label',
                    content: [
                        Anmo.BuildElement({
                            tag: 'input',
                            attributes: [
                                {attribute: 'type', value: 'radio'},
                                {attribute: 'name', value: 'order_payment'},
                                {attribute: 'value', value: label},
                            ],
                        }),
                        Anmo.BuildElement({
                            tag: 'span',
                            style: {
                                'font-size': '0.75em',
                                'color': 'white',
                            },
                            content: label,
                        }),
                    ],
                })
            ]
        });
    }

    getComponentHTML() {
        try {
            return Anmo.BuildElement({	
                tag: 'div',
                content: [
                    this.radioButtons('Credit/Debit'),
                    this.radioButtons('Cash'),
                    Anmo.BuildElement({	
                        tag: 'button',
                        onTap: () => {
                            let radioButtons = document.querySelectorAll('#checkout-body input[type=radio]');
                            radioButtons.forEach((radioButton) => {
                                if (radioButton.checked) {
                                    if (radioButton.value === 'Credit/Debit') {
                                        this.displayPopup();
                                    } else if (radioButton.value === 'Cash') {
                                        this.displayCashPopup();
                                    }
                                }
                            });
                        },
                        attributes: [
                            {attribute: 'type', value: 'button'}
                        ],
                        style: {
                            'background-color': 'rgb(0, 152, 33)',
                            'width': '80%',
                            'height': '50px',
                            'border-radius': '10px',
                            'border': 'none',
                            'color': 'white',
                            'font-size': '1.5em',
                            'font-weight': 'bold',
                            'margin': '0 35px'
                        },
                        content: "Pay",	
                    })
                ]	
            })
        } catch (error) {
            return this.componentError(error);
        }
    }
}); 