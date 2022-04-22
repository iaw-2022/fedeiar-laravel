let categoryButton = document.getElementById("addCategoryButton");
    categoryButton.onclick = function(){
        let input = document.getElementById("categoryNameInput")
        document.getElementById("categories").innerHTML += addNewRow(input.value);
        input.value = "";
    };

    function deleteCategory(target){
        target.parentNode.parentNode.remove();
    }

    function addNewRow(texto){
        let newRow = 
        '<div class="row mb-3">'+
            '<div class="col-auto">'+
                '<input type="text" class="form-control" placeholder="Category name" name="categoryName[]" value="'+texto+'">'+
            '</div>'+
            '<div class="col-auto">'+
                '<div class="btn btn-small btn-danger" type="button" onclick="deleteCategory(this)">Delete</div>'+
            '</div>'+
        '</div>'
        return newRow;
    }