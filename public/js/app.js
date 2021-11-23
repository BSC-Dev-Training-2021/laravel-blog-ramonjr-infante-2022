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
        $('.category_name').val($(this).attr("category_name"));
        $('.category_id').val($(this).attr("category_id"));
        $('.number_of_posts').text($(this).attr("category_no_of_posts"));
        ($(this).attr("category_no_of_posts") == 0) ? $('.category_warning').hide() : $('.category_warning').show();
    });
    $(document).on('click','.delete_btn',function(){
        $('#add_cat_form').hide();
        $('#edit_cat_form').hide();
        $('#delete_cat_form').show();
        let category_name = $(this).attr("category_name");
        let category_id = $(this).attr("category_id");
        console.log(category_name)
        console.log(category_id)
        $('.category_title').text(category_name);
        $('.category_id').val(category_id);
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

    // category_name

});