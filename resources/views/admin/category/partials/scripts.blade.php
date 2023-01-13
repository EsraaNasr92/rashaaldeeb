<script>
  //Script for edit category and subcategory by id
  $('.edit-category').on('click', function() {
  var id = $(this).data('id');
  var name = $(this).data('name');
  var url = "{{ url('admin/category') }}/" + id;

  $('#editCategoryModal form').attr('action', url);
    var cname = $('#editCategoryModal form input[name="name"]').val(name);
  });
</script>
