
function getCategories(subCategory) {
    // Make an AJAX request to a PHP script that fetches categories based on the selected subCategory
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var categories = JSON.parse(this.responseText);
            
            var categoryDropdown = document.getElementById('category');
            categoryDropdown.innerHTML = '';

            for (var i = 0; i < categories.length; i++) {
                var option = document.createElement('option');
                option.value = categories[i].cat_name; // Access the cat_name property
                option.text = categories[i].cat_name; // Access the cat_name property
                categoryDropdown.add(option);
            }
        }
    };

    // Send the AJAX request to the PHP script with the selected subCategory
    xhttp.open("GET", "includes/fetch_category.php?subCategory=" + subCategory, true);
    xhttp.send();
}


function getItem(item) {
    // Make an AJAX request to a PHP script that fetches categories based on the selected subCategory
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var item = JSON.parse(this.responseText);
            
            var itemDropdown = document.getElementById('item');
            itemDropdown.innerHTML = '';

            for (var i = 0; i < item.length; i++) {
                var option = document.createElement('option');
                option.value = item[i].item_name; // Access the cat_name property
                option.text = item[i].item_name; // Access the cat_name property
                itemDropdown.add(option);
            }
        }
    };

    // Send the AJAX request to the PHP script with the selected subCategory
    xhttp.open("GET", "includes/fetch_item.php?item=" + item, true);
    xhttp.send();
}