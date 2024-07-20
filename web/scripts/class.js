    // JavaScript code to handle the click event on table rows with classes
    const tableRows = document.querySelectorAll('table tr');
    const cardNumbers = document.querySelectorAll('.cardBox .numbers');
    const specificValues = {
        "1": [
            { name: 'Pertes humaines', value: '230,000' },
            { name: 'Date', value: '26 décembre 2004' },
            { name: 'échelle', value: '9.1' },
            { name: 'perte économiques ', value: '125$B' }
        ],
        "2": [
            { name: 'Pertes humaines', value: '200,000' },
            { name: 'Date', value: '12 janvier 2010' },
            { name: 'échelle', value: '7.0' },
            { name: 'perte économiques ', value: '82$B' }
            // Define values for class "2" if needed
        ],
        "3": [
            { name: 'Pertes humaines', value: '500,000' },
            { name: 'Date', value: '12 novembre 1970' },
            { name: 'échelle', value: 'Catégorie 5' },
            { name: 'perte économiques ', value: 'N/A$B' }
        ],
        "4": [
            { name: 'Pertes humaines', value: '177,000' },
            { name: 'Date', value: '26 décembre 2010' },
            { name: 'échelle', value: '9.0' },
            { name: 'perte économiques ', value: '32$B' }
        ],
        "5": [
            { name: 'Pertes humaines', value: '15,000' },
            { name: 'Date', value: '11 mars 2011' },
            { name: 'échelle', value: '9.0' },
            { name: 'perte économiques ', value: '210$B' }
        ],
        "6": [
            { name: 'Pertes humaines', value: '1,800' },
            { name: 'Date', value: '29 août 2005' },
            { name: 'échelle', value: 'Catégorie 5' },
            { name: 'perte économiques ', value: '14$B' }
        ],
        "7": [
            { name: 'Pertes humaines', value: '138,000' },
            { name: 'Date', value: '2 mai 2008	' },
            { name: 'échelle', value: 'Catégorie 4' },
            { name: 'perte économiques ', value: '14$B' }
        ],
        "8": [
            { name: 'Pertes humaines', value: '17,000' },
            { name: 'Date', value: '17 août 1999' },
            { name: 'échelle', value: '7.6' },
            { name: 'perte économiques ', value: '30$B' }
        ]
                
        

        // Add more classes and their respective values as needed
    };

    tableRows.forEach((row, index) => {
        row.addEventListener('click', () => {
            const rowClass = row.getAttribute('class');
            if (rowClass && specificValues[rowClass]) {
                specificValues[rowClass].forEach((value, i) => {
                    cardNumbers[i].textContent = value.value;
                });
            } else {
                // Generate random numbers for other rows
                cardNumbers.forEach(cardNumber => {
                    cardNumber.textContent = Math.floor(Math.random() * 1000) + 1;
                });
            }
        });
    });