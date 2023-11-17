document.addEventListener("DOMContentLoaded", function(event) {
    let btnUpdate = document.querySelector('.btn__update')
    btnUpdate.addEventListener('click', (event) => {
        event.preventDefault();
        let spinnerContainer = document.querySelector('.circle-container');
        spinnerContainer.classList.add('active');
        fetch("/api/products", {
            method: "POST",
            headers: {
                "Content-type": "application/json; charset=UTF-8"
            }
        })
            .then((response) => response.json())
            .then((json) => {
                spinnerContainer.classList.remove('active');
                alert(json.info);
                location.reload();
            })
            .catch((error) => {
                spinnerContainer.classList.remove('active');
                console.log(error);
             })

    })
});
