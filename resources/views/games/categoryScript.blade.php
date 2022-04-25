<script>
    let addCategoryButton = document.getElementById("addCategoryButton");
    addCategoryButton.onclick = function(){
        let input = document.getElementById("categoryNameInput")
        //document.getElementById("categories").innerHTML += addNewRow(input.value);
        $("#categories").append(addNewRow(input.value));
        input.value = "";
    };

    function deleteCategory(target){
        target.parentNode.parentNode.remove();
    }

    function addNewRow(texto){
        let newRow = 
        '<div class="row mb-3">'+
            '<div class="col-auto">'+
                '<input type="text" class="form-control" placeholder="Category name" name="categoryName[]" value="'+texto+'" required>'+
            '</div>'+
            '<div class="col-auto">'+
                '<button class="btn btn-small btn-danger" type="button" onclick="deleteCategory(this)">Delete</button>'+
            '</div>'+
        '</div>'
        return newRow;
    }
</script>
