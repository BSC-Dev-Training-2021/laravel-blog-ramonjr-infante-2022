$(document).ready(function() {
    console.log("jquery onload hit");
    $(document).on('click','.add_btn',function(){
        $('#edit_cat_form').hide();
        $('#delete_cat_form').hide();
        $('#add_cat_form').show();
    });
    $(document).on('click','.edit_btn',function(){
        $('.edit_category_empty').hide();
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
    });
    $(document).on('click','#update_category_btn',function(e){
        if($('#edit_category_name').val() == ""){
            $('.alert-danger').show();
            e.preventDefault();
        }
        console.log($('#edit_category_name').val());
    });
});