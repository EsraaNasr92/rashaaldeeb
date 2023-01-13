<script type="text/javascript">
    $('.edit-category').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var url = "{{ url('admin/pcategory') }}/" + id;

        $('#editCategoryModal form').attr('action', url);
        $('#editCategoryModal form input[name="name"]').val(name);
    });
</script>