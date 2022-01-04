$(document).ready(function() {
    console.log("jquery onload hit");
    $(document).on('click','.add_btn',function(){
        $('#edit_cat_form').hide();
        $('#delete_cat_form').hide();
        $('#add_cat_form').show();
        removeErrorMessage();
    });
    $(document).on('click','.edit_btn',function(){
        removeErrorMessage();
        $('#delete_cat_form').hide();
        $('#add_cat_form').hide();
        $('#edit_cat_form').show();
        let category_data = $(this).data("category-data");
        $('.category_name').val(category_data['name']);
        $('.category_id').val(category_data['id']);
        $('.number_of_posts').text(category_data['posts'].length);
        (category_data['posts'].length == 0) ? $('.category_warning').hide() : $('.category_warning').show();
    });
    $(document).on('click','.delete_btn',function(){
        $('#add_cat_form').hide();
        $('#edit_cat_form').hide();
        $('#delete_cat_form').show();
        let category_data = $(this).data("category-data");
        $('.category_title').text(category_data['name']);
        $('.category_id').val(category_data['id']);
    });
    $(document).on('click','.cancel_delete_btn',function(){
        $('#edit_cat_form').hide();
        $('#delete_cat_form').hide();
        $('#add_cat_form').show();
        removeErrorMessage();
    });
    $(document).on('click','#update_category_btn',function(e){
        let categories = $(this).data("categories-data");
        if($('#edit_category_name').val() == ""){
            $('#edit_cat_form input').addClass("error_style");
            $('#edit_cat_form span').text("Category name is empty");
            e.preventDefault();
            return;
        }
        for(var x = 0;x < categories.length;x++){
           if(categories[x].name == $('#edit_category_name').val()){
                $('#edit_cat_form input').addClass("error_style");
                $('#edit_cat_form span').text("Category name is already exist");
                e.preventDefault();
               return;
           }
        }
    });
    function removeErrorMessage(){
        $('#add_cat_form input').removeClass("error_style");
        $('#add_cat_form span').text("");
        $('#edit_cat_form input').removeClass("error_style");
        $('#edit_cat_form span').text("");
    }
});