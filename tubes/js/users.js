function fetchData() {
    var kategori = document.getElementById("kategoriSelect").value;
  
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Process the response and update the page with the new data
        var response = xhr.responseText;
        // Example: Update a specific <div> element with the new data
        document.getElementById("dataContainer").innerHTML = response;
      }
    };
  
    xhr.open("GET", "users.php?kategori=" + kategori, true);
    xhr.send();
  }
  