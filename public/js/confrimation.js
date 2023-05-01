Anmo.setBreakPoints({ mobile: 450, tablet: 850 });
Anmo.setMainContainer("#confrim_container");

Anmo.initApp(class Popup extends Anmo.AbstractView {
    constructor() {
        super();
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
                    content: 'Confrimation'
                }),
                Anmo.BuildElement({
                    tag: 'p',
                    style: {
                        'margin-top': "10px",
                        'margin-bottom': '20px',
                        'font-size': '14px'
                    },
                    content: 'this is Confrimation'
                }),
                Anmo.BuildElement({	
                    tag: 'a',
                    onTap: () => {
                        popupInc.hidePopup();
                    },
                    attributes: [
                        {attribute: 'type', value: 'submit'},
                        {attribute: 'value', value: 'Pay'},
                        {attribute: 'href', value: 'http://localhost/core/order-confrimation.php?token=' + RiderToken + '&orderID=' + OrderID}
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
                    content: "Home",	
                })
            ]
        });

        popupInc.displayPopup(popup);
    }

    getComponentHTML() {
        try {
            return Anmo.BuildElement({	
                tag: 'div',
                content: [
                    Anmo.BuildElement({	
                        tag: 'button',
                        onTap: () => {
                            this.displayPopup();
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
                        content: "Confrim",	
                    })
                ]	
            })
        } catch (error) {
            return this.componentError(error);
        }
    }
}); 