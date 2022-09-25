let listElements = document.querySelectorAll('.cuenta');

listElements.forEach(listElement => {

    listElement.addEventListener('click', () => {
        
        listElement.classList.toggle('cuenta-transferencia');

    })

})

