function sendEmail() {
    var form = document.getElementById('email');
    const datos = new FormData(form);
    var url = form.getAttribute('data-url');

    fetch(url, {
        method: "POST",
        body: datos,
    })
        .then(function (response) {
            // console.log(response.json());
            return response.json();

        })
        .then(function (data) {
            for(let dat in data){
                console.log(data[dat][0]['error']);
                console.log(data[dat][0]['msm']);
            }
            
            // alert(data.error);
        })
        .catch(function (error) {
            console.log(error);
        });
}