const loc = document.getElementById('tbl_loc')
const header = document.getElementById('header')

fetch('http://localhost:8080/developers/', { 
  method: 'GET'
})
.then(function(response) { return response.json(); })
.then(function(json) {
  Object.keys(json[0]).forEach(function(key){
    let head = document.createElement("th")
    head.innerHTML = key
    header.appendChild(head)
  })

  for (let dev of json) {
    let row = document.createElement("tr")
    Object.keys(dev).forEach(function(key){
        let col = document.createElement("td")
        col.innerHTML = dev[key]
        row.appendChild(col)
    })
    loc.appendChild(row)
  }
});