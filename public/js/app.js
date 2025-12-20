document.querySelectorAll('.btn-delete').forEach(function(button) {
    button.addEventListener('click', function(event) {
        event.preventDefault()
        if(confirm("Are you sure you want to delete this record?")) {
            let action = this.getAttribute("href")
            let form = document.getElementById("delete-form")
            form.setAttribute("action", action)
            form.submit()
        }
    })
})